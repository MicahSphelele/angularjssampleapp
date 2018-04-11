<!--Model to add new note START-->
	<div class="modal fade" id="noticeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-notice">
		<div class="modal-content">
		  <div class="card card-signup card-plain">
				<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle fa-2x" aria-hidden="true"></i></button>
					<h2 class="modal-title card-title text-center" id="myModalLabel">New Note</h2>
		      	</div>
				
				<div id="messgrspns4"></div>
				
		      	<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<form  class="form" ng-submit="addNewNoteOnSubmit(newnote)" novalidate="novalidate" >
								<div class="card-content">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-header" aria-hidden="true"></i>
										</span>
										<input type="text" ng-model="newnote.title" class="form-control" placeholder="Note Title" required="required"/>
									</div>
									<div class="media-body">
		                                    <div class="form-group is-empty">
											<textarea class="form-control" ng-model="newnote.notetext"  placeholder="Write something nice" rows="6" required="required"></textarea>
											<span class="material-input"></span></div>
		                            </div>
								</div>
								<div class="modal-footer text-center">
									<button type="submit" class="btn btn-info btn-round">Add Note<div class="ripple-container"></div></button><br/>
								</div>
							</form>
						</div>
					</div>
		      	</div>
			</div>
		</div>
	  </div>
	</div>
	<!--Model to add new note END-->

	<!--Model to edit note START-->
	<div class="modal fade" id="editNoteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-notice">
		<div class="modal-content">
		  <div class="card card-signup card-plain">
				<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle fa-2x" aria-hidden="true"></i></button>
					<h2 class="modal-title card-title text-center" id="myModalLabel">Edit Note <small>{{edtNotDeate}}</small></h2>
		      	</div>
		      	<div id="messgrspns3"></div>
		      	<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<form ng-submit="editNoteSubmit(edtnote)" class="form" >
								<div class="card-content">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-header" aria-hidden="true"></i>
										</span>
										<input type="text" ng-model="edtnote.note_title" class="form-control" placeholder="Note Title">
									</div>
									<div class="media-body">
		                                    <div class="form-group is-empty">
											<textarea class="form-control" ng-model="edtnote.note_text"  placeholder="Write something nice" rows="6"></textarea>
											<span class="material-input"></span></div>
		                            </div>
								</div>
								<div class="modal-footer text-center">
									<button type="submit" class="btn btn-info btn-round">Add Note<div class="ripple-container"></div></button><br/>
								</div>
							</form>
						</div>
					</div>
		      	</div>
			</div>
		</div>
	  </div>
	</div>
	<!--Model to edit note END-->