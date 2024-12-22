<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 50px;
            font-size: 36px;
        }

        .chart-container {
            margin: 20px 0;
            text-align: center;
        }

        canvas {
            width: 100%;
            height: 400px;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 24px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Teacher and University Dashboard</h1>

        <!-- Teacher Statistics -->
        <div class="chart-container">
            <h2>Teachers' Expertise Distribution</h2>
            <canvas id="teacherChart"></canvas>
        </div>

        <!-- Teacher Availability -->
        <div class="chart-container">
            <h2>Teachers' Availability Distribution</h2>
            <canvas id="availabilityChart"></canvas>
        </div>

        <!-- University Job Titles -->
        <div class="chart-container">
            <h2>University Job Titles Distribution</h2>
            <canvas id="universityChart"></canvas>
        </div>
    </div>

    <script>
        // Wait for DOM to load before executing
        window.onload = function() {
            const teacherExpertise = <?php echo json_encode($teacher_expertise); ?>;
            const teacherAvailability = <?php echo json_encode($teacher_availability); ?>;
            const universityJobTitles = <?php echo json_encode($university_job_titles); ?>;

            // Create chart for Teacher Expertise
            const teacherCtx = document.getElementById('teacherChart').getContext('2d');
            const teacherChart = new Chart(teacherCtx, {
                type: 'bar',
                data: {
                    labels: [...new Set(teacherExpertise)], // Unique expertise
                    datasets: [{
                        label: 'Teacher Expertise Distribution',
                        data: teacherExpertise.reduce((acc, exp) => {
                            acc[exp] = (acc[exp] || 0) + 1;
                            return acc;
                        }, {}),
                        backgroundColor: '#4e73df',
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: { 
                            beginAtZero: true
                        },
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Create chart for Teacher Availability
            const availabilityCtx = document.getElementById('availabilityChart').getContext('2d');
            const availabilityChart = new Chart(availabilityCtx, {
                type: 'pie',
                data: {
                    labels: [...new Set(teacherAvailability)], // Unique availability
                    datasets: [{
                        label: 'Teacher Availability Distribution',
                        data: teacherAvailability.reduce((acc, avail) => {
                            acc[avail] = (acc[avail] || 0) + 1;
                            return acc;
                        }, {}),
                        backgroundColor: ['#36a2eb', '#ff6384', '#ffcd56'],
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // Create chart for University Job Titles
            const universityCtx = document.getElementById('universityChart').getContext('2d');
            const universityChart = new Chart(universityCtx, {
                type: 'bar',
                data: {
                    labels: [...new Set(universityJobTitles)], // Unique job titles
                    datasets: [{
                        label: 'University Job Titles Distribution',
                        data: universityJobTitles.reduce((acc, job) => {
                            acc[job] = (acc[job] || 0) + 1;
                            return acc;
                        }, {}),
                        backgroundColor: '#ffb03b',
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            beginAtZero: true
                        },
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    </script>
</body>
</html>
