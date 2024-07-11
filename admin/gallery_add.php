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

  <main id="main" class="main">

    <div class="pagetitle">
        <h1>Add Gallery</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item">Gallery</li>
                <li class="breadcrumb-item active">Add Gallery</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Added Gallery will display on the website</h5>

                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="image" class="form-control" required> 
                                </div>
                            </div>
                        

                            <div class="row mb-3">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" name="submit" class="btn btn-primary">Add Gallery</button>
                                </div>
                            </div>
                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>

        </div>
    </section>

  </main><!-- End #main -->

<?php

if(isset($_POST['submit'])) {

    $image = $_POST['image'];
     
    // File upload handling
    $target_dir = "uploads/"; 
    $random_number = mt_rand(100000, 999999); // 6-digit random number
    $target_file = $target_dir . "service_images" . $random_number . '_' . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); 

    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check === false) {
        echo "Error: File is not an image.";
        $uploadOk = 0;
    }
    // Check file size only allow less than 1000kb
    if ($_FILES["image"]["size"] > 1000000) {
        echo "Error: Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");
    if(!in_array($imageFileType, $allowedExtensions)) {
        echo "Error: Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Error: Sorry, your file was not uploaded. Only JPG files up to 1000KB are allowed.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image_name = basename($target_file);
            $sql = "INSERT INTO Gallery (image) 
                    VALUES ('$image_name')";

            // Execute the query
            if ($conn->query($sql) === TRUE) {
                echo "<script>window.location.href = 'gallery_view.php';</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error: Sorry, there was an error uploading your file.";
        }
    }
}

// Close the connection
$conn->close();
?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
