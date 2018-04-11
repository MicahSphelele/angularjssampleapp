/* 
 Authour:Sphelele Ngubane
 */
'use strict';

app.factory('SessionService',['$location',function($location){

        var service = {};
        
        service.set = (key,value) => {

           return sessionStorage.setItem(key,value);
            
        };

        service.get = (key) => {

            return sessionStorage.getItem(key);
        };

        service.destroy = (key) => {

            return sessionStorage.removeItem(key);
        };

        service.logout = (userID) => {
            
            service.destroy(userID);
            $location.path('/');
        };	
		service.setObject = (key,value) => {
			
			return sessionStorage.setItem(key,JSON.stringify(value));
		};
		service.getObject = (key) => {
			
			return sessionStorage.getItem(key);
		};

        return service;
}]);