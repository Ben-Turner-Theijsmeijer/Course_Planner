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

    public function getCourse_table()
    {
        return $this->select("SELECT * FROM Courses_Taken");
    }

    public function postCourse_table($courseCode)
    {
        return $this->createStudent("INSERT INTO Courses_Taken (CourseCode, CourseName, Prerequisites)
            SELECT CourseCode, CourseName, Prerequisites
            FROM Courses Where CourseCode = ?", ["s", $courseCode]);
    }

    public function putCourse_table($courseCode, $grade)
    {
        return $this->updateStudent("UPDATE Courses_Taken
            SET Grade = ?
            WHERE CourseCode = ?", ["ss", $grade, $courseCode]);
    }

    public function deleteCourse_table($courseCode)
    {
        return $this->deleteStudent("DELETE FROM Courses_Taken
            WHERE CourseCode = ?", ["s", $courseCode]);
    }
}