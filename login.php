<?php
		
	include('database.php');
	include('functions.php');

	//start session
	session_start();	

	$conn = connect_db();

	//get username and password from $_POST
	$username = sanitizeString($_POST["username"], $conn);
	$password = sanitizeString($_POST["password"], $conn);
	
	$result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
	$row = mysqli_fetch_row($result);
	$hashPass = $row[2];

	//Check in the DB
	if(password_verify($password, $hashPass)){

		//If authenticated: say hello!
		$_SESSION["username"] = $username;
		header("Location: feed.php");
		//echo "Success!! Welcome ".$username;

	}else{
		//else ask to login again..	
		echo "Invalid password! Try again!";

	}
?>