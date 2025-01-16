# Job Vacancy Posting System

This repository contains a job posting system developed as part of a web development project. The system is built using HTML, CSS, PHP, and text files to provide a functional job posting and searching platform.

## Features

- **Job Posting**: Users can submit job vacancy details through a form. Input data is validated and saved to a server-side text file.
- **Job Searching**: Search functionality supports multiple criteria (e.g., title, position, location) with results sorted by closing date.
- **Dynamic PHP Pages**: Includes pages for posting jobs, processing job data, and displaying search results.
- **About Page**: Details the implementation, features, and additional considerations for the project.

## File Structure

```
project/
├── index.php               # Home page
├── postjobform.php         # Form to post a job vacancy
├── postjobprocess.php      # Processes and saves job data
├── searchjobform.php       # Form to search for job vacancies
├── searchjobprocess.php    # Processes search queries and displays results
├── about.php               # About page for project details
├── style.css               # CSS styles
└── jobs/                   # Directory to store job data (positions.txt)
```

## Installation and Testing

1. Upload the project files to a PHP-enabled server.
2. Ensure the `jobs/` directory exists within the server's data directory.
3. Access the Home page (`index.php`) in a browser to interact with the system.

## Requirements

- All PHP files should be placed in the root `project/` folder.
- Links must be relative to ensure portability.
- Ensure the server has PHP support and proper permissions for file handling.

## Notes

- PHP version and server details can be added dynamically on the `about.php` page.
- Validate inputs and ensure proper functionality for the best user experience.
