<?php
	$filePath = realpath(dirname(__FILE__));
	include_once ($filePath.'\inc\header.php');
	include_once ($filePath.'..\..\classes\exam.php');
	$exm = new Exam();
	
?>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$addques = $exm->addQuestion($_POST);
	}

	$getTotalQues = $exm->getQues();
	$nextNo = $getTotalQues+1 ;


?>


			<section class="mainContent">
				<div class="mainBodyContente">
					<div class="container_body">
						<div class="row">
							<div class="col-md-12">
							  <div class="adminHdtext">
									<h2>Admin Login</<h2></h2>
							  </div>
							  <?php if (isset($addques)) {
							  	echo $addques;
							  } ?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-md-offset-3">
								<div class="addques">
									<form action="" method="POST">
										<table>
											<tr>
												<td>Ques No</td>
												<td>
													<input type="number" name="quesNo" 
													value="<?php if (isset($nextNo)) { echo $nextNo;} ?>" id="quesNo" />
												</td>
											</tr>
											<tr>
												<td>Question</td>
												<td>
													<input type="text" name="question" id="question" placeholder="Enter Question.." />
												</td>
											</tr>
											<tr>
												<td>Choice One</td>
												<td>
													<input type="text" name="choiceOne" id="choiceOne" placeholder="Enter Choice One.." />
												</td>
											</tr>
											<tr>
												<td>Choice Two</td>
												<td>
													<input type="text" name="choiceTwo" id="choiceTwo" placeholder="Enter Choice Two.." />
												</td>
											</tr>
											<tr>
												<td>Choice Three</td>
												<td>
													<input type="text" name="choiceThree" id="choiceThree" placeholder="Enter Choice Three.." />
												</td>
											</tr>
											<tr>
												<td>Choice Four</td>
												<td>
													<input type="text" name="choiceFour" id="choiceFour" placeholder="Enter Choice Four.." />
												</td>
											</tr>
											<tr>
												<td>Correct No</td>
												<td>
													<input type="number" name="correct" id="correct" />
												</td>
											</tr>
											<tr>
												<td></td>
												<td>
													<input type="submit" name="submit" id="submit" value="Add a Question"/>
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