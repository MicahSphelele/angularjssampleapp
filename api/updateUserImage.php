<?php
 require "functions.php";

//Instantiate Functions Object
 $func=new Functions();



 if(isset($_FILES['image'])){
 	 $userID=$_POST["userID"];

	$image_name=$_FILES['image']['name'];
	$image_type=$_FILES['image']['type'];
	$image_size=$_FILES['image']['size'];
	$image_tmp_name=$_FILES['image']['tmp_name'];

	$filepath=  'uploads/'.$image_name;

	//Validate image
	$valid_extensions=array("gif");
	$temporary =explode(".",$image_name);
	$file_extension = strtolower(end($temporary));

	if(in_array($file_extension, $valid_extensions)){

		echo json_encode(array('status'=>'0')); //No gif image allowed

	}else{
		//Move file to folder one space back
		$move_file=move_uploaded_file($image_tmp_name,'../'.$filepath);

		if($move_file==true){

			//Add image url to database
			$updateImage=$func->updateUserImage($userID,$filepath);
			if($updateImage){
				echo json_encode(array('status'=>'1'));	//Successfully updated image
			}else{
				echo json_encode(array('status'=>'2'));	//unable to add image url to database
			}

		}else{
			echo json_encode(array('status'=>'3')); //Unable to move image to folder
		}
	}
 }else{

 	echo json_encode(array('status'=>'4')); //No image file selected
 }





?>
