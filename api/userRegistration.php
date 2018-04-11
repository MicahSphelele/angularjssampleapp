<?php
 require "functions.php";
 
 $date = new DateTime("now", new DateTimeZone("Africa/Johannesburg"));
 $todaysDate=$date->format('Y-m-d H:i:s');
 
 $data = json_decode(file_get_contents('php://input'));
 
 //Assign values from user input
 $name = $data->name;
 $surname =$data->surname;
 $email = $data->email;
 $pass = $data->pass;
 $picture= "uploads/default.png";
 
 
 //Instantiate Functions Object
 $func=new Functions();
 
 $searchEmail=$func->searchEmail($email);
 
 if($searchEmail){
	 
	 echo json_encode(array('status'=>"0")); //Email already exist
	 
 }else{
	 
	 $register=$func->register($name,$surname,$email,$pass,$picture,$todaysDate);
	 
	 if($register){
		 
		 echo json_encode(array('status'=>"1")); //Success
		 
	 }else{
		 
		 echo json_encode(array('status'=>"2"));//No Success
		
	 }
	 
 }
?>