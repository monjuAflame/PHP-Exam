    <?php include 'inc/header.php'; ?>
			
			
				<div class="mainBodyContente">
					<div class="container_body">
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								<div class="bodyHeadertText">
									<h2>Online Exam System - User Register</h2>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="bodyImage">
									<div class="icon">
										<i class="fa fa-desktop"></i>
										<div class="styleIcon">
											<i class="fa fa-user"></i>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="functionArea">
									<form action="" method="post">
										<table>
											<tr>
												<td>Name</td>
												<td>
													<input type="text" name="name" id="name" />
												</td>
											</tr>
											<tr>
												<td>Username</td>
												<td>
													<input type="text" name="username" id="username" />
												</td>
											</tr><tr>
												<td>Password</td>
												<td>
													<input type="password" name="password" id="password" />
												</td>
											</tr>
											<tr>
												<td>Email</td>
												<td>
													<input type="text" name="email" id="email" />
												</td>
											</tr>
											
											
											<tr>
												<td></td>
												<td>
													<input type="submit" name="submit" id="regsubmit" value="Signup"/>
												</td>
											</tr>
											
										</table>
									</form>
									<p>New User ? <a href="index.php">Login</a> Free</p>
									<span id="state"></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
				
		<?php include 'inc/footer.php';?>