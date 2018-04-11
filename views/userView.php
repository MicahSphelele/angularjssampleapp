<div class="login-page"  ng-init="loadUserData()">
	<div class="page-header header-filter" style="background: #02111D;
	background: -webkit-linear-gradient(to right, #02111D, #037BB5, #02111D);  
	background: linear-gradient(to right, #02111D, #037BB5, #02111D); ">
	
			<div class="container">
				<div class="row">
					<div class="main main-raised-user">

						<div class="row" >
							<div class="col-xs-2 col-mg-top-10" >
								<ul>
									<li class="dropdown">
										<button class="btn btn-fab btn-info dropdown-toggle" rel="tooltip" data-toggle="dropdown"  title="Click for menu">
											<i class="fa fa-cog" aria-hidden="true"></i>
										</button>
										<ul class="dropdown-menu">
											<li class="dropdown-header">
												User Settings
											</li>
											<li data-ng-click="edit()">
												<a class="btn btn-info btn-round"  ><i class="fa fa-edit" aria-hidden="true"></i> Edit Details</a>
											</li></br/>
											<li data-ng-click="refesh()">
												<a class="btn btn-info btn-round"  href="#!/app"><i class="fa fa-refresh" aria-hidden="true"></i> Refresh</a>
											</li></br/>
											<li data-ng-click="signout()">
												<a class="btn btn-info btn-round" href=""><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
											</li>
										</ul>
									</li>
							   </ul>
							</div>
							<div class="col-xs-2 col-mg-top-10">
								<ul>
									<li>
										<button class="btn btn-fab btn-info" data-toggle="modal" data-target="#noticeModal"   title="Add New Note">
											<i class="fa fa-plus" aria-hidden="true"></i>
										</button>
									</li>
								</ul>
							</div>
						</div>
						<div class="profile-content">
							<div class="container">
								<div class="row">
									<div class="col-md-2 col-lg-2 col-sm-2"></div>
									<div class="col-md-4 col-lg-4 col-sm-4 ">
									   <div class="card card-profile">
											<div class="card-avatar">
												<a href="" data-ng-click="showUploadImageForm()">
													<img  class="img" ng-src="{{u_image}}">
												</a>	
											</div>
											<div class="card-content content-info">
												<h4 class="card-title">{{u_name}} {{u_surname}}</h4>
											</div>
										</div>
									</div>

									<div class="col-md-4 col-lg-4 col-sm-4">
										<form data-ng-submit="updateImage()" ng-show="showUploadImage" >

											<div class="text-center" id="messrsp2"></div>

											<div class="form-group form-group-lg">
												<label class="btn btn-raised btn-round btn-success btn-block file-input-label" for="btn-file-upload">
													<span class="color-white"><i class="fa fa-upload fa-sick-note-file"></i></span>
													<span class="color-white" id="label-span">Select  photo/image</span>
												</label>
												<input class="form-control" id="btn-file-upload" accept="image/*"  onchange="file_com_img(this)" type="file"  demo-file-model="myfile" required="required"/>
											</div>
											<div class="text-center">

												<button type="submit" class="btn btn-fab btn-info"  data-toggle="tooltip" data-placement="top" title="Click to upload image" data-container="body" data-original-title="Click to upload image">
											<i class="fa fa-upload" aria-hidden="true"></i>
											</button>

											</div>
										</form>
									</div>
									<div class="col-md-2 col-lg-2 col-sm-2"></div>
								</div>

								<div class="row">
									<div class="col-md-2 col-lg-2 col-sm-2"></div>
										<div class="col-md-8 col-lg-8 col-sm-8" style="color:black">
											<ul class="nav nav-pills nav-pills-info">
											  <li data-ng-class="{ active: isSet(1) }"><a href ng-click="setTab(1)" data-toggle="tab" aria-expanded="false">
											  <i class="fa fa-sticky-note" aria-hidden="true"></i>Your Notes </a></li>
											  <li ng-class="{ active: isSet(2) }"><a href ng-click="setTab(2)" data-toggle="tab" aria-expanded="false">
											  <i class="fa fa-picture-o" aria-hidden="true"></i>
											  Nasa's Image</a></li>
										   </ul>
										   
										   <div class="tab-content tab-space">
		                            	<div data-ng-show="isSet(1)" class="tab-pane active" id="tab1"> 
													<div class="card" ng-show="showReadNote">
						    							<div class="card-content content-info">
						    								<h5 class="category-social">
						    									<i class="fa fa-book"></i> {{r_title}}
						    								</h5>
						    								<h4 class="card-title">
						    									<a href="">{{r_text}}</a>
						    								</h4>
						    								<div class="footer text-center">
						    									<button ng-click="closeReadWindow()" class="btn btn-fab btn-danger"  data-toggle="tooltip"  title="Close window">
																<i class="fa fa-times" aria-hidden="true"></i>
																</button>
						    	                            </div>
						    							</div>
						    						</div>
		                            	      <h3 style="color:black" class="title">Your Notes</h3>
												<div class="table-responsive">
													<table class="table">
														<thead>
															<tr>
																<th class="text-center">#</th>
																<th>Title</th>
																<th>Date</th>
																<th class="text-right">Actions</th>
															</tr>
														</thead>
														<tbody>
														<tr data-ng-repeat="note in notes">
																<td data-ng-show="note.noteID != null" class="text-center">{{note.noteID}}</td>
																<td data-ng-show="note.noteID != null" >{{note.note_title}}</td>
																<td data-ng-show="note.noteID != null">{{note.note_date}}</td>
																<td data-ng-show="note.noteID != null" class="td-actions text-right">
																	<button  data-ng-click="readNote(note)" type="button" rel="tooltip" class="btn btn-info btn-round" data-original-title="" title="Click to read note">
																		<i class="fa fa-book" aria-hidden="true"></i>
																	</button>
																	<button data-ng-click="editNote(note)" type="button" rel="tooltip" class="btn btn-success btn-round" data-toggle="modal" data-target="#editNoteModal" title="">
																	   <i class="fa fa-edit" aria-hidden="true"></i>
																	</button>
																	<button data-ng-click="deleteNote(note)" type="button" rel="tooltip" class="btn btn-danger btn-round"  title="Click to delete note">
																	  <i class="fa fa-trash" aria-hidden="true"></i>
																	</button>
																</td>
																<td data-ng-show="note.noteID == null" colspan="4"><b><p class="text text-center text-info">You currently don't have any notes.</p></b></td>
														</tr>
															
														</tbody>
													</table>
												 </div>
		                            		</div>

			                            	    <div ng-show="isSet(2)" class="tab-pane active" id="tab2" style="color:#3C4858;">
			                            	      <h3 style="color:black" class="title">Exploring With NASA</h3>
													<div class="col-xs-3"></div>
												    <div class="col-xs-6">
													

														<div  class="card card-blog">
															<div class="card-image">
																<a href="#!/app">
																	<div data-ng-show="videoCard" class="embed-responsive embed-responsive-16by9">
																		<iframe id="nasa_video"  width="420" height="345" src="">
																		</iframe>
																	</div>
																	<img data-ng-show="imageCard" class="img"  ng-src="{{nasa_pic_url}}">
																</a>
															<div class="colored-shadow" style="background-image: url(&quot;uploads/default.png&quot;); opacity: 1;"></div>
															<div class="ripple-container"></div>
															</div>
															<div class="card-content">
																<h6 class="category text-danger">
																	<i class="fa fa-up" aria-hidden="true"></i> {{nasa_title}}
																</h6>
																
																<div class="footer">
																	<div class="author">
																		
																		   <img src="uploads/default.png" alt="..." class="avatar img-raised">
																		   <span>&copy; {{nasa_author}}</span>
																		<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: 991px; top: 16346px; background-color: rgb(60, 72, 88); transform: scale(12.75);"></div></div>
																	</div>
																   <div class="stats">
																		<i class="fa fa-calendar-o" aria-hidden="true"></i> {{nasa_date}}
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-xs-3"></div>
			                            	    </div>
		                            		
		                            		</div>
										</div>
										<div class="col-md-2 col-lg-2 col-sm-2"></div>
									</div>
								</div>

								<div class="row">
									
								</div>
								
							</div>
						</div>
					</div>
				</div>	
			</div>

		</div>
	</div>
	<?php include 'inc/models.php'; ?>