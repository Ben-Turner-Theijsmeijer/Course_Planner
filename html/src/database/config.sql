CREATE DATABASE IF NOT EXISTS `cis3760`;
USE cis3760;

-- Courses Table
CREATE TABLE Courses (
    CourseID INT PRIMARY KEY NOT NULL,
    CourseCode VARCHAR(16) NOT NULL,
    CourseName VARCHAR(255) NOT NULL,
    CourseWeight FLOAT NOT NULL,
    CourseDescription TEXT NOT NULL,
    CourseOffering VARCHAR(16),
    CourseFormat VARCHAR(16),
    Prerequisites VARCHAR(255),
    PrerequisiteCredits FLOAT,
    Corequisites VARCHAR(255),
    Restrictions VARCHAR(255),
    Equates VARCHAR(255),
    Department VARCHAR(32),
    Location VARCHAR(32)
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

-- Course Samples
INSERT INTO Courses (CourseID, CourseCode, CourseName, CourseDescription, CourseOffering, CourseWeight, CourseFormat, Prerequisites, PrerequisiteCredits, Corequisites, Restrictions, Equates, Department, Location)
VALUES
    (1, 'CIS1300', 'Programming', 'This is a course description for CIS 1300', 'Fall', 0.5, NULL, NULL, NULL, NULL, NULL, NULL, 'Department of Computer Science', 'Guelph'),
    (2, 'CIS2500', 'Intermediate Programming', 'This is the course description for CIS 2500', 'Winter', 0.5, NULL, NULL, NULL, NULL, NULL, NULL, 'Department of Computer Science', 'Guelph'),
    (3, 'CIS2520', 'Data Structures', 'This is the course description for CIS 2520', 'Fall', 0.5, NULL, NULL, NULL, NULL, NULL, NULL, 'Department of Computer Science', 'Guelph');

-- Prerequisite Samples
INSERT INTO Prerequisites (PrerequisiteID, CourseID, PrerequisiteCourseID, PrerequisiteType, GPA, CreditsRequirement, Other)
VALUES
    (1, 3, 2, NULL, NULL, NULL, NULL),  -- CIS2520 has CIS2500 as a prerequisite
    (2, 2, 1, NULL, NULL, NULL, NULL);  -- CIS2500 has CIS1300 as a prerequisite