<!DOCTYPE html>
<html lang="en">
	
<head>
		<meta charset="UTF-8">
		<!-- For IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- For Resposive Device -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>CCNA, CCNP, CCIE, Cisco Training Courses &amp; Certification in Cochin, Kerala, India - BSoft</title>

		<!-- Favicon -->
		<link rel="icon" type="image/png" sizes="56x56" href="images/fav-icon/icon.png">


		<!-- Main style sheet -->
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<!-- responsive style sheet -->
		<link rel="stylesheet" type="text/css" href="css/responsive.css">

	

		<!-- Fix Internet Explorer ______________________________________-->

		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<script src="vendor/html5shiv.js"></script>
			<script src="vendor/respond.js"></script>
		<![endif]-->
			
	</head>

	<body>
		<div class="main-page-wrapper theme-bg-color">


			<!-- Header _________________________________ -->
			<header class="inner-header">


				<div class="top-header">
					<div class="container">
						<div class="left-side float-left">
						<ul>
								<li><span class="icon round-border"><i class="ficon flaticon-signs"></i></span> <a href="#" class="tran3s"> Edappally, Cochin-24 & Bannarghatta Road,Bangalore</a></li>
								<li><span class="icon round-border"><i class="ficon flaticon-multimedia"></i></span> <a href="#" class="tran3s">info@bsoftnetworks.in</a></li>
								<li><span class="icon round-border"><i class="ficon flaticon-technology"></i></span> <a href="tel:+919947677711" class="tran3s">+91 99476 77711 +91 9886623909</a></li>
							</ul>
						</div> <!-- /.left-side -->
						<div class="right-side float-right">
						<ul>
								<li><a href="https://www.facebook.com/profile.php?id=100004362556146" class="tran3s round-border icon"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
		        				<li><a href="https://www.instagram.com/training_bsoft/" class="tran3s round-border icon"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
								<li><a href="https://studio.youtube.com/channel/UC-8IIiNlCpTVFT6fsvLyS1A/editing/details#:~:text=https%3A//www.youtube.com/%40techtrainingjobs1821" class="tran3s round-border icon"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
							</ul>
						</div> <!-- /.right-side -->
					</div>
				</div> <!-- /.top-header -->

				<!-- _______________________ Theme Menu _____________________ -->

				<div class="container">
					<div class="main-menu-wrapper clear-fix">
						<div class="container">
							<div class="logo float-left"><a href="index.php" style="vertical-align:middle;"><img src="images/logo/logo.png" alt="LOGO"></a></div>

							<!-- Menu -->
							<nav class="navbar float-right">
							   <!-- Brand and toggle get grouped for better mobile display -->
							   <div class="navbar-header">
							     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
							       <span class="sr-only">Toggle navigation</span>
							       <span class="icon-bar"></span>
							       <span class="icon-bar"></span>
							       <span class="icon-bar"></span>
							     </button>
							   </div>
							   <!-- Collect the nav links, forms, and other content for toggling -->
							   <div class="collapse navbar-collapse" id="navbar-collapse-1">
							     <ul class="nav navbar-nav">
							       <li><a href="index.php">Home</a></li>
							       <li><a href="about.php">About Us</a></li>
							       <li><a href="services.php">SERVICES</a></li>
							       <li><a href="course.php">courses</a></li>
							       <li class="current-page-item"><a href="gallery.php">Gallery</a></li>
							       <li><a href="contact.php">contact</a></li>
							     </ul>
							   </div><!-- /.navbar-collapse -->
							</nav>
						</div>
					</div> <!-- /.main-menu-wrapper -->
				</div>
			</header>


			<!-- Inner Page Main Banner __________________ -->
			<div class="inner-page-banner">
				<div class="opacity">
					<div class="container">
						<h2>Captured Moments</h2>
					</div> <!-- /.container -->
				</div> <!-- /.opacity -->
			</div> <!-- /.inner-page-banner -->


			<!-- Page Breadcrum __________________________ -->
			<div class="page-breadcrum">
				<div class="container">
					<ul>
					</ul>
				</div> <!-- /.container -->
			</div> <!-- /.page-breadcrum -->
			<?php
// Database credentials
$servername = "localhost";
$username = "bdbscsha_anadhu_user";
$password = "f~LXs}rdz?Vv";
$dbname = "bdbscsha_bsoft";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the Gallery table
$sql = "SELECT image FROM Gallery";
$result = $conn->query($sql);

$images = [];
if ($result->num_rows > 0) {
    // Store data in an array
    while($row = $result->fetch_assoc()) {
        $images[] = $row;
    }
} else {
    echo "0 results";
}
$conn->close();
?>

<!-- Latest News ___________________________ -->
<div class="latest-news wow fadeInUp theme-bg-color blog-v1 mb-5">
    <div class="container">
        <div class="row">
            <?php foreach($images as $image): ?>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-4">
                    <div class="card">
                        <div class="img-holder">
                            <img src="admin/uploads/<?php echo htmlspecialchars($image['image']); ?>" class="card-img-top" alt="Image">
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<style>
.latest-news .img-holder {
    overflow: hidden;
    height: 200px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.latest-news .img-holder img {
    width: 100%;
    height: auto;
    transition: transform 0.3s ease;
}
.latest-news .img-holder img:hover {
    transform: scale(1.1);
}
@media (max-width: 767.98px) {
    .latest-news .img-holder {
        height: 150px;
    }
}
@media (max-width: 575.98px) {
    .latest-news .img-holder {
        height: 100px;
    }
}
</style>



			<!-- SubsCribe Banner ___________________ -->
	        <div class="information-banner wow fadeInUp">
	        	<div class="container">
	        		<h3>Information for teachers and students, Event information and <span class="p-color">education news</span></h3>
	        		<h6> </h6>
	        		<a href="contact.php" class="p-color-bg tran3s wow fadeInUp">Contact us</a>
	        	</div> <!-- /.container -->
	        </div> <!-- /.information-banner --<!-- Footer ______________________________ -->
	        <footer>

	        	<div class="bottom-footer" style="margin-top:0 !important;">
	        		<p>Copyright 2024 &copy; <a href="javascript://" class="tran3s" target="_blank">Bsoft</a> <span>|</span> Designed by <span class="p-color">IIT Solutions</span></p>
	        	</div> <!-- /.bottom-footer -->
	        </footer>

	        <!-- Scroll Top Button -->
			<button class="scroll-top tran3s p-color-bg">
				<i class="fa fa-angle-up" aria-hidden="true"></i>
			</button>
			<!-- pre loader  -->
		 	<div id="loader-wrapper">
				<div id="loader"></div>
			</div>





		<!-- Js File_________________________________ -->

		<!-- j Query -->
		<script type="text/javascript" src="vendor/jquery-2.1.4.js"></script>

		<!-- Bootstrap JS -->
		<script type="text/javascript" src="vendor/bootstrap/bootstrap.min.js"></script>

		<!-- Vendor js _________ -->
		<!-- revolution -->
		<script src="vendor/revolution/jquery.themepunch.tools.min.js"></script>
		<script src="vendor/revolution/jquery.themepunch.revolution.min.js"></script>
		<script type="text/javascript" src="vendor/revolution/revolution.extension.slideanims.min.js"></script>
		<script type="text/javascript" src="vendor/revolution/revolution.extension.layeranimation.min.js"></script>
		<script type="text/javascript" src="vendor/revolution/revolution.extension.navigation.min.js"></script>
		<script type="text/javascript" src="vendor/revolution/revolution.extension.kenburn.min.js"></script>
		<script type="text/javascript" src="vendor/revolution/revolution.extension.actions.min.js"></script>

		<!-- Google map js -->
		<script src="http://maps.google.com/maps/api/js"></script> <!-- Gmap Helper -->
		<script src="vendor/gmap.js"></script>
		<!-- Bootstrap Select JS -->
		<script type="text/javascript" src="vendor/bootstrap-select/dist/js/bootstrap-select.js"></script>
		<!-- Time picker -->
		<script type="text/javascript" src="vendor/time-picker/jquery.timepicker.min.js"></script>
		<!-- WOW js -->
		<script type="text/javascript" src="vendor/WOW-master/dist/wow.min.js"></script>
		<!-- owl.carousel -->
		<script type="text/javascript" src="vendor/owl-carousel/owl.carousel.min.js"></script>
		<!-- js count to -->
		<script type="text/javascript" src="vendor/jquery.appear.js"></script>
		<script type="text/javascript" src="vendor/jquery.countTo.js"></script>

		<!-- Theme js -->
		<script type="text/javascript" src="js/theme.js"></script>

		</div> <!-- /.main-page-wrapper -->
	</body>

</html>