# PHP User Management System

A simple PHP-based user management system that allows updating and deleting user records. This project is designed to handle user records in a MySQL database, with protection against SQL Injection and Cross-Site Scripting (XSS) attacks.

## Features

- Update user details (name, email, phone, address, role)
- Delete user records
- Secure with SQL Injection prevention and XSS mitigation
- Frontend design powered by the **Bootstrap Solar theme** for a modern and responsive UI.

## Prerequisites

Before running this project, ensure you have the following:

- A web server (e.g., Apache or Nginx)
- PHP version 7 or higher
- MySQL or MariaDB

## Setup Instructions

### 1. Clone the Repository

Clone the repository to your local machine using Git:

```bash
git clone https://github.com/tarandeepk02/php-crud.git
```

### 2. Setup Database

 - Open MySQL or phpMyAdmin and create a new database (e.g., user_management).
 - Import records.sql into the newly created database.

### 3. Configure Database Connection
  - Update the config/db.php file with your MySQL database credentials:

### 4. Run the Project
- Place the project files on your web server's root directory (e.g., htdocs for XAMPP).
- Access the project via your browser (e.g., http://localhost/your-project-folder).
- You should now be able to update and delete user records using the provided forms.

### How to Use
- Update User: Navigate to the update.php page, select a user to update, modify their details, and submit the form.
- Delete User: Navigate to the delete.php page with the user ID parameter, and the selected user will be deleted from the database.

### Security Features
 - SQL Injection Protection: The application sanitizes user input using mysqli_real_escape_string() to prevent SQL injection attacks.
 - XSS Protection: The application also sanitizes output using htmlspecialchars() to prevent Cross-Site Scripting (XSS) attacks.

### Files
- index.php: Displays the list of users and options to update or delete users.
- update.php: Allows updating user records.
- delete.php: Deletes user records based on user ID.
- config/db.php: Contains the database connection details.
- records.sql: SQL file to create and populate the database with sample data.

### Contribution
Feel free to fork this project, make changes, and submit pull requests. Contributions are welcome!
