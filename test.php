<?php include 'inc/header.php'; ?>
<?php
	Session::checkSession();

	if (isset($_GET['q'])) {
		$number = $_GET['q'];
	} else  {
		header("'Location:exam.php'");
	}
	$total = $exm->getQues();
	$getQues = $exm->getQuestionNumber($number);

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		if (isset($_POST['ans']) == "") {
			$msg = "<span class='error'>Please Select a Ans !</span>";
		} else {
		$process  = $pro->processData($_POST, $number);
		}

	}

?>

			<section class="mainContent">
				<div class="mainBodyContente">
					<div class="container_body">
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								<div class="bodyHeadertText">
									<h2>Question <?php echo $getQues['quesNo']; ?> of <?php echo $total; ?></h2>
									
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-10 col-md-offset-1">
								<div class="test">
									<form action="" method="post">
									<?php 
										if (isset($msg)) {
											echo $msg;
										}
									?>
										<table>
											<tr>
												<td colspan="2">
													<h3>Ques <?php echo $getQues['quesNo']; ?>: <?php echo $getQues['ques']; ?></h3>
												</td>
											</tr>

											<tr>
											<?php 
												$getAns = $exm->getAnswer($number);
												if ($getAns) {
													while ($result = $getAns->fetch_assoc()) {
											?>
												<td>
													<input type="radio" name="ans"  value="<?php echo $result['id']; ?>" /> <?php echo $result['ans']; ?>
												</td>
											</tr>
											<?php } } ?>
											<tr>
												<td>
													<input type="submit" name="submit" value="Next Ques" />
												</td>
											</tr>
										</table>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
				
	<?php include 'inc/footer.php';?>