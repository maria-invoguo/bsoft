<?php
session_start();
require_once 'db.php';
if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
} else {
  echo "<script>window.location.href = 'login.php';</script>";
  exit();
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // Validate form data
    if ($newPassword !== $confirmPassword) {
        $error = "Error: New password and confirm password do not match.";
    } else {
        // Sanitize input to prevent SQL injection
        $currentPassword = $conn->real_escape_string($currentPassword);
        $newPassword = $conn->real_escape_string($newPassword);

        // Check if the current password is correct
        $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$currentPassword'";
        $result = $conn->query($sql);

        if ($result->num_rows === 1) {
            // Update the password
            $updateSql = "UPDATE admin SET password = '$newPassword' WHERE username = '$username'";

            if ($conn->query($updateSql) === TRUE) {
                $success = "Password changed successfully.";
            } else {
                $error = "Error updating password: " . $conn->error;
            }
        } else {
            $error = "Error: Incorrect current password.";
        }
    }
}

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sample</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>
<style>
        .success-alert {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border-radius: 5px;
            display: none;
            margin-bottom: 15px;
        }

        .error-alert {
            background-color: #FF5733;
            color: white;
            padding: 10px;
            border-radius: 5px;
            display: none;
            margin-bottom: 15px;
        }
    </style>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block">Sample Admin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
      
    </div><!-- End Logo -->



  </header><!-- End Header -->
  
<?php include 'sidebar.php'; ?>
  

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Admin profile page</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item">Profile</li>
                <li class="breadcrumb-item active">Admin profile page</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Change password </h5>

                        <!-- Edit Packages Form -->
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"
                            enctype="multipart/form-data">

                            <!-- Change Password Section -->
                            <div class="row mb-3">
                                <label for="currentPassword" class="col-sm-2 col-form-label">Current Password</label>
                                <div class="col-sm-10">
                                    <input name="current_password" type="password" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="newPassword" class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-sm-10">
                                    <input name="new_password" type="password" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="confirmPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input name="confirm_password" type="password" class="form-control">
                                </div>
                            </div>
                            <!-- End Change Password Section -->

                            <div class="row mb-3">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </div>
                        </form><!-- End Edit Packages Form -->

                        <!-- Success Alert -->
                        <?php if (isset($success)) { ?>
                            <div id="success-alert" class="success-alert">
                                <?php echo $success; ?>
                            </div>
                        <?php } ?>

                        <!-- Error Alert -->
                        <?php if (isset($error)) { ?>
                            <div id="error-alert" class="error-alert">
                                <?php echo $error; ?>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
        <section class="section">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body d-flex justify-content-center align-items-center text-center">
                    <form action="logout.php" method="post">
                        <button type="submit" name="logout" class="btn btn-danger mt-4">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Logout Section -->

    </section>

    <script>
        // Check if the PHP variable $success is set (indicating successful password change)
        <?php if (isset($success)) { ?>
            // Display the success alert
            document.getElementById('success-alert').style.display = 'block';
            // Hide the success alert after 2 seconds
            setTimeout(function () {
                document.getElementById('success-alert').style.display = 'none';
            }, 2000);
        <?php } ?>

        // Check if the PHP variable $error is set (indicating an error)
        <?php if (isset($error)) { ?>
            // Display the error alert
            document.getElementById('error-alert').style.display = 'block';
            // Hide the error alert after 2 seconds
            setTimeout(function () {
                document.getElementById('error-alert').style.display = 'none';
            }, 2000);
        <?php } ?>
    </script>
</main><!-- End #main -->







  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>