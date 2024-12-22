<?php
// Database connection
$conn = new mysqli('localhost', 'root', '2001', 'test');

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// Fetch data from the database
$sql = "SELECT university_name, job_title, department,degree, experience FROM University";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>University Information</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center">University Information</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>University Name</th>
                    <th>Job Title</th>
                    <th>Department</th>
                    <th>Degree</th>
                    <th>Experience</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['university_name']}</td>
                                <td>{$row['job_title']}</td>
                                 <td>{$row['department']}</td>
                                <td>{$row['degree']}</td>
                                <td>{$row['experience']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center'>No records found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
