<?php
// Include the database connection
include('config/db.php');
$message = ''; // Initialize message variable
if(isset($_POST['submit']))
{
	// Sanitize and validate user inputs
	$name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $userId = $_GET['id'];
	
$query = mysqli_query($conn,"UPDATE users SET name='$name', email='$email', phone='$phone', address='$address', role='$role' WHERE id='$userId' ");
	// Check if the query was successful
	if ($query) {
        $message = "User updated successfully!";
    } else {
        $message = "Failed to update user!";
    }
}
// Fetch the existing user data based on the user ID (GET request)
$queryfetch = mysqli_query($conn,"select * from users where id='".mysqli_real_escape_string($conn, $_GET['id'])."' ");
$row = mysqli_fetch_array($queryfetch);
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
        <h5 class="mb-0">Update User</h5>
      </div>
      <div class="card-body h6">
        <!-- Form for updating user details -->
        <form action="update.php?id=<?php echo $_GET['id']; ?>" method="post">
          <fieldset>
          <!-- Name input field -->
          <div>
            <label for="name" class="form-label">Name<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo !empty($row['name']) ? htmlspecialchars($row['name']) : ''; ?>" placeholder="Enter Name" required>
          </div>
          <!-- Email input field -->
          <div>
            <label for="email" class="form-label mt-4">Email address<span class="text-danger">*</span></label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo !empty($row['email']) ? htmlspecialchars($row['email']) : ''; ?>" placeholder="Enter Email" required>
          </div>
          <!-- Phone input field -->
          <div>
            <label for="phone" class="form-label mt-4">Phone<span class="text-danger">*</span></label>
            <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo !empty($row['phone']) ? htmlspecialchars($row['phone']) : ''; ?>" placeholder="Enter Phone" required>
          </div>
          <!-- Address input field (textarea) -->
          <div>
            <label for="address" class="form-label mt-4">Address<span class="text-danger">*</span></label>
            <textarea class="form-control" name="address" id="address" rows="3" placeholder="Enter Address" required><?php echo !empty($row['address']) ? htmlspecialchars($row['address']) : ''; ?></textarea>
          </div>
          <!-- Role selection dropdown -->
          <div>
            <label for="role" class="form-label mt-4">Role<span class="text-danger">*</span></label>
            <select class="form-select" name="role" id="role" required>
              <option value="">--Select--</option>
              <option value="Guest" <?php if($row['role'] == 'Guest') echo 'selected="selected"'; ?>>Guest</option>
              <option value="Admin" <?php if($row['role'] == 'Admin') echo 'selected="selected"'; ?>>Admin</option>
              <option value="User" <?php if($row['role'] == 'User') echo 'selected="selected"'; ?>>User</option>
            </select>
          </div>
          <!-- Submit and back buttons -->
          <div class="mt-4">
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Update User</button>
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
