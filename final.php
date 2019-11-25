<?php include 'inc/header.php'; ?>
<?php
	Session::checkSession();

?>



			<section class="mainContent">
				<div class="mainBodyContente">
					<div class="container_body">
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								<div class="bodyHeadertText">
									<h2>You Are Done !</h2>
									
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								<div class="final">
									<p>Congratulation ! You just complete the test...</p>
									<p>Final Score: 
										<?php 
											if (isset($_SESSION['score'])) {
												echo $_SESSION['score'];
												unset($_SESSION['score']);
											}
										?>
									</p>
									<a href="viewans.php">View Answer</a>
									<a href="strttest.php">Start Again</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
				
	<?php include 'inc/footer.php';?>