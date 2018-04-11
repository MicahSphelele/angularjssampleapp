/* 
 Authour:Sphelele Ngubane
 */
'use strict';

var app = angular.module('angularAPP',['ngSanitize','jcs-autoValidate','ngRoute']);

app.config(['$routeProvider','$locationProvider',function($routeProvider,$locationProvider){

	$routeProvider
	.when('/',{templateUrl:'views/loginView.php',controller:'LoginController'})
	.when('/register',{templateUrl:'views/registerView.php',controller:'RegisterController'})
	.when('/app',{templateUrl:'views/userView.php',controller:'UserController'})
	.when('/edit',{templateUrl:'views/userViewEditDetails.php',controller:'EditDetailsController'})
	.otherwise({redirectTo:'/'});
}]);


//Deny unathourised user access
app.run(function($rootScope,$location,LoginService){

  var routesPermissions = ['/app','edit'];

  $rootScope.$on('$routeChangeStart', function()  {
      
      if(routesPermissions.indexOf($location.path()) !==-1 && !LoginService.isLogged()){
        
          $location.path('/');
      }
  });

});







//This function will be used to check if a valid image is selected
function file_com_img(img){
    
    var files=$(img)[0].files;
    var filename= files[0].name;
    var extension=filename.substr(filename.lastIndexOf('.')+1);
    var allowed=["jpg","png","jpeg"];
    
    if(allowed.lastIndexOf(extension)===-1){
        $.alert({
            title:'Error on file type!',
            content:'The file type selected is not of jpg , jpeg or png. Please select a valid image/photo',
            type:'red',
            typeAnimated:true,
            buttons:{
                ok:{
                    text:'Ok',
                    btnClass:'btn-red',
                    action:function()
                    {
                        img.value="";
                        $('#label-span').html('Select  photo/image');
						/*
                        $('#upload_image_view').attr({src:"assets/img/default-icon-1024.png"}).show();
                        $('#hidden_pre_div').hide();*/
                    }
                }
            }
        });
    }else{
       if(img.files && img.files[0])
       {
           var filereader = new FileReader();
           filereader.onload=function(evt)
           {
             //Hide the default image/photo
             //$('#upload_image_view').hide();
             //Show the image selected and add an img element to the div element
              //$('#hidden_pre_div').show().html('<img src="'+evt.target.result+'"  width="200" height="200" />');
             //set label text
             $('#label-span').html(''+filename);
			 
           };
           filereader.readAsDataURL(img.files[0]);
       }
    }
}