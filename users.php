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

$sql = "SELECT * FROM user ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

if ($result) {
?>



    <main id="main" class="main">
        <div class="pagetitle">
            <h1>View All Users</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">View All Users</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">User Details</h5>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Category</th>
                                        <th>Location</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Loop through the result set and populate the table rows
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['phone']; ?></td>
                                            <td><?php echo $row['category']; ?></td>
                                            <td><?php echo $row['location']; ?></td>

                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>

            </div>
        </section>
    </main><!-- End #main -->

    </body>
    </html>
    <?php
} else {
    // Handle the case where the query was not successful
    echo "Error: " . mysqli_error($conn);
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