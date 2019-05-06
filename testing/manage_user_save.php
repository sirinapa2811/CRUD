<?php
	include("config.php");

	$cmd = isset($_GET['cmd']) ? $_GET['cmd'] : "";
	$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : "";
	if($cmd == "manage"){
		
		$firstname = isset($_GET['firstname']) ? $_GET['firstname'] : "";
		$lastname = isset($_GET['lastname']) ? $_GET['lastname'] : "";

		if($firstname  != "" && $lastname != ""){
			if($user_id == ""){
				$sql = "INSERT INTO user(user_id, firstname, lastname)
						VALUES (NULL,'".$firstname."','".$lastname."')";
		
			}else if($user_id != ""){
				$sql = "UPDATE user
						SET
						firstname = '".$firstname."',
						lastname = '".$lastname."'
						WHERE user_id = ".$user_id."";
		
			}	
		}else{
			echo "No data for save/update.";
		}
	}else if($cmd == "delete"){		
		$sql = "DELETE FROM user WHERE user_id = ".$user_id."";
	}
	
	if ($conn->query($sql) === TRUE) {
			echo "successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}	
	header("Refresh:2; url=http://127.0.0.1/testing/manage_user.php");
	exit(0);
?>