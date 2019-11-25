<?php
	$filePath = realpath(dirname(__FILE__));
	include_once ($filePath.'\inc\adminHeader.php');
	include_once ($filePath.'..\..\classes\admin.php');
	$ad = new Admin();
	
?>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$adminData = $ad->getAdminData($_POST);
	}
?>


			<section class="mainContent">
				<div class="mainBodyContente">
					<div class="container_body">
						<div class="row">
							<div class="col-md-12">
							  <div class="adminHdtext">
									<h2>Admin Login</<h2></h2>
							  </div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-md-offset-3">
								<div class="adminLloginFunctionArea">
									<form action="" method="POST">
										<table>
											<tr>
												<td>Username</td>
												<td>
													<input type="text" name="adminUser" id="email" />
												</td>
											</tr>
											<tr>
												<td>Password</td>
												<td>
													<input type="password" name="adminPass" id="pass" />
												</td>
											</tr>
											<tr>
												<td></td>
												<td>
													<input type="submit" name="submit" id="submit" value="Login"/>
												</td>
											</tr>
											<tr>
												<td colspan="2">
													<?php 
														if (isset($adminData)) {
															echo $adminData;
														} 
													?>
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