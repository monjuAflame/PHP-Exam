<?php include 'inc/header.php'; ?>
<?php
	Session::checkSession();
	$userId = Session::get('userId');

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$userProfileUp  = $usr->userProfileUp($_POST,$userId);
	}
?>



			<section class="mainContent">
				<div class="mainBodyContente">
					<div class="container_body">
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								<div class="bodyHeadertText">
									<h2>Your Profile</h2>
									
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								<div class="adminLloginFunctionArea">
									<form action="" method="POST">
									<?php 
										$profileData = $usr->getUserProfileData($userId);
									?>
										<table>
											<tr>
												<td>Name</td>
												<td>
													<input type="text" name="name" id="name" value="<?php echo $profileData['name']; ?>" />
												</td>
											</tr>
											<tr>
												<td>Username</td>
												<td>
													<input type="text" name="username" id="username" value="<?php echo $profileData['username']; ?>" />
												</td>
											</tr>
											<tr>
												<td>Email</td>
												<td>
													<input type="text" name="email" id="email" value="<?php echo $profileData['email']; ?>" />
												</td>
											</tr>
											<tr>
												<td></td>
												<td>
													<input type="submit" name="submit" id="profilesubmit" value="Update"/>
												</td>
											</tr>
											<tr> 
											<?php if (isset($userProfileUp)) {
												echo $userProfileUp;
													}
											?>

<!--		<span class="empty" style="display: none;">Field Must be Empty !</span>
<span class="invalide" style="display: none;">invalide Email !</span>
<span class="chkmail" style="display: none;">Email already Exits !</span>
<span class="success" style="display: none;">Updated Successfully !</span>
<span class="error" style="display: none;">Not Updated !</span> -->
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