<?php
	$filePath = realpath(dirname(__FILE__));
	include_once ($filePath.'\inc\header.php');
	include_once ($filePath.'..\..\classes\exam.php');
	$exm = new Exam();
	
?>
<?php
	if (isset($_GET['actques'])) {
		$quesNo  = $_GET['actques'];
		$actQues = $exm->activeQuestions($quesNo);
	}
	if (isset($_GET['deactques'])) {
		$quesNo  = $_GET['deactques'];
		$deactQues = $exm->deactiveQuestions($quesNo);
	}
	if (isset($_GET['delques'])) {
		$quesNo  = $_GET['delques'];
		$delQues = $exm->delQuestions($quesNo);
	}
?>

				<div class="mainBodyContente">
					<div class="container_body">
						<div class="row">
							<div class="col-md-12">
							  <div class="adminHdtext">
									<h2>Admin Panel - Questions List</h2>
							  </div>
							  <?php
							  		if (isset($delQues)) {
							  			echo $delQues;
							  		}
							  ?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="manageUser">
									<table>
										<tr>
											<th width="5%">No</th>
											<th width="70%">Questions</th>
											<th width="10%">Status</th>
											<th width="10%">Action</th>
										</tr>
						<?php 
							$getQuesData = $exm->getQuesOrderBy();
							if ($getQuesData) {
								$i = 0;
								while ($result = $getQuesData->fetch_assoc()) {
									$i++
						?>
										<tr>
											<td><?php echo $i; ?></td>
											<td><?php echo $result['ques'];?></td>
											<td>
												<a href="?actques=<?php echo $result['quesNo'];?>" >
											<?php 
												if ($result['status'] == '1') {
													echo "<span style='color:green'>Active</span>";
												}
											?>
												</a> 
												<a href="?deactques=<?php echo $result['quesNo'];?>">
											<?php 
												if ($result['status'] == '0') {
													echo "<span style='color:red'>Deactive</span>";
												}
											?>
												</a>
											</td>
											<td>
												<a onclick="return confirm('Are you sure to Remove')" href="?delques=<?php echo $result['quesNo'];?>">Remove</a>
											</td>
										</tr>
						<?php } } ?>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			
	<?php include 'inc/footer.php';?>