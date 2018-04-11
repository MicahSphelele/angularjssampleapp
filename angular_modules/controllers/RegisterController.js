/* 
 Authour:Sphelele Ngubane
 */
'use strict';

app.controller('RegisterController',['$scope','RegisterService',function($scope,RegisterService){

	$scope.registerOnSubmit=function(user){
		
		//Format your data into json
		var userObject=angular.toJson(user);
		
		
		//Call the register service from the RegisterService
		RegisterService.register(userObject);	
	}
	
}]);