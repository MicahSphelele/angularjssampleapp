/* 
 Authour:Sphelele Ngubane
 */
'use strict';

app.factory('LoginService', ['$http','SessionService','$location','$timeout',function($http,SessionService,$location,$timeout){

var service={};

//User Login Service
	service.login= (user)=> {
		
		//Execute API via POST
		var $promise=$http.post('api/userLogin.php',user);
		
		$promise.then( (rsp) => {

			var data_rsp = rsp.data;
			var rsp_status=data_rsp.status;
			
			switch(rsp_status){
				
				case '1':
					//Loop Through user details
					angular.forEach(data_rsp.data,function(value,key){
						SessionService.set('userID',value.userID);
						var userID=SessionService.get("userID");

						//Redirect user once login success from api
						if(userID){
							$location.path('/app');
						}else{
							$location.path('/');
						}
					});
				break;
				case '2':
					$('#message').html('<p class="text-danger text-center"><i class="fa fa-times"></i> Incorrect login details</p>');
						$timeout( ()=> {
							$('#message').html('');
						},4000);
				break;
			}
			
		});
	}
	
    service.isLogged= () => {

        if(SessionService.get('userID')){

            return true;
        }
    };

	return service;	
	
}]);