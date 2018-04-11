<?php
 require "functions.php";
 
 //Get todays date
 $date = new DateTime("now", new DateTimeZone("Africa/Johannesburg"));
 $todaysDate=$date->format('Y-m-d H:i:s');
 
//Input from the service 
 $data = json_decode(file_get_contents('php://input'));

//Assign variables
 $userID=$data->userID;
 $noteTitle=$data->note_title;
 $noteText=$data->note_text;
 $noteDate=$todaysDate;

//Instantiate Functions Object
$func = new Functions();


//The magic starts
if(empty($noteTitle) OR empty($noteText)){

	echo json_encode(array('status'=>'0')); //Some fields may be empty 

}else{

	$addNewNote = $func->addNewNote($userID,$noteText,$noteDate,$noteTitle);

	if($addNewNote){

		echo json_encode(array('status'=>'1')); //New note successfully added

	}else{

		echo json_encode(array('status'=>'2')); //Cannot update existing details

	}
}