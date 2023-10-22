CREATE DATABASE IF NOT EXISTS `cis3760`;
USE cis3760;

-- Courses Table
CREATE TABLE Courses (
    CourseID INT AUTO_INCREMENT PRIMARY KEY,
    CourseCode VARCHAR(64) NOT NULL,
    CourseName VARCHAR(255) NOT NULL,
    CourseOffering VARCHAR(64) NOT NULL,
    CourseWeight FLOAT NOT NULL,
    CourseDescription TEXT NOT NULL,
    CourseFormat VARCHAR(255),
    Prerequisites VARCHAR(255),
    PrerequisiteCredits FLOAT,
    Corequisites VARCHAR(255),
    Restrictions VARCHAR(255),
    Equates VARCHAR(255),
    Department TEXT,
    Location VARCHAR(64)
);

-- Prerequisites Table
CREATE TABLE Prerequisites (
    PrerequisiteID INT PRIMARY KEY,
    CourseID INT,
    PrerequisiteCourseID INT,    -- References a course 
    PrerequisiteType VARCHAR(255),  -- Specifies the type of prerequisite (e.g., 'GPA', 'CreditsRequirement', 'Other')
    GPA FLOAT,  -- Stores the required GPA 
    CreditsRequirement FLOAT,     -- Stores the required credits
    Other TEXT,         -- Stores other specific requirements or conditions
    FOREIGN KEY (CourseID) REFERENCES Courses(CourseID),
    FOREIGN KEY (PrerequisiteCourseID) REFERENCES Courses(CourseID)
);

-- User Courses Taken Table
CREATE TABLE Courses_Taken (
    CourseID INT AUTO_INCREMENT PRIMARY KEY,
    CourseCode VARCHAR(64) NOT NULL,
    CourseName VARCHAR(255) NOT NULL,
    Prerequisites VARCHAR(255)
);
