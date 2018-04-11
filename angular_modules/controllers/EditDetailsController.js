/* 
 Authour:Sphelele Ngubane
 */
'use strict';

app.controller('EditDetailsController',['$scope','SessionService','UserService','$location',function($scope,SessionService,UserService,$location){
	
	var details=JSON.parse(SessionService.getObject('details'));
	
	$scope.edit={};
	
	$scope.edit=details;
	$scope.backHome=function(){
		
		$location.path('/app');
		SessionService.destroy('details');
	};
	
	$scope.editDetailsOnSubmit=function(edit){

		var editDetailsObject=angular.toJson(edit);
		console.log(editDetailsObject);
		UserService.updateUserDetails(editDetailsObject,SessionService);

	};
}]);