<?php
	$filePath = realpath(dirname(__FILE__));
	include_once ($filePath.'\..\..\lib\Session.php');
	Session::checkAdminSession();
	include_once ($filePath.'\..\..\lib\database.php');
	include_once ($filePath.'..\..\classes\admin.php');
	
	$db = new Database();
	$admin = new Admin();
?>
<?php
	if (isset($_GET['action']) && $_GET['action'] == 'logout') {
		Session::destroy();
		header("Location:login.php");
	}
?>
<?php
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: pre-check=0, post-check=0, max-age=0");
    header("Pragma: no-cache ");
    header("Expires: Mon, 6 Dec 1977 00:00;00 GMT");
    header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");

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
								<h3>Administration - Control Panel</h3>
								<i class="fa fa-users"></i>
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
										<li><a href="index.php">home</a></li>
										<li><a href="users.php">Manage user</a></li>
										<li><a href="quesadd.php">Add Ques</a></li>
										<li><a href="queslist.php">Ques List</a></li>
										<li><a href="?action=logout">Logout</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>