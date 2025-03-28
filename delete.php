<?php
// Include the database connection
include('config/db.php');

// Check if 'id' is passed via the URL query string
if (isset($_GET['id'])) {
    // Sanitize the 'id' from the URL to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Execute the DELETE query to remove the user with the provided id
    $query = mysqli_query($conn, "DELETE FROM users WHERE id = '".$id."' ");

    // Check if the query was successful
    if ($query) {
        // Redirect to the index page after successful deletion
        header('Location: index.php');
    } else {
        // If there's an error, display it
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // If 'id' is not provided in the URL, display an error message
    echo "Error: ID is required!";
}
?>