<?php
require "functions.php";

 $data = json_decode(file_get_contents('php://input'));
 
 //Assign values from user input
 $email = $data->email;
 $pass = $data->pass;
 
 //Create an empty array
 $array=array();
 
 //Instantiate Functions Object
 $func=new Functions();
 
 //Call Login function
 $login = $func->login($email,$pass);
 
 if($login){
	 foreach($login as $user){
		
		$array[]=$user; 
	 }
	 echo json_encode(array('status'=>'1','data'=>$array));
 }else{
	 echo json_encode(array('status'=>'2','data'=>'NULL'));
 }
?>