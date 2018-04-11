<div class="login-page"  ng-init="loadUserData()">
	<div class="page-header header-filter" style="background: #02111D;
	background: -webkit-linear-gradient(to right, #02111D, #037BB5, #02111D);  
	background: linear-gradient(to right, #02111D, #037BB5, #02111D); ">
	
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">

					<div class="card card-signup">
					<a ng-click="backHome()" style="margin-left:5px;" class="btn btn-info btn-round"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back Home</a><br/>
                        <h2 class="card-title text-center">Edit User Details</h2>
                    <div class="row">
						<div class="col-md-3"></div>
                            <div class="col-md-6">
									<div id="messrspnseedit"></div>
									
								<form class="form" ng-submit="editDetailsOnSubmit(edit)" novalidate="novalidate">
									<div class="card-content">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-user fa-2x"></i>
											</span>
											<input type="text" ng-model="edit.name" class="form-control" placeholder="Name" required="required"/>
										</div>

										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-user fa-2x"></i>
											</span>
											<input type="text" ng-model="edit.surname" class="form-control" placeholder="Surname" required="required"/>
										</div>

										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-envelope fa-2x"></i>
											</span>
											<input type="email" ng-model="edit.email" placeholder="Email" class="form-control" required="required"/>
										</div>

										<!--<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-lock fa-2x"></i>
											</span>
											<input type="password" ng-model="edit.pass" placeholder="Password" class="form-control" required="required"/>
										</div>-->

									</div>
									<div class="footer text-center">
										<button type="submit"  class="btn btn-info btn-round">Edit</button><br/>
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