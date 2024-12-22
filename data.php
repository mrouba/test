<?php
// Connect to the MySQL database
$conn = new mysqli('localhost', 'root', '2001', 'test');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch teacher data
$teacher_query = "SELECT * FROM Teacher";
$teacher_result = $conn->query($teacher_query);

// Query to fetch university data
$university_query = "SELECT * FROM University";
$university_result = $conn->query($university_query);

// Prepare data for use in JavaScript
$teacher_expertise = [];
$teacher_availability = [];
while ($teacher_row = $teacher_result->fetch_assoc()) {
    $teacher_expertise[] = $teacher_row['expertise'];
    $teacher_availability[] = $teacher_row['availability'];
}

$university_job_titles = [];
while ($university_row = $university_result->fetch_assoc()) {
    $university_job_titles[] = $university_row['job_title'];
}

// Close the database connection
$conn->close();
?>

<!-- Send PHP data to JavaScript -->
<script type="text/javascript">
    var teacherExpertise = <?php echo json_encode($teacher_expertise); ?>;
    var teacherAvailability = <?php echo json_encode($teacher_availability); ?>;
    var universityJobTitles = <?php echo json_encode($university_job_titles); ?>;
</script>
