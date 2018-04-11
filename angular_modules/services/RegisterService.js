/* 
 Authour:Sphelele Ngubane
 */
'use strict';

app.factory('RegisterService', ['$http','$location','$timeout',function($http,$location,$timeout){

var service={};

service.register= (user)=> {
	
	//Execute API via POST
	var $promise=$http.post('api/userRegistration.php',user);
	 
	 $promise.then( (rsp) => {
		 
		var data_rsp=rsp.data;
		var data_status=data_rsp.status;
			
		switch(data_status){
			case "0":
				$("#messrsp").html('<p class="text-danger text-center"><i class="fa fa-times"></i> Email already in use!</p>');
				$timeout( () => {
					$("#messrsp").html('');					
				},4000);
			break;
			case "1":
				$("#messrsp").html('<p class="text-success text-center"><i class="fa fa-check-circle"></i> You have been successfully registered.</p>');
				$timeout( () => {
					$("#messrsp").html('');					
				},4000);
			break;
			case "2":
				$("#messrsp").html('<p class="text-danger text-center"><i class="fa fa-times"></i> Unable to register you in our database!</p>');
				$timeout( () => {
					$("#messrsp").html('');					
				},4000);
			break;
		}
	 });
};

return service;	
	
}]);