<?php 

$filePath = realpath(dirname(__FILE__));
include_once ($filePath.'\classes\user.php');
$us = new User();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name = $_POST['name'];
	$username = $_POST['username'];
	$email = $_POST['email'];

	$updateUser  = $us->userProfileUp($name, $username, $email);
}














?>
