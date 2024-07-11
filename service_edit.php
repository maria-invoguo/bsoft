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

<!-- //////////////////////////////////////////////////////////////Sidebar//////// -->
<?php include 'sidebar.php'; ?>

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Edit Service</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item">Service</li>
        <li class="breadcrumb-item active">Edit Service</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Edit Service Details</h5>

            <?php
            if(isset($_GET['id'])) {
                $id = $_GET['id'];

                // Fetch package details from the database
                $sql = "SELECT * FROM Service WHERE id = $id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    ?>

                    <form action="" method="post" enctype="multipart/form-data">
                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                          <input type="file" name="image" class="form-control-file">
                          <?php 
                              $image_path = 'uploads/' . $row['image'];
                              if (file_exists($image_path)) {
                                  echo '<img src="' . $image_path . '" alt="Uploaded Image" style="max-width: 10%; height: auto;">';
                              } else {
                                  echo 'Image not found';
                              }
                          ?>
                        </div>
                      </div>
                      
                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputMessage" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                          <textarea name="description" class="form-control" style="height: 100px"><?php echo $row['description']; ?></textarea>
                        </div>
                      </div>
                      
                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                          <select name="status" class="form-select">
                            <option value="active" <?php echo ($row['status'] == 'active') ? 'selected' : ''; ?>>Active</option>
                            <option value="not_active" <?php echo ($row['status'] == 'not_active') ? 'selected' : ''; ?>>Not Active</option>
                          </select>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <div class="col-sm-10 offset-sm-2">
                          <input type="hidden" name="id" value="<?php echo $id; ?>">
                          <button type="submit" name="update" class="btn btn-primary">Update Item</button>
                        </div>
                      </div>
                    </form>

                    <?php
                } else {
                    echo "Service not found.";
                }
            } else {
                echo "Service ID not specified.";
            }
            ?>

          </div>
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>
</html>
<?php

// Update Logic
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    // Check if an image is selected
    if ($_FILES['image']['name'] != '') {
        $image = $_FILES['image']['name'];
        $image_temp = $_FILES['image']['tmp_name'];
        
        // Move uploaded image to desired directory
        move_uploaded_file($image_temp, "uploads/$image");
        
        // Update with image field
        $sql = "UPDATE Service SET 
                image = '$image',
                name = '$name', 
                description = '$description', 
                status = '$status'
                WHERE id = $id";
    } else {
        // Update without image field
        $sql = "UPDATE Service SET 
                name = '$name', 
                description = '$description', 
                status = '$status'
                WHERE id = $id";
    }

    if ($conn->query($sql) === TRUE) {
        echo "<script>window.location.href = 'service_view.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>
