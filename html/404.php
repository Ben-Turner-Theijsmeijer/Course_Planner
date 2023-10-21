<?php
require_once(__DIR__.'/src/controller/api/CourseController.php');

$servername = "localhost";
$username = "cis3760";
$password = "AmountDirestPropel";
$dbname = "cis3760";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully to database: " . $dbname;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

if(isset($uri[1]) && $uri[1] == 'api')
{
    if(isset($uri[2]) && $uri[2] == 'v1')
    { 
        if(isset($uri[3]) && $uri[3] == 'course')
        {
            $courseController = new CourseController();
            $requestMethod = $_SERVER['REQUEST_METHOD'];
            
            switch ($requestMethod)
            {
                case 'GET':
                    if(isset($uri[4]))
                    {
                        $courseController->getCourse($uri[4]);     
                    }
                    break;
            }
        }
    }
}
else
{
    header("HTTP/1.1 404 Not Found");
}