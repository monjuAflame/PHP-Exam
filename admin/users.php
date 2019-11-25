<?php
	$filePath = realpath(dirname(__FILE__));
	include_once ($filePath.'\inc\header.php');
	include_once ($filePath.'..\..\classes\user.php');
	$us = new User();
	
?>
<?php  
	if (isset($_GET['dis'])) {
		$disableUser = $_GET['dis'];
		$upDisable = $us->updateUserDis($disableUser);
	}
	if (isset($_GET['ena'])) {
		$enableUser = $_GET['ena'];
		$upEnable = $us->updateUserEna($enableUser);
	}
	if (isset($_GET['del'])) {
		$delUser = $_GET['del'];
		$deleteUser = $us->deleteUser($delUser);
	}
?>

				<div class="mainBodyContente">
					<div class="container_body">
						<div class="row">
							<div class="col-md-12">
							  <div class="adminHdtext">
									<h2>Admin Panel - Manage user</h2>
							  </div>
							  <?php
										if (isset($upDisable)) {
											echo $upDisable;
										} elseif (isset($upEnable)) {
											echo $upEnable;
										} elseif (isset($deleteUser)) {
											echo $deleteUser;
										}
									?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="manageUser">
									<table>
										<tr>
											<th>No</th>
											<th>Name</th>
											<th>Username</th>
											<th>Email</th>
											<th>Action</th>
										</tr>
						<?php 
							$getUserData = $us->getUserData();
							if ($getUserData) {
								$i = 0;
								while ($result = $getUserData->fetch_assoc()) {
									$i++
						?>
										<tr>
											<td>
												<?php
													if ($result['status'] == '1') { 
														echo "<span class='error'>".$i."</span>";
													} else {
														echo $i;
													}
												?>
											</td>
											<td><?php echo $result['name']; ?></td>
											<td><?php echo $result['username']; ?></td>
											<td><?php echo $result['email']; ?></td>
											<td>
											<?php if ($result['status'] == '0') { ?>
												<a onclick="return confirm('Are you sure to Disable')" href="?dis=<?php echo $result['id'];?>">Disable</a> 
											<?php } else { ?>
												<a onclick="return confirm('Are you sure to Enable')" href="?ena=<?php echo $result['id'];?>">Enable</a>
											<?php } ?>
												|| <a onclick="return confirm('Are you sure to Remove')" href="?del=<?php echo $result['id'];?>">Remove</a>
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