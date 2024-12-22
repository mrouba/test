<?php
	$universityName = $_POST['universityName'];
	$department = $_POST['department'];
	$jobTitle = $_POST['jobTitle'];
	$degree = $_POST['degree'];
	$expertise = $_POST['expertise'];
	$experience = $_POST['experience'];
	$skills = $_POST['skills'];
	$jobType = $_POST['jobType'];
	$location = $_POST['location'];
	$universityType = $_POST['universityType'];

	// Database connection
	$conn = new mysqli('localhost','root','2001','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		// Prepare the SQL statement to match the University table
		$stmt = $conn->prepare("INSERT INTO University (university_name, department, job_title, degree, expertise, experience, skills, job_type, location, university_type) 
								VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssiisss", $universityName, $department, $jobTitle, $degree, $expertise, $experience, $skills, $jobType, $location, $universityType);
		$execval = $stmt->execute();
		echo $execval;
		echo "Job posting successfully registered...";
		$stmt->close();
		$conn->close();
	}
?>
