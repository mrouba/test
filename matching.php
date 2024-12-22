<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matching Results</title>
    <style>
        /* Basic styles for the page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .match-item {
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }
        .match-item:last-child {
            border-bottom: none;
        }
        .match-item h3 {
            margin: 0;
            color: #4CAF50;
        }
        .match-item p {
            margin: 5px 0;
        }
        .match-item .score {
            font-weight: bold;
            color: #f39c12;
        }
    </style>
</head>
<body>

    <!-- Container to hold the results -->
    <div class="container">
        <h1>Teacher - University Matching Results</h1>
        <div id="matching-results"></div>
    </div>

    <script>
        // Fetch matching results from the PHP script
        fetch('fetch_matching.php')  // Make sure this path matches the location of your PHP file
            .then(response => response.json())  // Parse the JSON response
            .then(data => {
                const resultsContainer = document.getElementById('matching-results');
                resultsContainer.innerHTML = '';  // Clear any previous results

                // Check if there are any matching results
                if (data.length > 0) {
                    data.forEach(match => {
                        // Create a new div element for each match
                        const matchItem = document.createElement('div');
                        matchItem.classList.add('match-item');

                        // Add content to the match item
                        matchItem.innerHTML = `
                            <h3>${match.first_name} ${match.last_name} - ${match.university_name}</h3>
                            <p><strong>Department:</strong> ${match.department}</p>
                            <p><strong>Job Title:</strong> ${match.job_title}</p>
                            <p class="score"><strong>Match Score:</strong> ${match.match_score}</p>
                        `;
                        // Append the match item to the container
                        resultsContainer.appendChild(matchItem);
                    });
                } else {
                    // Display a message if no matches are found
                    resultsContainer.innerHTML = '<p>No matches found.</p>';
                }
            })
            .catch(error => {
                // Handle any errors that occur during the fetch request
                console.error('Error fetching matching results:', error);
            });
    </script>

</body>
</html>
