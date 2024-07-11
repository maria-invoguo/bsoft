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



<!-- //////////////////////////////////////////////////////////////Sidebar//////// -->
<!-- //////////////////////////////////////////////////////////////Sidebar//////// -->
<!-- //////////////////////////////////////////////////////////////Sidebar//////// -->
<?php include 'sidebar.php'; ?>

<?php

// Assuming you have a valid database connection in $conn

// Check if email parameter is set in the URL
if (isset($_GET['email'])) {
    // Sanitize the email parameter to prevent SQL injection
    $email = mysqli_real_escape_string($conn, $_GET['email']);

    // Construct the SQL query
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if ($result) {
        // Fetch the user details
        $row = mysqli_fetch_assoc($result);

        // Check if user details were found
        if ($row) {
            ?>
            <main id="main" class="main">
                <div class="pagetitle">
                    <h1>User Details</h1>
                </div><!-- End Page Title -->

                <section class="section" style="font-size: 14px;">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">User Details</h5>

                                    <p><strong>Table ID:</strong> <?php echo $row['id']; ?></p>
                                    <p><strong>Name:</strong> <?php echo $row['name']; ?></p>
                                    <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
                                    <p><strong>Phone No:</strong> <?php echo $row['phone']; ?></p>
                                    <p><strong>Category:</strong> <?php echo $row['category']; ?></p>
                                    <p><strong>Location:</strong> <?php echo $row['location']; ?></p>

          <!--       <button class="btn btn-dark" style="width: 80px; height: 35px; border-radius: 5px; color: white;" onclick="window.location.href='package_edit.php?id=<?php// echo $row['id']; ?>'">Edit</button>  -->   

                                </div>
                            </div>

                        </div>
                    </div>
                </section>
            </main><!-- End #main -->
            <?php
        } else {
            echo "User not found.";
        }

        // Free the result set
        mysqli_free_result($result);
    } else {
        // Handle the case where the query was not successful
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Email parameter is missing.";
}

// Close the database connection
mysqli_close($conn);
?>





  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>