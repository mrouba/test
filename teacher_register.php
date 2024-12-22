<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$phoneNumber = $_POST['phoneNumber'];
	$degree = $_POST['degree'];
	$expertise = $_POST['expertise'];
	$experience = $_POST['experience'];
	$skills = $_POST['skills'];
	$availability = $_POST['availability'];
	$location = $_POST['location'];
	$universityType = $_POST['universityType'];

	// Database connection
	$conn = new mysqli('localhost','root','2001','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		// Update bind_param to match all placeholders in the query
		$stmt = $conn->prepare("INSERT INTO Teacher (first_name, last_name, email, phone_number, degree, expertise, experience, skills, availability, location, university_type) 
								VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssssissss", $firstName, $lastName, $email, $phoneNumber, $degree, $expertise, $experience, $skills, $availability, $location, $universityType);
		$execval = $stmt->execute();
		echo $execval;
		echo "Teacher registration successful...";
		$stmt->close();
		$conn->close();
	}
?>
