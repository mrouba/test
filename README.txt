
This SCHEMA OF OUR DATABASE . 
the database named test 
 Run This Code on MySQL . 

"
Create DATABASE test;

CREATE TABLE Teacher (
  
    first_name VARCHAR(100),                  -- Teacher's first name
    last_name VARCHAR(100),                   -- Teacher's last name
    email VARCHAR(100) UNIQUE,                -- Teacher's email address
    phone_number VARCHAR(15),                 -- Teacher's contact number
    degree VARCHAR(50),               -- Teacher's highest educational qualification (e.g., PhD)
    expertise VARCHAR(255),                   -- Field of expertise or specialization (e.g., Computer Science, Mathematics)
    experience INT,                     -- Number of years of teaching experience
    skills VARCHAR(255),                      -- Specific skills (e.g., Python, Data Science, etc.)
    availability VARCHAR(50),                 -- Availability (e.g., Full-time, Part-time, Flexible)
    location VARCHAR(255),         -- Preferred location for teaching or work
    university_type VARCHAR(50)     -- Type of university preferred (e.g., Public, Private)
);
CREATE TABLE University (
  
    university_name VARCHAR(255),             -- Name of the university
    department VARCHAR(100),                  -- Department offering the position (e.g., Computer Science)
    job_title VARCHAR(100),                   -- Title of the job position (e.g., Professor, Lecturer)
    degree VARCHAR(50),              -- Required degree level for the position (e.g., PhD)
    expertise VARCHAR(255),            -- Specific expertise required (e.g., Artificial Intelligence, Software Engineering)
    experience INT,                  -- Minimum years of experience required for the position
    skills VARCHAR(255),             -- Specific skills needed for the position (e.g., Java, Machine Learning)
    job_type VARCHAR(50),                     -- Job type (e.g., Full-time, Part-time, Contract)
    location VARCHAR(255),                    -- Location of the universityjob
    university_type VARCHAR(50)               -- Type of university (e.g., Public, Private)
);
"