<?php
// Include the database connection
include('config/db.php');
?>
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
        <h5 class="mb-0">View Users</h5>
      </div>
      <div class="card-body h6 text-center">
        <hr>
        <table class="table table-striped table-hover">
          <thead class="table-dark">
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
			// Sanitize the keyword to prevent SQL injection
            $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
			if(!empty($keyword))
			{
			// SQL Injection Prevention with mysqli_real_escape_string
            $keyword = mysqli_real_escape_string($conn, $keyword);
			$query = mysqli_query($conn,"SELECT * FROM users where name LIKE '%$keyword%' OR email LIKE '%$keyword%' OR phone LIKE '%$keyword%' "); 
			}
			else
			{
			// Display all users if no keyword is provided
			$query = mysqli_query($conn,"SELECT * FROM users"); 
			}
			// Check if any rows are returned
			if(mysqli_num_rows($query)<=0)
			{
			?>
            <tr>
              <td colspan="5">No records found.</td>
            </tr>
            <?php
			}
			else
			{
			// Loop through each row and display the data
			while ($row = mysqli_fetch_array($query)) { ?>
            <tr>
              <!-- XSS Protection using htmlspecialchars -->
              <td><?= htmlspecialchars($row['id']) ?></td>
              <td><?= htmlspecialchars($row['name']) ?></td>
              <td><?= htmlspecialchars($row['email']) ?></td>
              <td><?= htmlspecialchars($row['phone']) ?></td>
              <!-- Edit and Delete buttons with ID passed as a query parameter -->
              <td><a href="update.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a> <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?')">Delete</a> </td>
            </tr>
            <?php 
			} 
			}
			?>
          </tbody>
        </table>
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
