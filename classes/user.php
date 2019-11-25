<?php 

$filePath = realpath(dirname(__FILE__));
include_once ($filePath.'\..\lib\Database.php');
include_once ($filePath.'\..\lib\Session.php');
include_once ($filePath.'\..\helpers\Format.php');


/**
* Admin
*/
class User {
	
	private $db;
    private $fm;
        
	public function __construct(){
		$this->db = new Database();
        $this->fm = new Format();
	}

	public function userRegistration($name, $username, $password, $email){
		
		$name     = $this->fm->validation($name);
		$username = $this->fm->validation($username);
		$password = $this->fm->validation($password);
		$email    = $this->fm->validation($email);

		$name      = mysqli_real_escape_string($this->db->link, $name);
		$username  = mysqli_real_escape_string($this->db->link, $username);
		$password  = mysqli_real_escape_string($this->db->link, md5($password));
		$email     = mysqli_real_escape_string($this->db->link, $email);

		if ($name == "" || $username == "" || $password == "" || $email == "") {
			echo "<span class='error'> Field Must be Empty !</span>";
			exit();
		} elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
			echo "<span class='error'>Invalid Email Address !</span>";
			exit();
		} else {
			$chkquery = "SELECT * FROM tbl_user WHERE email = '$email'";
			$chkEmail = $this->db->select($chkquery);
			if ($chkEmail != false) {
				echo "<span class='error'>Email Already Exists !</span>";
				exit();
			} else {
				$query = "INSERT INTO tbl_user(name, username, password, email) VALUES('$name', '$username', '$password', '$email')";
				$insert = $this->db->insert($query);
				if ($insert) {
					echo "<span class='success'>User Registration Successfully !</span>";
					exit();
				} else {
					echo "<span class='error'>User Not Registration !</span>";
					exit();
				}
			}
		}

	}

	public  function userLogin($email, $password){
		$email    = $this->fm->validation($email);
		$password = $this->fm->validation($password);

		$email    = mysqli_real_escape_string($this->db->link, $email);
		$password = mysqli_real_escape_string($this->db->link, md5($password));

		if ($email == "" || $password == "") {
			echo "empty";
			exit();
		} else {
			$query  = "SELECT * FROM tbl_user WHERE email = '$email' AND password = '$password'";
			$result = $this->db->select($query);
			if ($result != false) {
				$value  = $result->fetch_assoc();
				if ($value['status'] == '1') {
					echo "disable";
					exit();
				} else {
					Session::init();
					Session::set("login", true);
					Session::set("userId", $value['id']);
					Session::set("userName", $value['username']);
					Session::set("name", $value['name']);
				}
			} else  {
				echo "error";
					exit();
			}
		}
	}

	public  function getUserData(){
		$query  = "SELECT * FROM tbl_user ORDER BY id DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function updateUserDis($disableUser) {
		$query = "UPDATE tbl_user
				  SET
				  status = '1'
				  WHERE id = '$disableUser'";
		$result = $this->db->update($query);
		if ($result) {
			$msg = "<span class='success'>User Disabled !</span>";
			return $msg;
		} else {
			$msg = "<span class='error'>User Not Disabled !</span>";
			return $msg;
		}
	}
	public function updateUserEna($enableUser) {
		$query = "UPDATE tbl_user
				  SET
				  status = '0'
				  WHERE id = '$enableUser'";
		$result = $this->db->update($query);
		if ($result) {
			$msg = "<span class='success'>User Enabled !</span>";
			return $msg;
		} else {
			$msg = "<span class='error'>User Not Enabled !</span>";
			return $msg;
		}
	}
	public function deleteUser($delUser)  {
		$query = "DELETE FROM tbl_user WHERE id='$delUser'";
		$result = $this->db->delete($query);
		if ($result) {
			$msg = "<span class='success'>User Removed !</span>";
			return $msg;
		} else {
			$msg = "<span class='error'>User Not Removed !</span>";
			return $msg;
		}
	}

	// End Admin data



	// Began Front Data
	public  function getUserProfileData($userId){
		$query  = "SELECT * FROM tbl_user WHERE id = '$userId'";
		$result = $this->db->select($query);
		$data = $result->fetch_assoc();
		return $data;
	}

	public function userProfileUp($post,$userId) {

		$name = $post['name'];
		$username = $post['username'];
		$email = $post['email'];

		$name    = $this->fm->validation($name);
		$username = $this->fm->validation($username);
		$email = $this->fm->validation($email);

		$name    = mysqli_real_escape_string($this->db->link, $name);
		$username = mysqli_real_escape_string($this->db->link, $username);
		$email = mysqli_real_escape_string($this->db->link, $email);

		if ($name == "" || $username == "" || $email == "") {
			$msg = "<span class='error'>Field Must Empty !</span>";
			return $msg;
		} else {

				$query = "UPDATE tbl_user
						  SET
						  name = '$name',
						  username = '$username',
						  email  = '$email'
						  WHERE id = '$userId'";
				$result = $this->db->update($query);
				if ($result) {
					$msg = "<span class='success'>Profile Updated !</span>";
					return $msg;
				} else {
					$msg = "<span class='error'>Profile Not Updates !</span>";
					return $msg;
				}
		}
	}

}
?>