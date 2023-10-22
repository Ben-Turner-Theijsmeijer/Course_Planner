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
}
