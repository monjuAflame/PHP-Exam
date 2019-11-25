<?php include 'inc/header.php'; ?>
<?php
	Session::checkSession();

	
	$total = $exm->getQues();

	

?>



			<section class="mainContent">
				<div class="mainBodyContente">
					<div class="container_body">
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								<div class="bodyHeadertText">
									<h2>All Question & Ans : <?php echo $total; ?></h2>
									
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-10 col-md-offset-1">
								<div class="test">
										<table>
										<?php 
											$allQues = $exm->getQuesOrderBy();
											if ($allQues) {
												while ($result = $allQues->fetch_assoc()) {
											?>
											<tr>
												<td colspan="4">
													<h3>Ques <?php echo $result['quesNo']; ?>: <?php echo $result['ques']; ?></h3>
												</td>
											</tr>

											
											<?php 
												$number = $result['quesNo'];
												$getAns = $exm->getAnswer($number);
												if ($getAns) {
													while ($aresult = $getAns->fetch_assoc()) {
											?>
											<tr>
												<td>
													<input type="radio" 
													<?php 
														if ($aresult['rightAns'] == '1') { echo "checked"; }
													?>
													/> 
													<?php 
													if ($aresult['rightAns'] == '1') { 
														 echo "<span style='color:blue;'>".$aresult['ans']."</span>";
													} else {
														echo $aresult['ans'];
													} ?>
												</td>
											</tr>
											<?php } } ?>
											
										<?php } } ?>
										</table>

										<div class="link"><a href="strttest.php">Start Again</a></div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
				
	<?php include 'inc/footer.php';?>