<?php
// Step 1: Database connection
$servername = "localhost";
$username = "root";
$password = "2001";
$dbname = "test"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: SQL Query to match teachers with universities based on common criteria
$sql = "
    SELECT 
    Teacher.first_name,
    Teacher.last_name,
    University.university_name,
    University.department AS expertise,
    University.job_title AS job_type,
    (CASE WHEN Teacher.degree = University.degree THEN 1 ELSE 0 END +
     CASE WHEN Teacher.expertise = University.department THEN 1 ELSE 0 END +
     CASE WHEN Teacher.location = University.location THEN 1 ELSE 0 END +
     CASE WHEN Teacher.experience >= University.experience THEN 1 ELSE 0 END) AS match_score
FROM Teacher
JOIN University
ON Teacher.degree = University.degree
   AND Teacher.expertise = University.department
   AND Teacher.location = University.location
   AND Teacher.experience >= University.experience
ORDER BY match_score DESC;
";

// Step 3: Execute query
$result = $conn->query($sql);

// Step 4: Generate an HTML table for the results
if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='10' cellspacing='0'>";
    echo "<tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>University Name</th>
            <th>Department (Expertise)</th>
            <th>Job Title (Job Type)</th>
            <th>Match Score</th>
          </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['first_name']) . "</td>
                <td>" . htmlspecialchars($row['last_name']) . "</td>
                <td>" . htmlspecialchars($row['university_name']) . "</td>
                <td>" . htmlspecialchars($row['expertise']) . "</td>
                <td>" . htmlspecialchars($row['job_type']) . "</td>
                <td>" . htmlspecialchars($row['match_score']) . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No matches found.</p>";
}

// Step 5: Close the connection
$conn->close();
?>
