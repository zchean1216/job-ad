<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Job Vacancy</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to your CSS file -->
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
        <div class="form-container">
            <h2>Post a Job Vacancy</h2>
            <form action="postjobprocess.php" method="POST">
                <div class="form-group">
                    <label for="position_id">Position ID:</label>
                    <input type="text" id="position_id" name="position_id" placeholder="e.g., ID001">
                </div>

                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" placeholder="e.g., IT Manager">
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="4" placeholder="Enter job description..."></textarea>
                </div>

                <div class="form-group">
                    <label for="closing_date">Closing Date:</label>
                    <input type="text" id="closing_date" name="closing_date" value="<?php echo date('d/m/y'); ?>">
                </div>

                <div class="form-group">
                    <label>Position:</label>
                    <div class="inline-group">
                        <div class="radio-option">
                            <input type="radio" id="full_time" name="position_type" value="Full Time">
                            <label for="full_time">Full Time</label>
                        </div>
                        <div class="radio-option">
                            <input type="radio" id="part_time" name="position_type" value="Part Time">
                            <label for="part_time">Part Time</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Contract:</label>
                    <div class="inline-group">
                        <div class="radio-option">
                            <input type="radio" id="ongoing" name="contract_type" value="On-going">
                            <label for="ongoing">On-going</label>
                        </div>
                        <div class="radio-option">
                            <input type="radio" id="fixed_term" name="contract_type" value="Fixed term">
                            <label for="fixed_term">Fixed term</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Location:</label>
                    <div class="inline-group">
                        <div class="radio-option">
                            <input type="radio" id="on_site" name="location" value="On site">
                            <label for="on_site">On site</label>
                        </div>
                        <div class="radio-option">
                            <input type="radio" id="remote" name="location" value="Remote">
                            <label for="remote">Remote</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Accept Application by:</label>
                    <div class="inline-group">
                        <div class="checkbox-option">
                            <input type="checkbox" id="post" name="application_method[]" value="Post">
                            <label for="post">Post</label>
                        </div>
                        <div class="checkbox-option">
                            <input type="checkbox" id="email" name="application_method[]" value="Email">
                            <label for="email">Email</label>
                        </div>
                    </div>
                </div>

                <button type="submit">Submit Job Posting</button>
                <a href="index.php" class="home-link">Return to Home</a>
            </form>
        </div>
    </main>
    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 COS30020 Advanced Web Development. Zheng Chean Chia (104225166)</p>
    </footer>
</body>
</html>
