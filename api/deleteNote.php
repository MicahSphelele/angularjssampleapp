<?php
 require "functions.php";
 

//Input from the service 
 $data = json_decode(file_get_contents('php://input'));

//Assign variables
 $noteID=$data->noteID;

//Instantiate Functions Object
$func=new Functions();

$deleteNote=$func->deleteNote($noteID);

if($deleteNote){

	echo json_encode(array('status'=>'1'));

}else{
	echo json_encode(array('status'=>'0'));	
}





?>