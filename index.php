<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AngularJS Sample App</title>
		<link rel="icon" href="assets/img/angular.png">
		
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/material-kit.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/jquery-confirm.css" />
		<link rel="stylesheet" type="text/css" href="assets/font-awesome/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/app.css" />
    </head>
    <body ng-app="angularAPP">
	
            <div ng-view></div>
		<!--Core Files-->	
		<script type="text/javascript" src="assets/js/jquery.min.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="assets/js/jquery-confirm.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap-tagsinput.js"></script>
		<script type="text/javascript" src="assets/js/material-kit.js"></script>
		<script type="text/javascript" src="assets/js/material.min.js"></script>
		<script type="text/javascript" src="assets/js/nouislider.min.js"></script>
		<script type="text/javascript" src="assets/js/moment.min.js"></script>
		
		
	
		
		<!--AngularJS Core Files-->
		<script type="text/javascript" src="assets/js/angular/angular.min.js"></script>
		<script type="text/javascript" src="assets/js/angular/angular-route.min.js"></script>
		<script type="text/javascript" src="assets/js/angular/angular-sanitize.js"></script>
		<script type="text/javascript" src="assets/js/angular/jcs-auto-validate.min.js"></script>
		
		<!--AngularJS Module-->
		<script type="text/javascript" src="angular_modules/app.js"></script>
		
		<!--Services-->
		<script type="text/javascript" src="angular_modules/services/SessionService.js"></script>
		<script type="text/javascript" src="angular_modules/services/LoginService.js"></script>
		<script type="text/javascript" src="angular_modules/services/RegisterService.js"></script>
		<script type="text/javascript" src="angular_modules/services/UserService.js"></script>
		
		<!--Controllers-->
		<script type="text/javascript" src="angular_modules/controllers/LoginController.js"></script>
		<script type="text/javascript" src="angular_modules/controllers/RegisterController.js"></script>
		<script type="text/javascript" src="angular_modules/controllers/UserController.js"></script>
		<script type="text/javascript" src="angular_modules/controllers/EditDetailsController.js"></script>

		<!--Directive-->
		<script type="text/javascript" src="angular_modules/directives/directives.js"></script>
		
		
    </body>
</html>
