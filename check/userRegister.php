<?php 

$filePath = realpath(dirname(__FILE__));
include_once ($filePath.'\..\classes\user.php');
$us = new User();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name = $_POST['name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];

	$addUser  = $us->userRegistration($name, $username, $password, $email);
}














?>
