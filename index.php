
			
    <?php include 'inc/header.php'; ?>
<?php
	Session::checkLogin();
?>
		
				<div class="mainBodyContente">
					<div class="container_body">
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								<div class="bodyHeadertText">
									<h2>Online Exam System - User Login</h2>
									
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="bodyImage">
									<div class="icon">
										<i class="fa fa-desktop"></i>
										<div class="styleIcon">
											<i class="fa fa-unlock-alt"></i>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="functionArea">
									<form action="" method="post">
										<table>
											<tr>
												<td>Email</td>
												<td>
													<input type="text" name="email" id="email" />
												</td>
											</tr>
											<tr>
												<td>Password</td>
												<td>
													<input type="password" name="password" id="password" />
												</td>
											</tr>
											<tr>
												<td></td>
												<td>
													<input type="submit" name="submit" id="logsubmit" value="Login"/>
												</td>
											</tr>
										</table>
									</form>
			<p>New User ? <a href="register.php">Singup</a> Free</p>
			<span class="empty" style="display: none;">Field Must be Empty !</span>
			<span class="disable" style="display: none;">User Disable !</span>
			<span class="error" style="display: none;">Email or Password not Matched !</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
				
	<?php include 'inc/footer.php';?>