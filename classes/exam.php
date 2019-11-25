<?php 

$filePath = realpath(dirname(__FILE__));
include_once ($filePath.'\..\lib\Database.php');
include_once ($filePath.'\..\helpers\Format.php');


/**
* Admin
*/
class Exam {
	
	private $db;
    private $fm;
        
	public function __construct(){
		$this->db = new Database();
        $this->fm = new Format();
	}
	
	public function addQuestion($post) {
		$quesNo   = mysqli_real_escape_string($this->db->link, $post['quesNo']);
		$question = mysqli_real_escape_string($this->db->link, $post['question']);
		$ans1 = mysqli_real_escape_string($this->db->link, $post['choiceOne']);
		$ans2 = mysqli_real_escape_string($this->db->link, $post['choiceTwo']);
		$ans3 = mysqli_real_escape_string($this->db->link, $post['choiceThree']);
		$ans4 = mysqli_real_escape_string($this->db->link, $post['choiceFour']);
		$rightans = mysqli_real_escape_string($this->db->link, $post['correct']);

		$ans = array();
		$ans[1] = $ans1;
		$ans[2] = $ans2;
		$ans[3] = $ans3;
		$ans[4] = $ans4;

		$query = "INSERT INTO tbl_ques(quesNo, ques) VALUES ('$quesNo', '$question')";
		$insertques = $this->db->insert($query);
		if ($insertques) {
			foreach ($ans as $key => $anserName) {
				if ($anserName != '') {
					if ($rightans == $key) {
						$rquery = "INSERT INTO tbl_ans(quesNo, rightAns, ans) VALUES ('$quesNo', '1', '$anserName')";  
					} else {
						$rquery = "INSERT INTO tbl_ans(quesNo, rightAns, ans) VALUES ('$quesNo', '0', '$anserName')";
					}
					$insertans = $this->db->insert($rquery);
					if ($insertans) {
						continue;
					} else {
						die('Error...');
					}
				}
			}
			$msg = "<span class='success'>Question Added Successfully..</span>";
			return $msg;
		}

	}

	public function getQuesOrderBy(){
		$query = "SELECT * FROM tbl_ques ORDER BY quesNo ASC";
		$result = $this->db->select($query);
		return $result;
	}

	public function activeQuestions($quesNo){
		$query = "UPDATE tbl_ques
				  SET
				  status = '0'
				  WHERE quesNo = '$quesNo'";
		$result = $this->db->update($query);
		if ($result) {
			$msg = "<span class='success'>Question Active !</span>";
			return $msg;
		} else {
			$msg = "<span class='error'>Question Not Active !</span>";
			return $msg;
		}
	}

	public function deactiveQuestions($quesNo){
		$query = "UPDATE tbl_ques
				  SET
				  status = '1'
				  WHERE quesNo = '$quesNo'";
		$result = $this->db->update($query);
		if ($result) {
			$msg = "<span class='success'>Question Deactive !</span>";
			return $msg;
		} else {
			$msg = "<span class='error'>Question Not Deactive !</span>";
			return $msg;
		}
	}

	public function delQuestions($quesNo){
		$tables = array("tbl_ques","tbl_ans");
		foreach ($tables as $table ) {
			$query = "DELETE FROM $table WHERE quesNo = '$quesNo'";
			$result = $this->db->delete($query);
		}
		if ($result) {
			$msg = "<span class='success'>Question Deleted Successfully..</span>";
			return $msg;
		} else {
			$msg = "<span class='error'>Question Not Deleted !</span>";
			return $msg;
		}
	}



	// front 
	public function getQues() {
		$query = "SELECT * FROM tbl_ques";
		$result = $this->db->select($query);
		$totalRow = $result->num_rows;
		return $totalRow;
	}

	public function getQuestionTest() {
		$query = "SELECT * FROM tbl_ques";
		$result = $this->db->select($query);
		$data = $result->fetch_assoc();
		return $data;
	}
	public function getQuestionNumber($number) {
		$query = "SELECT * FROM tbl_ques WHERE quesNo = '$number'";
		$result = $this->db->select($query);
		$data = $result->fetch_assoc();
		return $data;
	}
	public function getAnswer($number) {
		$query = "SELECT * FROM tbl_ans WHERE quesNo = '$number'";
		$result = $this->db->select($query);
		return $result;
	}


	





}
?>