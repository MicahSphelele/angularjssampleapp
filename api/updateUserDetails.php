<?php
 require "functions.php";
 
 //Get todays date
 
//Input from the service 
 $data = json_decode(file_get_contents('php://input'));

//Assign variables
$userID=$data->userID;
$name=$data->name;
$surname=$data->surname;
$email=$data->email;

//Instantiate Functions Object
$func = new Functions();

//Search email if another user except you has it
$searchEmailBeforeUpdate=$func->searchEmailBeforeUpdate($userID,$email); 

//Magic Starts
if($searchEmailBeforeUpdate){

	echo json_encode(array('status'=>'0')); //Email is already in use

}else{
	$updateUserDetails=$func->updateUserDetails($userID,$name,$surname,$email);

	if($updateUserDetails){

		echo json_encode(array('status'=>'1')); //Successfully updated details		

	}else{

		echo json_encode(array('status'=>'2')); //Cannot update existing details		
	}	
}
?>