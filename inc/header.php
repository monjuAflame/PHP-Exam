<?php
	$filePath = realpath(dirname(__FILE__));
	include_once ($filePath.'\..\lib\Session.php');
	Session::init();
	include_once ($filePath.'\..\lib\Database.php');
	include_once ($filePath.'\..\helpers\Format.php');
	
	spl_autoload_register(function($class){
		include_once "classes/".$class.".php";
	});


	$db = new Database();
	$fm = new Format();
	$exm = new Exam();
	$usr = new User();
	$pro = new Procces();
?>
<?php
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: pre-check=0, post-check=0, max-age=0");
    header("Pragma: no-cache ");
    header("Expires: Mon, 6 Dec 1977 00:00;00 GMT");
    header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");

?>
<?php
	if (isset($_GET['action']) && $_GET['action'] == 'logout') {
		Session::destroy();
		header("Location:index.php");
		exit();
	}
?>
<html>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author">
    <title>Exam System</title>
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="css/font-awesome.min.css" rel="stylesheet" media="screen">
		<link href="css/animate.css" rel="stylesheet" media="screen">
		<link href="css/style.css" rel="stylesheet" media="screen">
		<link href="css/responsive.css" rel="stylesheet" media="screen">
		<!-- JavaScript -->
		<script type="text/javascript" src="js/jquery.min.js"></script>
	</head>
	<body>
			<!-- / -->
			
		<section class="body container_custom">
			<section class="header">
				<div class="container_body">
					<div class="row">
						<div class="col-md-12">
							<div class="text">
								<h3>Online Exam System PHP OOP jQuery Ajax</h3>
								<i class="fa fa-check-square-o"></i>
							</div>
							<div class="img">
								<img src="images/" alt="" />
							</div>
						</div>
					</div>
				</div>
			</section>	

			<section class="mainContent">
				<div class="mainMenuArea">
					<div class="container_body">
						<div class="row">
							<div class="col-md-12">
								<div class="menu">
									<ul>
										<?php 
											$login = Session::get('login');

											if ($login == true) { ?>
												<li><a href="profile.php">Profile</a></li>
												<li><a href="exam.php">Exam</a></li>
												<li><a href="?action=logout">Logout</a></li>
											<?php } else { ?>
												<li><a href="index.php">Login</a></li>
												<li><a href="register.php">Register</a></li>
											<?php } ?>
										
									</ul>
									<?php if ($login == true) { ?>
									<span class="userName text-right">
										Welcome <strong><?php echo Session::get('name'); ?></strong>
									</span>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>