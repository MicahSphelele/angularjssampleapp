<div class="login-page">
<div class="page-header header-filter" style="background: #02111D;
background: -webkit-linear-gradient(to right, #02111D, #037BB5, #02111D);  
background: linear-gradient(to right, #02111D, #037BB5, #02111D); 
">
		<div class="container">
			<div class="row">
				<div class="card card-signup">
					<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
					<div class="card card-signup">
						<form  class="form" ng-submit="loginOnSubmit(user)" novalidate="novalidate">
							<div class="header header-info text-center">
								<h4 class="card-title">Log in</h4>
								<div class="social-line">
									<a href="https://www.facebook.com/login.php" target="_blank" class="btn btn-just-icon btn-simple">
										<i class="fa fa-facebook-square"></i>
									</a>
									<a href="https://twitter.com/login?lang=en" target="_blank" class="btn btn-just-icon btn-simple">
										<i class="fa fa-twitter"></i>
									</a>
								</div>
							</div>
							<p class="description text-center">Be Classical</p>
							<div id="message"></div>
							<div class="card-content">

								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-envelope fa-2x"></i>
									</span>
									<input type="email" ng-model="user.email" class="form-control" placeholder="Email Address" required="required"/>
								</div>

								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-lock fa-2x"></i>
									</span>
									<input type="password" ng-model="user.pass" class="form-control" placeholder="Password" required="required"/>
								</div>
								
							</div>
							<div class="footer text-center">
								<button type="submit" class="btn btn-info btn-round">Login<div class="ripple-container"></div></button><br/>
								
								<a href="#!/register" class="btn btn btn-simple btn-twitter">
	                			<i class="fa fa-user-plus"></i> Register
	                		<div class="ripple-container"></div></a>
							</div>
						</form>
					</div>
				</div>
				</div>
			</div>	
		</div>

	</div>
	
	</div>