<?php
	
	session_start();

	include('database.php');
	include('functions.php');

	$conn = connect_db();

	//Get data from the form
	$content = sanitizeString($_POST['content'], $conn);
	$UID = $_POST['UID'];

	//connect to DB
	
	$result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$UID'");
	$row = mysqli_fetch_assoc($result);

	//Fetch User information	
	$name = $row["Name"];
	$profile_pic = $row["profile_pic"];

	$result_insert = mysqli_query($conn, "INSERT INTO comments(content, UID, name, profile_pic, likes) VALUES ('$content', $UID, '$name', '$profile_pic', 0)");

	//check if insert was okay
	if($result_insert){

		//redirect to feed page 
		header("Location: feed.php");

	}

 

?>