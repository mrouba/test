<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>University Job Posting Form</title>
  <style>
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
    .section {
      margin-bottom: 20px;
    }
    label {
      font-weight: bold;
      margin-bottom: 5px;
      display: block;
    }
    input, select, textarea {
      width: 100%;
      padding: 8px;
      margin: 5px 0 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    textarea {
      height: 100px;
    }
    .button-container {
      text-align: center;
    }
    button {
      padding: 10px 20px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>

  <div class="container">
    <h1>University Job Posting Form</h1>
    <form action="univ_register.php" method="post">
      <!-- University Information Section -->
      <div class="section">
        <h3>1. University Information</h3>
        <label for="universityName">University Name:</label>
        <input type="text" id="universityName" name="universityName" required>

        
        <label for="department">Area of Expertise:</label>
              <select id="department" name="department" required>
                <option value="">Select Area of Expertise</option>
                <option value="Mathematics">Mathematics</option>
                <option value="Computer Science">Computer Science</option>
                <option value="Physics">Physics</option>
                <option value="Engineering">Engineering</option>
                <option value="Biology">Biology</option>
                <option value="Chemistry">Chemistry</option>
                <option value="English">English</option>
                <option value="English">Arabic</option>

              </select>

        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required>
      </div>

      <!-- Job Information Section -->
      <div class="section">
        <h3>2. Job Information</h3>
        <label for="jobTitle">Job Title:</label>
        <input type="text" id="jobTitle" name="jobTitle" required>

        <label for="degree">Required Degree Level:</label>
        <select id="degree" name="degree" required>
          <option value="">Select Degree</option>
          <option value="PhD">PhD</option>
          <option value="Masters">Masters</option>
          <option value="Bachelors">Bachelors</option>
          <option value="Associate">Associate</option>
        </select>

        <label for="expertise">Required Expertise:</label>
        <input type="text" id="expertise" name="expertise" required>

        <label for="experience">Minimum Years of Experience:</label>
        <input type="number" id="experience" name="experience" required>

        <label for="skills">Required Skills:</label>
        <input type="text" id="skills" name="skills" required>

        <label for="jobType">Job Type:</label>
        <select id="jobType" name="jobType" required>
          <option value="">Select Job Type</option>
          <option value="Full-time">Full-time</option>
          <option value="Part-time">Part-time</option>
          <option value="Contract">Contract</option>
        </select>
      </div>

      <!-- University Type Section -->
      <div class="section">
        <h3>3. University Type</h3>
        <label for="universityType">Type of University:</label>
        <select id="universityType" name="universityType" required>
          <option value="">Select University Type</option>
          <option value="Public">Public</option>
          <option value="Private">Private</option>
          <option value="Both">Both</option>
        </select>
      </div>

      <!-- Submit Button -->
      <div class="button-container">
        <button type="submit">Submit Job Posting</button>
      </div>
    </form>
  </div>

</body>
</html>
