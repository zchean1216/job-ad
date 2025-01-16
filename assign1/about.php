<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About this Assignment</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to external CSS file -->
</head>
<body>
    <!-- Navigation Bar -->
    <nav>
        <div class="container">
            <div class="logo">
                <a href="index.php">Assignment 1</a>
            </div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="postjobform.php">Post a job vacancy</a></li>
                <li><a href="searchjobform.php">Search for a job vacancy</a></li>
                <li><a href="about.php">About this assignment</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        <br><br>
        <div class="form-container about-container">
            <h2>About this Assignment</h2>
            <ul>
                <li><strong>PHP Version:</strong>
                    <?php echo phpversion(); ?>
                </li>

                <li><strong>Tasks not attempted or not completed:</strong>
                    <ul>
                        <li>I completed every task listed in the assignment requirements and specifications.</li>
                    </ul>
                </li>

                <li><strong>Special Features:</strong>
                    <ul>
                        <li><strong>Usage of <code>trim()</code> Function:</strong> Employed the <code>trim()</code> function to remove any extra whitespace from user inputs. This is a small but powerful technique to improve data cleanliness and ensure that no unintended spaces interfere with validation or data processing.</li>

                        <li><strong>Advanced Array Manipulation with <code>usort()</code>:</strong> Utilized the <code>usort()</code> function to sort job listings by the closing date. This is a more advanced array sorting method as it allows custom comparison logic and provides precise control over the sorting process.</li>

                        <li><strong>Designed Navigation Bar:</strong> Created a navigation bar for easy access to all major pages in the assignment, such as posting and searching for job vacancies, and linking back to the homepage.</li>

                        <li><strong>Clickable Logo for Navigation:</strong> The logo titled "Assignment 1" links back to the homepage, making it easy for users to navigate back from any page.</li>

                        <li><strong>Navigation Link Hover Effect:</strong> Implemented a hover effect on the navigation links, where the links are underlined when hovered over. This provides a clear visual cue to users, improving usability by making it obvious that the text is clickable.</li>

                        <li><strong>Inserting Footer:</strong> Implemented a footer at the bottom of each page that displays my unit name and student information.</li>
                    </ul>
                </li>
            </ul>
            <br><br>
            <hr style="border: none; border-top: 1.5px solid black; width: 1200px;">
            <br>

            <h3>Discussion Board Participation:</h3>
            <p><strong>1.</strong> Question about Assignment 1 Task 6 (Screenshot provided below):</p>
            <img src="style/Question1.PNG" alt="Question1" width="1000px">
            <p><i>My Response:</i></p>
            <img src="style/Answer1.PNG" alt="Answer1" width="600px">
            <br><br><br>
            <hr style="border: none; border-top: 1.5px solid black; width: 1200px;">
            <br>
            <p><strong>2.</strong> Discussion regarding proper error messages in Task 3:</p>
            <img src="style/AnswerandQuestion2.PNG" alt="Answer and Question for Task 3" width="1200px">
            <br><br><br>
            <hr style="border: none; border-top: 1.5px solid black; width: 1200px;">
            <br>
            <p><strong>3.</strong> Helping with directory permissions for Assignment 1:</p>
            <img src="style/Question3.PNG" alt="Question about Permissions" width="800px">
            <p><i>My Response:</i></p>
            <img src="style/Answer3.PNG" alt="Answer to Permissions Question" width="1200px">
            <br><br><br>
            <hr style="border: none; border-top: 1.5px solid black; width="1200px;">
            <br>
            <p><strong>4.</strong> I was asking question regarding Task 2 validation question in the forum.</p>
            <img src="style/Question4.PNG" alt="Question regarding Validation in Task 2" width="600px">
            <br><br><br>
            <a href="index.php" class="home-link">Return to Home</a>
            <br>
        </div>
        <br><br>
    </main>
    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 COS30020 Advanced Web Development. Zheng Chean Chia (104225166)</p>
    </footer>
</body>
</html>
