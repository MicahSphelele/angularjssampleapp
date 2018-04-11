<?php

 require "functions.php";
 

//Input from the service 
 $data = json_decode(file_get_contents('php://input'));

//Assign variables
 $noteID=$data->noteID;
 $note_title=$data->note_title;
 $note_text=$data->note_text;

	//Instantiate Functions Object
	$func=new Functions();
if(empty( $note_title) OR empty($note_text)){

	echo json_encode(array('status'=>'2')); //Note fields are empty

}else{

	$updateNote=$func->updateNote($noteID,$note_title,$note_text);

	if($updateNote){

		echo json_encode(array('status'=>'1')); //Note successfully updated

	}else {
		
		echo json_encode(array('status'=>'0')); //Note may have already been updated
	}
}


 ?>