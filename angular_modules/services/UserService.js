/* 
 Authour:Sphelele Ngubane
 */
'use strict';

app.factory('UserService', ['$http','$location','$timeout',function($http,$location,$timeout){

var service={};

service.getUserData=function(id){
		//Execute API via GET
		var $promise=$http.get('api/getUserData.php',{params:{userID:id}});
		
	 	return	$promise;
};

service.updateUserImage=(userID,imageFile,scope) => {

 var formData = new FormData();

	formData.append('image',imageFile);
	formData.append('userID',userID);

	var $promise= $http.post('api/updateUserImage.php',formData,{transformRequest: angular.identity,headers: {'Content-Type': undefined}});
	$promise.then( (rsp) => {
		var status=rsp.data.status;
		
		switch(status){

			case "0":

			$("#messrsp2").html('<p class="text-danger text-center"><i class="fa fa-times"></i> No gif images allowed.</p>');
				$timeout( () => {
					$("#messrsp2").html('');
				},4000);
				break;

			case "1":

			$("#messrsp2").html('<p class="text-success text-center"><i class="fa fa-check-circle"></i> Successfully changed image.</p>');
				$timeout( () => {
					$("#messrsp2").html('');
					scope.loadUserData();
				},4000);
				break;

			case "2":

			$("#messrsp2").html('<p class="text-danger text-center"><i class="fa fa-times"></i> Unable to add url into database.</p>');
				$timeout( () => {
					$("#messrsp2").html('');
					scope.loadUserData();
				},4000);
				break;

			case "3":

			$("#messrsp2").html('<p class="text-danger text-center"><i class="fa fa-times"></i> Unable to move image file.</p>');
				$timeout( () => {
					$("#messrsp2").html('');
				},4000);
				break;

			case "4":
			
			$("#messrsp2").html('<p class="text-danger text-center"><i class="fa fa-times"></i> No image selected.</p>');
				$timeout( () => {
					$("#messrsp2").html('');
				},4000);
				break;	
		}

	}, (error) => {

		console.error(error);
	});
};


service.updateUserNote=(noteObject,scope) => {

	var $promise= $http.post('api/updateNote.php',noteObject);

	$promise.then( (rsp) => {

  		var status=rsp.data.status;

  		switch(status){

  			case "0":

				$("#messgrspns3").html('<p class="text-warning text-center"><i class="fa fa-exclamation-triangle"></i> Note may have already been updated.</p>');
				$timeout( () => {
					$("#messgrspns3").html('');
				},4000);

  				break;

  			case "1":

				$("#messgrspns3").html('<p class="text-success text-center"><i class="fa fa-check-circle"></i> Note successfully updated.</p>');
				$timeout( () => {
					$("#messgrspns3").html('');
					scope.loadUserData();
				},4000);
  				break;

  			case "2":

				$("#messgrspns3").html('<p class="text-danger text-center"><i class="fa fa-times"></i> Some fields are empty.</p>');
				$timeout( () => {
					$("#messgrspns3").html('');
				},4000);
  				break;		
  		}


	}, (error) =>{

		console.error(error);

	});
  					
};

service.removeNote = (note,scope) => {

	var $promise = $http.post('api/deleteNote.php',note);

	$promise.then( (rsp) => {

		var status = rsp.data.status;

		switch(status){

			case "0":

				$.alert({
					title: 'Unable to Remove Note',
    				content: 'Your note could not be removed from the database.',
    				icon: 'fa fa-times',
    				theme:'material',
    				type:'red',
                    typeAnimated:true,
                    buttons:{
                    	ok:{
                    		text:"OK",
                    		btnClass:"btn-red",
                    		action:function(){
                    			//Silence is golden
                    		}
                    	}
                    }
				});

				break;

			case "1":

				$.alert({
					title: 'Success',
    				content: 'Your note has been successfully removed.',
    				icon: 'fa fa-check',
    				theme:'material',
    				type:'green',
                    typeAnimated:true,
                    buttons:{
                    	ok:{
                    		text:"OK",
                    		btnClass:"btn-green",
                    		action:function(){
                    			//Reload data
                    			scope.loadUserData();
                    		}
                    	}
                    }
				});

				break;	
		}

	}, (error) => {

		console.error(error);

	});
};

service.addNewNote=(newNoteObject,scope) =>{
	
	var $promise = $http.post('api/addNewNote.php',newNoteObject);
	$promise.then((rsp) => {
		console.log("Inside addNewNote");
		var status= rsp.data.status;
		switch(status){
			case "0":
				$('#messgrspns4').html('<p class="text-danger text-center"><i class="fa fa-times"></i> Some fields are empty.</p>');
				$timeout( () => {
					$("#messgrspns4").html('');
				},4000);
				break;
				
			case "1":
				$('#messgrspns4').html('<p  class="text-success text-center"><i class="fa fa-check-circle"></i> New note successfully added.</p>');
				$timeout( () => {
					$("#messgrspns4").html('');
					scope.loadUserData();
					scope.newnote.title="";
					scope.newnote.notetext="";
				},4000);
				break;
			case "2":
				$('#messgrspns4').html('<p class="text-danger text-center"><i class="fa fa-times"></i> Unable to add new note.</p>');
				$timeout( () => {
					$("#messgrspns4").html('');
				},4000);
				break;
		}
		
	},(error) => {
		
		console.error(error);
		
	});
};

service.updateUserDetails=(details,SessionService) => {

	var $promise=$http.post('api/updateUserDetails.php',details);

	$promise.then((rsp) =>{

		var status=rsp.data.status;

		switch(status){ //messrspnseedit

			case '0':
				$('#messrspnseedit').html('<p class="text-danger text-center"><i class="fa fa-times"></i> Email is already in use.</p>');
				$timeout( () => {
					$("#messrspnseedit").html('');
				},4000);
				break;
			case '1':
				$('#messrspnseedit').html('<p  class="text-success text-center"><i class="fa fa-check-circle"></i> Successfully updated details.</p>');
				$timeout( () => {
					$("#messrspnseedit").html('');
				},4000);
				break;
			case '2':
				$('#messrspnseedit').html('<p  class="text-warning text-center"><i class="fa fa-exclamation-triangle"></i> Cannot update existing details.</p>');
				$timeout( () => {
					$("#messrspnseedit").html('');
				},4000);
				break;		
		}

	},(error) => {

	});
};

return service;	
	
}]);


app.factory('EXAPIService', ['$http','SessionService',function($http,SessionService){

var service={};

//This service will be used to get NASA
	service.getNASAPicOfDay= (scope) => {
		//Execute API via GET
		var $promise=$http.get('https://api.nasa.gov/planetary/apod?api_key=sKaEdxCRPaaY7ISZM1TkHkNiLFl7papUWrClNmH3');
		
		$promise.then( (rsp) => {
			console.log(rsp.data);
			
			//Check for media type in the NASA API
			if(rsp.data.media_type=="video"){
				
				scope.imageCard=false;
				scope.videoCard=true;
				$('#nasa_video').attr('src',rsp.data.url);
				scope.nasa_desc=rsp.data.explanation;
				scope.nasa_title=rsp.data.title;
				scope.nasa_author="For NASA";
				scope.nasa_date=rsp.data.date;
			}else{
				scope.videoCard=false;
				scope.imageCard=true;
				scope.nasa_title=rsp.data.title;
				scope.nasa_desc=rsp.data.explanation;
				scope.nasa_author=rsp.data.copyright;
				scope.nasa_date=rsp.data.date;
				scope.nasa_pic_url=rsp.data.hdurl;
			}
			

		}, (error) => {

			//get default date
			var date=new Date();
			var dd=date.getDate();
			var mm=date.getMonth();
			var yyyy=date.getFullYear();
			if(dd<10){
				dd="0"+dd;
			}
			if(mm<10){
				mm="0"+mm;
			}

			var dateString=dd+"-"+mm+"-"+yyyy;
			//Add data to scope
			scope.nasa_title="API";
			scope.nasa_desc="Could not connect to API";
			scope.nasa_author="copyright";
			scope.nasa_date=dateString;
			scope.nasa_pic_url="uploads/default.png";

		});
	};

	service.saveNASAMedia=() => {
		
	};

return service;	
	
}]);