<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PHP Crud</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
</head>
<body>
<div class="container">
<hr>
<!-- Include the header -->
<?php
include('includes/header.php');
?>
<hr>
<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card mb-3">
      <div class="card-header text-center bg-primary text-white">
        <h5 class="mb-0">How to Install?</h5>
      </div>
      <div class="card-body h6">
        <h3>PHP User Management System</h3>
        <p>A simple PHP-based user management system that allows updating and deleting user records. This project is designed to handle user records in a MySQL database, with protection against SQL Injection and Cross-Site Scripting (XSS) attacks.</p>
        <h4>Features</h4>
        <ul>
          <li>Update user details (name, email, phone, address, role)</li>
          <li>Delete user records</li>
          <li>Secure with SQL Injection prevention and XSS mitigation</li>
        </ul>
        <h4>Prerequisites</h4>
        <p>Before running this project, ensure you have the following:</p>
        <ul>
          <li>A web server (e.g., Apache or Nginx)</li>
          <li>PHP version 7 or higher</li>
          <li>MySQL or MariaDB</li>
        </ul>
        <h4>Setup Instructions</h4>
        <h5>1. Clone the Repository</h5>
        <p>Clone the repository to your local machine using Git:</p>
        <pre><code>git clone https://github.com/tarandeepk02/php-crud.git</code></pre>
        <h5>2. Setup Database</h5>
        <ol>
          <li>Open MySQL or phpMyAdmin and create a new database (e.g., <code>user_management</code>).</li>
          <li>Import <code>records.sql</code> into the newly created database.</li>
        </ol>
        <pre><code>
-- Example of records.sql content to create and populate the 'users' table

CREATE TABLE IF NOT EXISTS \`users\` (
    \`id\` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    \`name\` VARCHAR(255) NOT NULL,
    \`email\` VARCHAR(255) NOT NULL UNIQUE,
    \`phone\` VARCHAR(15) NOT NULL,
    \`address\` TEXT NOT NULL,
    \`role\` ENUM('Admin', 'User', 'Guest') DEFAULT 'User'
);

-- Sample data insertion for users table
INSERT INTO \`users\` (\`name\`, \`email\`, \`phone\`, \`address\`, \`role\`) VALUES
('Test', 'test@gmail.com', '123-456-7890', '123 Main St, CA', 'Admin'),
('Test 1', 'test1@gmail.com', '987-654-3210', '456 Elm St, CA', 'User');
                        </code></pre>
        <h5>3. Configure Database Connection</h5>
        <p>Update the <code>config/db.php</code> file with your MySQL database credentials:</p>
        <pre><code>
&lt;?php
\$servername = "localhost"; // Database host
\$username = "your-username"; // Your database username
\$password = "your-password"; // Your database password
\$dbname = "user_management"; // Your database name

// Create connection
\$conn = mysqli_connect(\$servername, \$username, \$password, \$dbname);

// Check connection
if (!\$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?&gt;
                        </code></pre>
        <h5>4. Run the Project</h5>
        <ol>
          <li>Place the project files on your web server's root directory (e.g., <code>htdocs</code> for XAMPP).</li>
          <li>Access the project via your browser (e.g., <code>http://localhost/your-project-folder</code>).</li>
          <li>You should now be able to update and delete user records using the provided forms.</li>
        </ol>
        <h4>How to Use</h4>
        <ul>
          <li><strong>Update User</strong>: Navigate to the <code>update.php</code> page, select a user to update, modify their details, and submit the form.</li>
          <li><strong>Delete User</strong>: Navigate to the <code>delete.php</code> page with the user ID parameter, and the selected user will be deleted from the database.</li>
        </ul>
        <h4>Security Features</h4>
        <ul>
          <li><strong>SQL Injection Protection</strong>: The application sanitizes user input using <code>mysqli_real_escape_string()</code> to prevent SQL injection attacks.</li>
          <li><strong>XSS Protection</strong>: The application also sanitizes output using <code>htmlspecialchars()</code> to prevent Cross-Site Scripting (XSS) attacks.</li>
        </ul>
        <h4>Files</h4>
        <ul>
          <li><code>index.php</code>: Displays the list of users and options to update or delete users.</li>
          <li><code>update.php</code>: Allows updating user records.</li>
          <li><code>delete.php</code>: Deletes user records based on user ID.</li>
          <li><code>config/db.php</code>: Contains the database connection details.</li>
          <li><code>records.sql</code>: SQL file to create and populate the database with sample data.</li>
        </ul>
        <h4>Contribution</h4>
        <p>Feel free to fork this project, make changes, and submit pull requests. Contributions are welcome!</p>
      </div>
    </div>
  </div>
</div>
<hr>
<!-- Include the footer -->
<?php
include('includes/footer.php');
?>
<!-- Bootstrap JS -->
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
