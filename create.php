<?php
// Include the database connection
include('config/db.php');
$message = ''; // Initialize message variable
if(isset($_POST['submit']))
{
	// SQL Injection Prevention using mysqli_real_escape_string
    $name = mysqli_real_escape_string($conn, trim($_POST['name']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $phone = mysqli_real_escape_string($conn, trim($_POST['phone']));
    $address = mysqli_real_escape_string($conn, trim($_POST['address']));
    $role = mysqli_real_escape_string($conn, trim($_POST['role']));
	
	// Insert data into the users table
    $query = mysqli_query($conn, 
        "INSERT INTO users (name, email, phone, address, role) 
         VALUES ('$name', '$email', '$phone', '$address', '$role')"
    );

	// Check if the query was successful
	if ($query) {
        $message = "User added successfully!";
    } else {
        $message = "Failed to add user!";
    }
}
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
<!-- Display alert message -->
<?php if (!empty($message)) { ?>
<div class="alert alert-<?php echo ($query ? 'success' : 'danger'); ?> alert-dismissible fade show" role="alert"> <?php echo $message; ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>
<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card mb-3">
      <div class="card-header text-center bg-primary text-white">
        <h5 class="mb-0">Add User</h5>
      </div>
      <div class="card-body h6">
        <!-- User form to add data -->
        <form action="create.php" method="post">
          <fieldset>
          <!-- Name Field -->
          <div>
            <label for="name" class="form-label">Name<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="name" name="name" 
                   value="<?php echo !empty($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>" 
                   placeholder="Enter Name" required>
          </div>
          <!-- Email Field -->
          <div>
            <label for="email" class="form-label mt-4">Email address<span class="text-danger">*</span></label>
            <input type="email" class="form-control" id="email" name="email" 
                   value="<?php echo !empty($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" 
                   placeholder="Enter Email" required>
          </div>
          <!-- Phone Field -->
          <div>
            <label for="phone" class="form-label mt-4">Phone<span class="text-danger">*</span></label>
            <input type="tel" class="form-control" id="phone" name="phone" 
                   value="<?php echo !empty($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>" 
                   placeholder="Enter Phone" required>
          </div>
          <!-- Address Field -->
          <div>
            <label for="address" class="form-label mt-4">Address<span class="text-danger">*</span></label>
            <textarea class="form-control" name="address" id="address" rows="3" placeholder="Enter Address" required><?php 
                echo !empty($_POST['address']) ? htmlspecialchars($_POST['address']) : ''; 
            ?>
</textarea>
          </div>
          <!-- Role Field -->
          <div>
            <label for="role" class="form-label mt-4">Role<span class="text-danger">*</span></label>
            <select class="form-select" name="role" id="role" required>
              <option value="">--Select--</option>
              <option value="Guest" <?php echo (!empty($_POST['role']) && $_POST['role'] == 'Guest') ? 'selected' : ''; ?>>Guest</option>
              <option value="Admin" <?php echo (!empty($_POST['role']) && $_POST['role'] == 'Admin') ? 'selected' : ''; ?>>Admin</option>
              <option value="User" <?php echo (!empty($_POST['role']) && $_POST['role'] == 'User') ? 'selected' : ''; ?>>User</option>
            </select>
          </div>
          <!-- Form Actions -->
          <div class="mt-4">
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Add User</button>
            <a href="index.php" class="btn btn-secondary">Back</a> </div>
          </fieldset>
        </form>
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
