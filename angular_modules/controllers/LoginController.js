/* 
 Authour:Sphelele Ngubane
 */
'use strict';

app.controller('LoginController',['$scope','LoginService',function($scope,LoginService){

	//Contol The Tabs
    /*$scope.tab = 1;
    $scope.setTab = function(newTab){
      $scope.tab = newTab;
    };
    $scope.isSet = function(tabNum){
      return $scope.tab === tabNum;
    };*/

	$scope.loginOnSubmit=function(user){
		
		//Format your data into json
		var userObject=angular.toJson(user);
		
		//Call the login service from the LoginService
		LoginService.login(userObject);
	}
	
}]);