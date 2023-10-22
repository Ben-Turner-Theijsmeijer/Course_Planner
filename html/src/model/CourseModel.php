<?php
require_once(__DIR__ . '/Database.php');
class CourseModel extends Database
{
    public function getCourse($courseCode)
    {
        return $this->select("SELECT * FROM Courses WHERE CourseCode = ?", ["s", $courseCode]);
    }
    public function deleteCourse($courseCode)
    {
        return $this->delete("DELETE FROM Courses WHERE CourseCode = ?", ["s", $courseCode]);
    }
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
    
}


