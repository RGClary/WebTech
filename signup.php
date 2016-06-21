<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
</head>
<body>
	<h1>Sign Up Successful</h1>
</body>
</html>

<?php
		
	include('database.php');
	include('functions.php');
	
	session_start();

	$conn = connect_db();

	$username = sanitizeString($_POST["username"], $conn);
	$password = password_hash(sanitizeString($_POST["password"], $conn), PASSWORD_DEFAULT);
	$name = sanitizeString($_POST["name"], $conn);
	$email = sanitizeString($_POST["email"], $conn);
	$dob = sanitizeString($_POST["dob"], $conn);
	$gender = sanitizeString($_POST["gender"], $conn);
	$question = sanitizeString($_POST["verification_question"], $conn);
	$answer = sanitizeString($_POST["verification_answer"], $conn);
	$location = sanitizeString($_POST["location"], $conn);
	$profile_pic = sanitizeString($_POST["profile_pic"], $conn);


	$insert = mysqli_query($conn, "INSERT INTO users (Username, Password, Name, email, dob, gender, verification_question, verification_answer, location, profile_pic)
					VALUES ('$username','$password','$name','$email','$dob','$gender','$question','$answer','$location','$profile_pic')");


?>