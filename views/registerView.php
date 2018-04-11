<div class="login-page">
<div class="page-header header-filter" style="background: #02111D;
background: -webkit-linear-gradient(to right, #02111D, #037BB5, #02111D);  
background: linear-gradient(to right, #02111D, #037BB5, #02111D); 
">
<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">

					<div class="card card-signup">
                        <h2 class="card-title text-center">Register</h2>
                        <div class="row">
						<div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="social text-center">
                                    <a href="https://twitter.com/login?lang=en" target="_blank" class="btn btn-just-icon btn-round btn-twitter">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a href="https://www.facebook.com/login.php" target="_blank" class="btn btn-just-icon btn-round btn-facebook">
                                        <i class="fa fa-facebook"> </i>
                                    </a>
                                </div>
									<div id="messrsp"></div>
									
								<form class="form" ng-submit="registerOnSubmit(user)" novalidate="novalidate">
									<div class="card-content">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-user fa-2x"></i>
											</span>
											<input type="text" ng-model="user.name" class="form-control" placeholder="Name" required="required"/>
										</div>

										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-user fa-2x"></i>
											</span>
											<input type="text" ng-model="user.surname" class="form-control" placeholder="Surname" required="required"/>
										</div>

										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-envelope fa-2x"></i>
											</span>
											<input type="email" ng-model="user.email" placeholder="Email" class="form-control" required="required"/>
										</div>
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-lock fa-2x"></i>
											</span>
											<input type="password" ng-model="user.pass" placeholder="Password" class="form-control" required="required"/>
										</div>
									</div>
									<div class="footer text-center">
										<button type="submit"  class="btn btn-info btn-round">Register</button><br/>
										
										<a href="#!/" class="btn btn btn-simple btn-twitter">
												<i class="fa fa-sign-in"></i> Login
											<div class="ripple-container"></div>
										</a>
									</div>
								</form>
                            </div>
							<div class="col-md-3"></div>
                        </div>
                	</div>

                </div>
			</div>
			
</div>				

</div>
</div>