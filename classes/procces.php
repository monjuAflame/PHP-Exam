<?php 

$filePath = realpath(dirname(__FILE__));
include_once ($filePath.'\..\lib\Session.php');
include_once ($filePath.'\..\lib\Database.php');
include_once ($filePath.'\..\helpers\Format.php');


/**
* Admin
*/
class Procces {
	
	private $db;
    private $fm;
        
	public function __construct(){
		$this->db = new Database();
        $this->fm = new Format();
	}

	public function processData($post, $number) {
		$selectAnsr   = $this->fm->validation($post['ans']);

		$selectAns   = mysqli_real_escape_string($this->db->link, $selectAnsr);
		$number      = mysqli_real_escape_string($this->db->link, $number);
		$next = $number+1;

		

		if (!isset($_SESSION['score'])) {
			$_SESSION['score'] = '0';
		}

		$total = $this->getTotal();
		$rightAns = $this->rightAns($number);

		if ($rightAns == $selectAns) {
			$_SESSION['score']++;
		}
		if ($number == $total) {
			header("Location:final.php");
			exit();
		} else {
			header("Location:test.php?q=".$next);
		}


	}

	private function getTotal(){
		$query = "SELECT * FROM tbl_ques";
		$result = $this->db->select($query);
		$totalRow = $result->num_rows;
		return $totalRow;
	}

	private function rightAns($number){
		$query = "SELECT * FROM tbl_ans WHERE quesNo = '$number' AND rightAns = '1'";
		$result = $this->db->select($query);
		$totalRow = $result->fetch_assoc();
		$rightId = $totalRow['id'];
		return $rightId;
	}

}
?>