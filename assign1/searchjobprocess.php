
<?php
// Function to display a styled message with navigation
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
            <div class='form-container search-results'>
                <h2 class='$class'>$title</h2>
                <div class='link-container'>
                    $message
                    <p><a href='index.php'>Return to Home</a></p>
                    <p><a href='searchjobform.php'>Return to Search Job Vacancy</a></p>
                </div>
            </div>
        </main>
        <!-- Footer -->
        <footer class='footer'>
            <p>&copy; 2024 COS30020 Advanced Web Development. Zheng Chean Chia (104225166)</p>
        </footer>
    </body>
    </html>";
}

// Set the file path
$dir = "../../data/jobs";
$file_path = $dir . "/positions.txt";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Retrieve the search query and other criteria
    $job_title = isset($_GET['job_title']) ? trim($_GET['job_title']) : '';
    $position_type = isset($_GET['position_type']) ? $_GET['position_type'] : 'any';
    $contract_type = isset($_GET['contract_type']) ? $_GET['contract_type'] : 'any';
    $application_type = isset($_GET['application_type']) ? $_GET['application_type'] : 'any';
    $location = isset($_GET['location']) ? $_GET['location'] : 'any';

    // Check if the file exists
    if (!file_exists($file_path)) {
        display_message('Error: File Not Found', 'The job vacancy data file does not exist.', false);
        exit;
    }

    // Open the file and search for the job vacancies based on the criteria
    $file = fopen($file_path, "r");
    if (!$file) {
        display_message('Error', 'Failed to open job vacancy data file.', false);
        exit;
    }

    $vacancies = [];

    while (($line = fgets($file)) !== false) {
        $data = explode("\t", trim($line));
        
        // Ensure the array contains enough elements before accessing
        if (count($data) < 4) {
            continue; 
        }

        // Ensure that the closing date is valid and in the correct format
        $closing_date = DateTime::createFromFormat('d/m/y', $data[3]);
        $today = new DateTime();

        if ($closing_date && $closing_date >= $today) {
            // Apply filters to match the search criteria
            $matches = true;

            if ($job_title && stripos($data[1], $job_title) === false) {
                $matches = false;
            }
            if ($position_type !== 'any' && $position_type !== $data[4]) {
                $matches = false;
            }
            if ($contract_type !== 'any' && $contract_type !== $data[5]) {
                $matches = false;
            }
            if ($application_type !== 'any' && isset($data[7]) && stripos($data[7], $application_type) === false && isset($data[8]) && stripos($data[8], $application_type) === false) {
                $matches = false;
            }
            if ($location !== 'any' && isset($data[6]) && $location !== $data[6]) {
                $matches = false;
            }

            if ($matches) {
                $vacancies[] = $data; 
            }
        }
    }
    fclose($file);

    // Sort vacancies by closing date (most future first)
    usort($vacancies, function ($a, $b) {
        $dateA = DateTime::createFromFormat('d/m/y', $a[3]);
        $dateB = DateTime::createFromFormat('d/m/y', $b[3]);

        if ($dateA > $dateB) {
            return -1; // Return -1 if dateA is more in the future than dateB
        } elseif ($dateA < $dateB) {
            return 1; // Return 1 if dateA is less in the future than dateB
        } else {
            return 0; // Return 0 if both dates are equal
        }
    });

    // Display the search results
    if (count($vacancies) > 0) {
        $results = "<table class='result-table'>
                        <thead>
                            <tr>
                                <th>Position ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Closing Date</th>
                                <th>Position Type</th>
                                <th>Contract Type</th>
                                <th>Location</th>
                                <th>Application Method</th>
                            </tr>
                        </thead>
                        <tbody>";

        foreach ($vacancies as $vacancy) {
            // Combine application methods if both Post and Email exist
            $application_methods = isset($vacancy[8]) ? "{$vacancy[7]}, {$vacancy[8]}" : $vacancy[7];
            
            $results .= "<tr>
                            <td><b>{$vacancy[0]}</b></td>
                            <td>{$vacancy[1]}</td>
                            <td>{$vacancy[2]}</td>
                            <td>{$vacancy[3]}</td>
                            <td>{$vacancy[4]}</td>
                            <td>{$vacancy[5]}</td>
                            <td>{$vacancy[6]}</td>
                            <td>{$application_methods}</td>
                        </tr>";
        }
        $results .= "</tbody></table>";
        display_message('Search Results', $results, true);
    } else {
        display_message('No Results Found', 'No job vacancies match your search criteria or the job vacancies have already closed.', false);
    }
}
?>
