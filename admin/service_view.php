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

  <title>B-soft</title>
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
        <span class="d-none d-lg-block">B-soft Admin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
  </header><!-- End Header -->

  <!-- Sidebar -->
  <?php include 'sidebar.php'; ?>

  <?php
  $sql = "SELECT * FROM Service";
  $result = mysqli_query($conn, $sql);

  if ($result) {
  ?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>View Services</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Services</li>
          <li class="breadcrumb-item active">View Services</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Service Table</h5>

              <table class="table">
                <thead>
                  <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // Loop through the result set and populate the table rows
                  while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                  <tr>
                    <td><img src="uploads/<?php echo $row['image']; ?>" height="30" width="50"></td>
                    <td><?php echo $row['name']; ?></td>
                    <td>
                      <?php
                      $truncatedDescription = substr($row['description'], 0, 80);
                      echo $truncatedDescription;

                      // Display "See more" link if the description is longer than 100 characters
                      if (strlen($row['description']) > 100) {
                        echo '<a href="service_edit.php?id=' . $row['id'] . '" style="color: #FB0E7D;">&nbsp;&nbsp;&nbsp;See more..</a>';
                      }
                      ?>
                    </td>
                    <td><?php echo $row['status']; ?></td>
                    <td><button class="btn btn-dark" style="width: 80px; height: 35px; border-radius: 5px; color: white;" onclick="window.location.href='service_edit.php?id=<?php echo $row['id']; ?>'">Edit</button></td>
                    <td><button class="btn btn-danger" style="width: 80px; height: 35px; border-radius: 5px; color: white;" onclick="window.location.href='service_delete.php?id=<?php echo $row['id']; ?>'">Delete</button></td>
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
