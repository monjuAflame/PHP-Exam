<?php
	$filePath = realpath(dirname(__FILE__));
	include_once ($filePath.'\..\..\lib\Session.php');
	Session::checkAdminLogin();
	include_once ($filePath.'\..\..\classes\admin.php');
    $admin = new Admin();


	
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
		<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="../css/font-awesome.min.css" rel="stylesheet" media="screen">
		<link href="../css/style.css" rel="stylesheet" media="screen">
		<script type="text/javascript" src="../js/jquery.min.js"></script>
	</head>
	<body>
			<!-- / -->
			
		<section class="body container_custom">
			<section class="header">
				<div class="container_body">
					<div class="row">
						<div class="col-md-12">
							<div class="text">
								<h3>Admin panel</h3>
								<i class="fa fa-user"></i>
							</div>
							<div class="img">
								<img src="images/" alt="" />
							</div>
						</div>
					</div>
				</div>
                        </section>

