<?php

 require "functions.php";
 

//Input from the service 
 //$data = json_decode(file_get_contents('php://input'));

$userID=$_GET['userID'];
 
 //Create empty array
 $detailsArr=array();
 $notesArr=array();



 //Instantiate Functions Object
 $func=new Functions();

 $getUserByID=$func->getUserByID($userID);
 $getNotesByUserID=$func->getNotesByUserID($userID);

//Get user details
 if($getUserByID){

 	//Loop through user data
 	foreach ($getUserByID as $user) {
 		$detailsArr[]=$user;
 	}

 }else{
 	$detailsArr[]=array('status'=>'0');
 }

//Get user notes
 if($getNotesByUserID){

 	//Loop through note data
 	foreach ($getNotesByUserID as $note) {
 		$notesArr[]=$note;
 	}

 }else{
 	$notesArr[]=array('status'=>'0');
 }

echo json_encode(array('details'=>$detailsArr,'notes'=>$notesArr,JSON_FORCE_OBJECT));

?>