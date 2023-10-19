<?php
require_once "model/CourseModel.php";

$courseModel = new CourseModel();
var_dump($courseModel->getCourse("ANSC*4230"));
