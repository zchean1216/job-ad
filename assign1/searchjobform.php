<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Job Vacancy</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to your CSS file -->
</head>
<body>
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
    <main>
        <div class="form-container search-form">
            <h2>Search Job Vacancies</h2>
            <form action="searchjobprocess.php" method="GET">
                <!-- Search by Job Title -->
                <div class="form-group">
                    <label for="job_title"><strong>Job Title:</strong></label>
                    <input type="text" id="job_title" name="job_title" placeholder="e.g., Software Engineer">
                </div>
                <!-- Filter by Position Type -->
                <div class="form-group">
                    <label for="position_type"><strong>Position Type:</strong></label>
                    <select id="position_type" name="position_type">
                        <option value="any">Any</option>
                        <option value="Full Time">Full Time</option>
                        <option value="Part Time">Part Time</option>
                    </select>
                </div>
                <!-- Filter by Contract Type -->
                <div class="form-group">
                    <label for="contract_type"><strong>Contract Type:</strong></label>
                    <select id="contract_type" name="contract_type">
                        <option value="any">Any</option>
                        <option value="On-going">On-going</option>
                        <option value="Fixed Term">Fixed Term</option>
                    </select>
                </div>
                <!-- Filter by Application Type -->
                <div class="form-group">
                    <label for="application_type"><strong>Application Type:</strong></label>
                    <select id="application_type" name="application_type">
                        <option value="any">Any</option>
                        <option value="Post">Post</option>
                        <option value="Email">Email</option>
                    </select>
                </div>
                <!-- Filter by Location -->
                <div class="form-group">
                    <label for="location"><strong>Location:</strong></label>
                    <select id="location" name="location">
                        <option value="any">Any</option>
                        <option value="On Site">On Site</option>
                        <option value="Remote">Remote</option>
                    </select>
                </div>
                <!-- Submit Button -->
                <button type="submit">Search</button>
            </form>
            <a href="index.php" class="home-link">Return to Home</a>
        </div>
    </main>
    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 COS30020 Advanced Web Development. Zheng Chean Chia (104225166)</p>
    </footer>
</body>
</html>
