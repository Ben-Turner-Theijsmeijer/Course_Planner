<?php
/*
Module that holds the queries for interacting with the database tables
*/
require_once(__DIR__ . '/Database.php');
class CourseModel extends Database
{
    /*
    ======================================================================
    ||                        Course Functions                          ||
    ======================================================================
    */

    // Retrieves a course from the Courses table
    public function getCourse($courseCode)
    {
        return $this->select("SELECT * FROM Courses WHERE CourseCode = ?", ["s", $courseCode]);
    }

    // Deletes a course from the Courses table
    public function deleteCourse($courseCode)
    {
        return $this->delete("DELETE FROM Courses WHERE CourseCode = ?", ["s", $courseCode]);
    }

    // Creates an entry in the Courses table 
    public function createCourse($courseData)
    {
        return $this->create("INSERT INTO Courses (CourseCode, CourseName, CourseOffering, CourseWeight, CourseDescription, CourseFormat, Prerequisites, PrerequisiteCredits, Corequisites, Restrictions, Equates, Department, Location)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", [
            "sssssssssssss",
            $courseData[0]['CourseCode'],
            $courseData[0]['CourseName'],
            $courseData[0]['CourseOffering'],
            $courseData[0]['CourseWeight'],
            $courseData[0]['CourseDescription'],
            $courseData[0]['CourseFormat'],
            $courseData[0]['Prerequisites'],
            $courseData[0]['PrerequisiteCredits'],
            $courseData[0]['Corequisites'],
            $courseData[0]['Restrictions'],
            $courseData[0]['Equates'],
            $courseData[0]['Department'],
            $courseData[0]['Location']
        ]);
    }

    // Updates a Course's information with its given CourseCode
    public function updateCourse($courseData)
    {
        return $this->update("UPDATE Courses 
            SET 
            CourseName = ?,
            CourseOffering = ?,
            CourseWeight = ?,
            CourseDescription = ?,
            CourseFormat = ?,
            Prerequisites = ?,
            PrerequisiteCredits = ?,
            Corequisites = ?,
            Restrictions = ?,
            Equates = ?,
            Department = ?,
            Location = ?
            WHERE CourseCode = ?", [
            "sssssssssssss",
            $courseData[0]['CourseName'],
            $courseData[0]['CourseOffering'],
            $courseData[0]['CourseWeight'],
            $courseData[0]['CourseDescription'],
            $courseData[0]['CourseFormat'],
            $courseData[0]['Prerequisites'],
            $courseData[0]['PrerequisiteCredits'],
            $courseData[0]['Corequisites'],
            $courseData[0]['Restrictions'],
            $courseData[0]['Equates'],
            $courseData[0]['Department'],
            $courseData[0]['Location'],
            $courseData[0]['CourseCode']
        ]);
    }

    /*
    ======================================================================
    ||                        Subject Functions                         ||
    ======================================================================
    */

    // Retrieves all subject courses for each department offered at the University of Guelph
    public function getAllSubjectCourses()
    {
        return $this->select("SELECT CourseCode FROM Courses");
    }

    // Retrieves all the courses for a given department
    public function getSubjectCourses($subjectCode)
    {
        return $this->select(
            "SELECT CourseCode FROM Courses WHERE CourseCode LIKE ?",
            ["s", "%" . $subjectCode . "%"]
        );
    }

    /*
    ======================================================================
    ||                      Prerequisites Functions                     ||
    ======================================================================
    */

    // Retrieves all the prereqs for a given course code
    public function getPrereqs($courseCode)
    {
        return $this->select(
            "SELECT Prerequisites FROM Courses WHERE CourseCode = ?",
            ["s", $courseCode]
        );
    }

    // Retrieves all courses that $courseCode is a prerequisite for
    public function getFuturePrereqs($courseCode)
    {
        return $this->select(
            "SELECT CourseCode FROM Courses WHERE Prerequisites LIKE ?",
            ["s", "%".$courseCode."%"]
        );
    }

    public function postFuturePrereqs($courseData)
    {
        // Initialize query and parameters for further building
        $query = "SELECT DISTINCT CourseCode FROM Courses WHERE ";
        $params = array("");

        // Get the length of the passed JSON array and create an iterable
        $numItems = count($courseData);
        $i = 0;

        foreach($courseData as $item) {

            // Append a new LIKE statement to the query for each course code in the list
            $query .= "Prerequisites LIKE ?";
            if(++$i !== $numItems) {
                $query .= " OR "; // Add an or between each LIKE statement
            }

            // Append course code to params
            $params[0] .= "s";
            $params[] = "%".$item["CourseCode"]."%";
        }

        return $this->select(
            $query,
            $params
        );
    }

    /*
    ======================================================================
    ||                  Student Course_Taken Functions                  ||
    ======================================================================
    */

    // Retrieves the values from the CoursesTaken Table
    public function getCourse_table()
    {
        return $this->select("SELECT * FROM Courses_Taken");
    }

    // Deletes a course from the CoursesTaken Table
    public function deleteCourse_table($courseCode)
    {
        return $this->deleteStudent("DELETE FROM Courses_Taken
            WHERE CourseCode = ?", ["s", $courseCode]);
    }

    // Creates a new entry in the CoursesTaken Table
    public function postCourse_table($courseCode)
    {
        return $this->createStudent("INSERT INTO Courses_Taken (CourseCode, CourseName, Prerequisites)
            SELECT CourseCode, CourseName, Prerequisites
            FROM Courses Where CourseCode = ?", ["s", $courseCode]);
    }

    // Updates a student's grade for a given course
    public function putCourse_table($courseCode, $grade)
    {
        return $this->updateStudent("UPDATE Courses_Taken
            SET Grade = ?
            WHERE CourseCode = ?", ["ss", $grade, $courseCode]);
    }
}