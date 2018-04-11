/* 
 Authour:Sphelele Ngubane
 */
'use strict';

app.controller('UserController',['$scope','SessionService','EXAPIService','UserService','$location',function($scope,SessionService,EXAPIService,UserService,$location){
	
	//Get logged user session
	var userID=SessionService.get("userID");
	var editObject={};
	$scope.loadUserData=function(){
		//Get user data
		UserService.getUserData(userID).then(function(rsp){
			
			var userDetails = rsp.data.details[0];
			var userNotes = rsp.data.notes;
			
			//This obejct will be sent to another controller for editing the details
			editObject=userDetails;
			
			//Assign values to user details
			$scope.u_name=userDetails.name;
			$scope.u_surname=userDetails.surname;
			$scope.u_image=userDetails.picture;

			$scope.notes=userNotes;
			
		});
	};
	
	
	//Button Edit User Details
	$scope.edit=function(){
		
		SessionService.setObject('details',editObject);
		$location.path('/edit');
	
	};
	//Button Refresh
	$scope.refesh=function(){

		$scope.loadUserData();
	};
	//Button Sign Out
	$scope.signout=function(){

		SessionService.logout("userID");	
	};

	//Upload update user image
	$scope.updateImage=function(){

		var imageFile = $scope.myfile;

		UserService.updateUserImage(userID,imageFile,$scope);

	};

	//Button Read Note
	$scope.showReadNote=false;
	$scope.readNote=function(note){
		$scope.showReadNote = !$scope.showReadNote;
		$scope.r_title=note.note_title;
		$scope.r_text=note.note_text;
	};

	$scope.closeReadWindow=function(){
		$scope.showReadNote=false;
	};

	//Button Edit Note
	$scope.edtnote={};

	$scope.editNote=function(note){
		$scope.edtNotDeate=note.note_date;
		$scope.edtnote=note;

	};
	$scope.editNoteSubmit=function(edtnote){
		
		var noteObject = angular.toJson(edtnote);

		UserService.updateUserNote(noteObject,$scope);
		
	};

	//Button delete note
	$scope.deleteNote = function(note){

		var noteObject = angular.toJson(note);

		$.confirm({
			title: 'Deleting Note',
			content: 'You want to delete this note?',
			icon: 'fa fa-trash',
			theme:'material',
			type:'red',
	        typeAnimated:true,
	        buttons:{
	        	yes:{
	        		text:"YES",
	        		btnClass:"btn-red",
	        		action:function(){
	        			UserService.removeNote(noteObject,$scope);
	        		}
	        	},
	        	no:{
	        		text:"No",
	        		btnClass:"btn-green",
	        		action:function(){
	        			//Silence is golden
	        		}
	        	},
	        }
		});

	};
	
	//Add New Note Submit
	$scope.addNewNoteOnSubmit=function(newnote){
		
		var newNoteObject=angular.toJson({userID:userID,note_text:newnote.notetext,note_title:newnote.title});
		//$.alert(newNoteObject);
		UserService.addNewNote(newNoteObject,$scope);
	};
	
	//Contol The Tabs
    $scope.tab = 1;
    $scope.setTab = function(newTab){
      $scope.tab = newTab;
    };
    $scope.isSet = function(tabNum){
      return $scope.tab === tabNum;
    };
	
	//Loading a radom image
	EXAPIService.getNASAPicOfDay($scope);
	
	$scope.showUploadImage=false;
	$scope.showUploadImageForm=function(){
		
		$scope.showUploadImage = !$scope.showUploadImage;
	};
}]);