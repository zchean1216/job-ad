<?php
// Function to display a styled message with navigation and bold message
function display_message($title, $message, $success = true) {
    $class = $success ? 'success' : 'error';
    echo "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>$title</title>
        <link rel='stylesheet' href='style.css'> <!-- Link to external CSS file -->
    </head>
    <body>
        <nav>
            <div class='container'>
                <div class='logo'>
                    <a href='index.php'>Assignment 1</a>
                </div>
                <ul class='nav-links'>
                    <li><a href='index.php'>Home</a></li>
                    <li><a href='postjobform.php'>Post a job vacancy</a></li>
                    <li><a href='searchjobform.php'>Search for a job vacancy</a></li>
                    <li><a href='about.php'>About this assignment</a></li>
                </ul>
            </div>
        </nav>
        <main>
            <div class='form-container'>
                <h2 class='$class'>$title</h2>
                <div class='link-container'>
                    <p><i>$message</i></p> <!-- Make the message bold -->
                    <p><a href='index.php'>Return to Home</a></p>
                    " . (!$success ? "<p><a href='postjobform.php'>Return to Post Job Vacancy</a></p>" : "") . "
                </div>
            </div>
        </main>
    </body>
    </html>";
}

// Set the file path and directory
$dir = "../../data/jobs";
$file_path = $dir . "/positions.txt";

// Function to validate date format (dd/mm/yy)
function validate_date($date) {
    $d = DateTime::createFromFormat('d/m/y', $date);
    return $d && $d->format('d/m/y') === $date;
}

// Function to check if Position ID is unique
function is_position_id_unique($position_id, $file_path) {
    if (!file_exists($file_path)) {
        return true; // If the file doesn't exist, the ID is unique
    }

    $handle = fopen($file_path, "r");
    if ($handle) {
        while (($line = fgets($handle)) !== false) {
            $data = explode("\t", trim($line)); // Now split by tabs
            if ($data[0] === $position_id) {
                fclose($handle);
                return false;
            }
        }
        fclose($handle);
    }
    return true;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $position_id = isset($_POST['position_id']) ? trim($_POST['position_id']) : '';
    $title = isset($_POST['title']) ? trim($_POST['title']) : '';
    $description = isset($_POST['description']) ? trim($_POST['description']) : '';
    $closing_date = isset($_POST['closing_date']) ? trim($_POST['closing_date']) : '';
    $position_type = isset($_POST['position_type']) ? trim($_POST['position_type']) : '';
    $contract_type = isset($_POST['contract_type']) ? trim($_POST['contract_type']) : '';
    $location = isset($_POST['location']) ? trim($_POST['location']) : '';
    $application_methods = isset($_POST['application_method']) ? $_POST['application_method'] : [];

    // Validate form data
    $errors = [];

    // 1. Validate Position ID: Must be 5 characters starting with "ID" followed by 3 digits
    if (empty($position_id) || !preg_match('/^ID\d{3}$/', $position_id)) {
        $errors[] = "Position ID must be 5 characters long and start with 'ID' followed by 3 digits (e.g., ID001).";
    } elseif (!is_position_id_unique($position_id, $file_path)) {
        $errors[] = "Position ID must be unique. The provided Position ID already exists.";
    }

    // 2. Validate Title: Max 10 characters, can only include alphanumeric, spaces, commas, periods, and exclamation marks
    if (empty($title) || !preg_match('/^[A-Za-z0-9 ,.]{1,10}$/', $title)) {
        $errors[] = "Title is required and can only contain up to 10 alphanumeric characters including spaces, commas, periods, and exclamation points.";
    }

    // 3. Validate Description: Max 250 characters
    if (empty($description) || strlen($description) > 250) {
        $errors[] = "Description is required and can only contain up to 250 characters.";
    }

    // 4. Validate Closing Date: Must be in the format dd/mm/yy
    if (empty($closing_date) || !validate_date($closing_date)) {
        $errors[] = "Closing Date must be in the format dd/mm/yy.";
    }

    // 5. Validate Position Type: Must be either "Full Time" or "Part Time"
    if (empty($position_type) || !in_array($position_type, ['Full Time', 'Part Time'])) {
        $errors[] = "Position type (Full Time or Part Time) is required.";
    }

    // 6. Validate Contract Type: Must be either "On-going" or "Fixed term"
    if (empty($contract_type) || !in_array($contract_type, ['On-going', 'Fixed term'])) {
        $errors[] = "Contract type (On-going or Fixed term) is required.";
    }

    // 7. Validate Location: Must be either "On site" or "Remote"
    if (empty($location) || !in_array($location, ['On site', 'Remote'])) {
        $errors[] = "Location (On site or Remote) is required.";
    }

    // 8. Validate Application Method: At least one method (Post or Email) must be selected
    if (empty($application_methods)) {
        $errors[] = "At least one application method (Post or Email) is required.";
    }

    // If there are any errors, display them to the user
    if (!empty($errors)) {
        $error_message = "<ul>";
        foreach ($errors as $error) {
            $error_message .= "<li>" . htmlspecialchars($error) . "</li>";
        }
        $error_message .= "</ul>";
        display_message('Error: Invalid Submission', $error_message, false);
        exit;
    }

    // Create directory if it doesn't exist
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);  // Create the directory if it doesn't exist
    }

    // Format the application methods as separate columns
    $application_method_1 = isset($application_methods[0]) ? $application_methods[0] : "";
    $application_method_2 = isset($application_methods[1]) ? $application_methods[1] : "";

    // Prepare data to be written to the file (separated by tabs, "\t")
    $job_data = "$position_id\t$title\t$description\t$closing_date\t$position_type\t$contract_type\t$location\t$application_method_1\t$application_method_2\n";

    // Write the data to the file
    $file = fopen($file_path, "a");
    if ($file) {
        fwrite($file, $job_data);
        fclose($file);
        display_message('Success', 'Job vacancy has been successfully posted!');
    } else {
        display_message('Error', 'Failed to save job vacancy. Please check file permissions.', false);
    }
}
?>
