<?php include 'inc/header.php'; ?>
<?php
	Session::checkSession();
	$question = $exm->getQuestionTest();
	$total = $exm->getQues();

?>



			<section class="mainContent">
				<div class="mainBodyContente">
					<div class="container_body">
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								<div class="bodyHeadertText">
									<h2>Welcome To Online Exam</h2>
									
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								<div class="strttest">
									<h3>Test Your Knowladge</h3>
									<p>This is multiple choice quize to test your konowladge</p>
									<ul>
										<li><strong>Number of Question:</strong> <?php echo $total; ?></li>
										<li><strong>Question type:</strong> Multiplle Choice</li>
									</ul>
									<a href="test.php?q=<?php echo $question['quesNo']; ?>">Start Test</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
				
	<?php include 'inc/footer.php';?>