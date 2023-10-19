<?php
require_once "Database.php";
class CourseModel extends Database
{
    public function getCourse($courseCode)
    {
        return $this->select("SELECT * FROM courses WHERE CourseCode = ?", ["s", $courseCode]);
    }
}
