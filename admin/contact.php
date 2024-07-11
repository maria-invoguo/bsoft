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

    <title>Chayakkada</title>
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
                <span class="d-none d-lg-block">Chayakkada Admin</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>

        </div><!-- End Logo -->

    </header><!-- End Header -->

    <!-- Sidebar -->
    <?php include 'sidebar.php'; ?>
    <?php include 'db.php'; ?>
    <!-- Main Content -->
    <?php
    // Fetch contact details from the database
    $sql = "SELECT * FROM contact";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['id']; // Initialize $id
    ?>

        <main id="main" class="main">

            <div class="pagetitle">
                <h1>Contact</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">Pages</li>
                        <li class="breadcrumb-item active">Contact</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

            <section class="section contact">

                <div class="row gy-4">

                    <div class="col-xl-6">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="info-box card">
                                    <i class="bi bi-geo-alt"></i>
                                    <h3>Address</h3>
                                    <p>kaloor, Kochi, Kerala</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="info-box card">
                                    <i class="bi bi-telephone"></i>
                                    <h3>Call Us</h3>
                                    <p><?php echo $row['phone']; ?><br></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="info-box card">
                                    <i class="bi bi-envelope"></i>
                                    <h3>Email Us</h3>
                                    <p><?php echo $row['email']; ?></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="info-box card">
                                    <i class="bi bi-clock"></i>
                                    <h3>Open Hours</h3>
                                    <p>Monday - Saturday _ 10:00AM - 05:00PM</p>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="col-xl-6">
                        <div class="card p-4">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Phone no.</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="phone" class="form-control" value="<?php echo $row['phone']; ?>">
                                    </div>
                                    <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="email" class="form-control" value="<?php echo $row['email']; ?>">
                                    </div>
                                    <label for="inputText" class="col-sm-2 col-form-label">WhatsApp</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="whatsapp" class="form-control" value="<?php echo $row['whatsapp']; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-10 offset-sm-2">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <button type="submit" name="submit" class="btn btn-primary">Update Contact</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </section>
        </main><!-- End #main -->

    <?php
    } else {
        echo "Contact details not found.";
    }
    ?>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
        $id = $_POST['id'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $whatsapp = $_POST['whatsapp'];

        // Update the database
        $sqlUpdate = "UPDATE contact SET phone=?, email=?, whatsapp=? WHERE id=?";

        // Use prepared statement
        $stmt = $conn->prepare($sqlUpdate);

        // Bind parameters
        $stmt->bind_param("sssi", $phone, $email, $whatsapp, $id);

        // Execute the prepared statement
        if ($stmt->execute()) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    }

    // Close the database connection
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
