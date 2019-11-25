<?php 

$filePath = realpath(dirname(__FILE__));
include_once ($filePath.'\..\classes\user.php');
$us = new User();



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$email = $_POST['email'];
	$password = $_POST['password'];

	$loginUser  = $us->userLogin($email, $password);
}














?>
