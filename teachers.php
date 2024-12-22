<?php
// Database connection
$conn = new mysqli('localhost', 'root', '2001', 'test');

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// Fetch data from the database
$sql = "SELECT first_name, last_name, email, degree,expertise, experience, skills FROM Teacher";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Teacher Information</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Teacher Information</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Degree</th>
                    <th>Job Title</th>
                    <th>Experience</th>
                    <th>Skills</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['first_name']}</td>
                                <td>{$row['last_name']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['degree']}</td>
                                <td>{$row['expertise']}</td>
                                <td>{$row['experience']}</td>
                                <td>{$row['skills']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>No records found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
