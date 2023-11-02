<?php
/*
Module that holds the Course Controller for the HTTP Requests
*/
require_once(__DIR__ . '/BaseController.php');
require_once(__DIR__ . '/../../model/CourseModel.php');
class CourseController extends BaseController
{
    // setup module that holds the queries for interacting with the database tables
    private $courseModel = null;

    public function __construct()
    {
        $this->courseModel = new CourseModel();
    }

    /*
    ======================================================================
    ||                        Course Functions                          ||
    ======================================================================
    */

    // Function: Retrieves a course from the Courses table
    // uses: GET
    public function getCourse($courseCode)
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];

        // check method call & attempt GET
        if ($requestMethod == 'GET') {
            try {
                $result = $this->courseModel->getCourse($courseCode);
                $responseData = json_encode($result);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage();
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        }

        // operation succeeded
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else { // operation failed
            $this->sendOutput(
                json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }

    // Function: Creates an entry in the Courses table
    // uses: POST
    public function createCourse($courseCode)
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];

        // check method call & attempt POST
        if ($requestMethod == 'POST') {

            $jsonData = file_get_contents('php://input'); // receives the json input

            $courseData = json_decode($jsonData, true); // converts to a PHP Array

            try {
                $result = $this->courseModel->createCourse($courseData);
                $responseData = json_encode($result);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage();
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }   
        }

        // operation succeeded
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else { // operation failed
            $this->sendOutput(
                json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }

    // Function: Deletes a course from the Courses table
    // uses: DELETE
    public function deleteCourse($courseCode)
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];

        // check method call & attempt DELETE
        if ($requestMethod == 'DELETE') {
            try {
                $result = $this->courseModel->deleteCourse($courseCode);
                $responseData = json_encode($result);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage();
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        }

        // operation succeeded
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else { // operation failed
            $this->sendOutput(
                json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }

    // Function: Updates a Course's information with its given CourseCode
    // uses: PUT
    public function updateCourse($courseCode)
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];

        // check method call & attempt PUT
        if ($requestMethod == 'PUT') {

            $jsonData = file_get_contents('php://input'); // receives the json input

            $courseData = json_decode($jsonData, true); // converts to a PHP Array

            try {
                $result = $this->courseModel->updateCourse($courseData);
                $responseData = json_encode($result);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage();
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        }

        // operation succeeded
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else { // operation failed
            $this->sendOutput(
                json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }

    /*
    ======================================================================
    ||                        Subject Functions                         ||
    ======================================================================
    */

    // Function: Retrieves all courses for each subject offered at the University of Guelph
    // uses: GET
    public function getAllSubjectCourses()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];

        // check method call & attempt GET
        if ($requestMethod == 'GET') {
            try {
                $result = $this->courseModel->getAllSubjectCourses();
                $responseData = json_encode($result);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage();
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        }

        // operation succeeded
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else { // operation failed
            $this->sendOutput(
                json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }

    }

    // Function: Retrieve all courses for a specified subject
    // uses: GET
    public function getSubjectCourses($subjectCode)
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];

        // check method call & attempt GET
        if ($requestMethod == 'GET') {
            try {
                $result = $this->courseModel->getSubjectCourses($subjectCode);
                $responseData = json_encode($result);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage();
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        }

        // operation succeeded
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else { // operation failed
            $this->sendOutput(
                json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }

    /*
    ======================================================================
    ||                      Prerequisites Functions                     ||
    ======================================================================
    */

    // Function: Retrieve all prerequisites for a specified course
    // uses: GET
    public function getPrereqs($courseCode)
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        // check method call & attempt GET
        if ($requestMethod == 'GET') {
            try {
                $result = $this->courseModel->getPrereqs($courseCode);
                $responseData = json_encode($result);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage();
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        }

        // operation succeeded
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else { // operation failed
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }

    // Function: Retrieve all courses that a specified course is a prerequisite for
    // uses: GET
    public function getFuturePrereqs($courseCode)
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        // check method call & attempt GET
        if ($requestMethod == 'GET') {
            try {
                $result = $this->courseModel->getFuturePrereqs($courseCode);
                $responseData = json_encode($result);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage();
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        }

        // operation succeeded
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else { // operation failed
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }

    // Function: Retrieves all course codes that satisfy at least one of the requirements in the passed JSON list
    // Uses: POST
    public function postFuturePrereqs()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];

        // check method call & attempt POST
        if ($requestMethod == 'POST') {
            try {

                $jsonData = file_get_contents('php://input'); // receives the json input
                
                $courseData = json_decode($jsonData, associative:true, flags:JSON_THROW_ON_ERROR); // converts to a PHP Array
                
                if (count($courseData) <= 0) {
                    throw new JsonException("Zero length array passed"); // Throw an exception if zero-length array passed
                }

                foreach ($courseData as $item) {
                    if(!isset($item["CourseCode"])) {
                         throw new JsonException("At least 1 object missing 'CourseCode' key"); // Throw an exception if 'CourseCode' key is missing from data
                    }
                }

                $result = $this->courseModel->postFuturePrereqs($courseData);
                $responseData = json_encode($result);
            } 
            catch(JsonException $e) {
                $strErrorDesc = $e->getMessage();
                $strErrorHeader = 'HTTP/1.1 400 Bad Request';
            }
            catch (Error $e) {
                $strErrorDesc = $e->getMessage();
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }

            // operation succeeded
            if (!$strErrorDesc) {
                $this->sendOutput(
                    $responseData,
                    array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                );
            } else { // operation failed
                $this->sendOutput(
                    json_encode(array('error' => $strErrorDesc)),
                    array('Content-Type: application/json', $strErrorHeader)
                );
            }
        }
    }

    /*
    ======================================================================
    ||                  Student Course_Taken Functions                  ||
    ======================================================================
    */

    // Function: Retrieves the values from the student's CoursesTaken Table
    // uses: GET
    public function getCourse_table()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];

        // check method call & attempt GET
        if ($requestMethod == 'GET') {
            try {
                $result = $this->courseModel->getCourse_table();
                $responseData = json_encode($result);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage();
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        }

        // operation succeeded
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else { // operation failed
            $this->sendOutput(
                json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }

    // Function: Creates a new entry in the student's CoursesTaken Table
    // uses: POST
    public function postCourse_table($courseCode)
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];

        // check method call & attempt POST
        if ($requestMethod == 'POST') {
            try {
                $result = $this->courseModel->postCourse_table($courseCode);
                $responseData = json_encode($result);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage();
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        }

        // operation succeeded
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else { // operation failed
            $this->sendOutput(
                json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }

    // Function: Updates a student's grade for a given course in the CoursesTaken Table
    // uses: PUT
    public function putCourse_table($courseCode, $grade)
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];

        // check method call & attempt PUT
        if ($requestMethod == 'PUT') {
            try {
                $result = $this->courseModel->putCourse_table($courseCode, $grade);
                $responseData = json_encode($result);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage();
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        }

        // operation succeeded
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else { //operation failed
            $this->sendOutput(
                json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }

    // Function: Deletes a course from the student's CoursesTaken Table
    // uses: DELETE
    public function deleteCourse_table($courseCode)
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];

        // check method call and attempt DELETE
        if ($requestMethod == 'DELETE') {
            try {
                $result = $this->courseModel->deleteCourse_table($courseCode);
                $responseData = json_encode($result);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage();
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        }

        // operation succeeded
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else { //operation failed
            $this->sendOutput(
                json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }
}