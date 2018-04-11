<?php

 try{			
		
		$conn = new pdo('mysql:host=127.0.0.1:3306;dbname=angularjs', 'root', '');
	}
	catch(PDOException $e){
		
		echo"Cannot connect from a development environment " . $e->getMessage();
	} 

	class Functions{
	
		public function login($email,$password){
			
			try{
				global $conn;
				$sql="SELECT * FROM user WHERE email=:email AND password=:password";
				$stmt = $conn->prepare($sql);
				$stmt->bindParam(':email', $email);
				$stmt->bindParam(':password', $password);
				$stmt->execute();
				$rows=$stmt->rowCount();
				if($rows>0)
				{
					return $stmt;
				}
				else{
					return $stmt;
				}	
			}catch(PDOException $e){
				echo "Database Error: ". $e->getMessage();
			}
		}
		
		public function searchEmail($email){
			
			try{
				global $conn;
				$sql="SELECT userID FROM user WHERE email=:email";
				$stmt = $conn->prepare($sql);
				$stmt->bindParam(':email', $email);
				$stmt->execute();
				$rows=$stmt->rowCount();
				if($rows>0)
				{
					return $stmt;
				}
				else{
					return false;
				}	
			}catch(PDOException $e){
				echo "Database Error: ". $e->getMessage();
			}
		}
		
		public function register($name,$surname,$email,$pass,$picture,$reg_date){
			
			try{
				global $conn;
				$sql="INSERT INTO user(name,surname,email,password,picture,reg_date) VALUES(:name,:surname,:email,:password,:picture,:date)";
				$stmt = $conn->prepare($sql);
				$stmt->bindParam(':name', $name);
				$stmt->bindParam(':surname', $surname);
				$stmt->bindParam(':email', $email);
				$stmt->bindParam(':password', $pass);
				$stmt->bindParam(':picture', $picture);
				$stmt->bindParam(':date', $reg_date);
				$stmt->execute();
				$rows=$stmt->rowCount();
				if($rows>0)
				{
					return $stmt;
				}
				else{
					return false;
				}	
			}catch(PDOException $e){
				echo "Database Error: ". $e->getMessage();
			}
		}

		public function getUserByID($userID){
			
			try{
				global $conn;
				$sql="SELECT userID,name,surname,picture,email,reg_date FROM user WHERE userID=:userID";
				$stmt = $conn->prepare($sql);
				$stmt->bindParam(':userID', $userID);
				$stmt->execute();
				$rows=$stmt->rowCount();
				if($rows>0)
				{
					return $stmt;
				}
				else{
					return false;
				}	
			}catch(PDOException $e){
				echo "Database Error: ". $e->getMessage();
			}
		}

		public function getNotesByUserID($userID){
			
			try{
				global $conn;
				$sql="SELECT * FROM note WHERE userID=:userID";
				$stmt = $conn->prepare($sql);
				$stmt->bindParam(':userID', $userID);
				$stmt->execute();
				$rows=$stmt->rowCount();
				if($rows>0)
				{
					return $stmt;
				}
				else{
					return false;
				}	
			}catch(PDOException $e){
				echo "Database Error: ". $e->getMessage();
			}
		}

		public function updateUserImage($userID,$imageUrl){
			
			try{
				global $conn;
				$sql="UPDATE user SET picture=:imageUrl WHERE userID=:userID";
				$stmt = $conn->prepare($sql);
				$stmt->bindParam(':userID', $userID);
				$stmt->bindParam(':imageUrl', $imageUrl);
				$stmt->execute();
				$rows=$stmt->rowCount();
				if($rows>0)
				{
					return $stmt;
				}
				else{
					return false;
				}	
			}catch(PDOException $e){
				echo "Database Error: ". $e->getMessage();
			}

		}

		public function updateNote($noteID,$noteTitle,$noteText){
		
			try{
				global $conn;
				$sql="UPDATE note SET note_title=:noteTitle , note_text=:noteText WHERE noteID=:noteID";
				$stmt = $conn->prepare($sql);
				$stmt->bindParam(':noteID', $noteID);
				$stmt->bindParam(':noteTitle', $noteTitle);
				$stmt->bindParam(':noteText', $noteText);
				$stmt->execute();
				$rows=$stmt->rowCount();
				if($rows>0)
				{
					return $stmt;
				}
				else{
					return false;
				}	
			}catch(PDOException $e){
				echo "Database Error: ". $e->getMessage();
			}
	
	}

	public function deleteNote($noteID){ 
		
			try{
				global $conn;
				$sql="DELETE FROM note WHERE noteID=:noteID";
				$stmt = $conn->prepare($sql);
				$stmt->bindParam(':noteID', $noteID);
				$stmt->execute();
				$rows=$stmt->rowCount();
				if($rows>0)
				{
					return $stmt;
				}
				else{
					return false;
				}	
			}catch(PDOException $e){
				echo "Database Error: ". $e->getMessage();
			}
	
	}

	public function addNewNote($userID,$noteText,$noteDate,$noteTitle){
		try{
				global $conn;
				$sql="INSERT INTO note(userID , note_text , note_date , note_title) VALUES(:userID , :noteText , :noteDate , :noteTitle)";
				$stmt = $conn->prepare($sql);
				$stmt->bindParam(':userID', $userID);
				$stmt->bindParam(':noteText', $noteText);
				$stmt->bindParam(':noteDate', $noteDate);
				$stmt->bindParam(':noteTitle', $noteTitle);
				$stmt->execute();
				$rows=$stmt->rowCount();
				if($rows>0)
				{
					return $stmt;
				}
				else{
					return false;
				}	
			}catch(PDOException $e){
				
				echo "Database Error: ". $e->getMessage();
			}
	}
	public function searchEmailBeforeUpdate($userID,$email){
		try{
				global $conn;
				$sql="SELECT name FROM user WHERE email=:email AND NOT userID=:userID";
				$stmt = $conn->prepare($sql);
				$stmt->bindParam(':userID', $userID);
				$stmt->bindParam(':email', $email);
				$stmt->execute();
				$rows=$stmt->rowCount();
				if($rows>0)
				{
					return $stmt;
				}
				else{
					return false;
				}	
			}catch(PDOException $e){
				
				echo "Database Error: ". $e->getMessage();
			}
	}

	public function updateUserDetails($userID,$name,$surname,$email){
		try{
				global $conn;
				$sql="UPDATE user SET name=:name , surname=:surname , email=:email WHERE userID=:userID";
				$stmt = $conn->prepare($sql);
				$stmt->bindParam(':userID', $userID);
				$stmt->bindParam(':name', $name);
				$stmt->bindParam(':surname', $surname);
				$stmt->bindParam(':email', $email);
				$stmt->execute();
				$rows=$stmt->rowCount();
				if($rows>0)
				{
					return $stmt;
				}
				else{
					return false;
				}	
			}catch(PDOException $e){
				
				echo "Database Error: ". $e->getMessage();
			}
	}

}
?>