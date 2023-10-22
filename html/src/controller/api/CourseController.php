 <?php
    require_once(__DIR__ . '/BaseController.php');
    require_once(__DIR__ . '/../../model/CourseModel.php');
    class CourseController extends BaseController
    {
        private $courseModel = null;

        public function __construct()
        {
            $this->courseModel = new CourseModel();
        }

        public function getCourse($courseCode)
        {
            $strErrorDesc = '';
            $requestMethod = $_SERVER["REQUEST_METHOD"];

            if ($requestMethod == 'GET') {
                try {
                    $result = $this->courseModel->getCourse($courseCode);
                    $responseData = json_encode($result);
                } catch (Error $e) {
                    $strErrorDesc = $e->getMessage();
                    $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                }
            }

            if (!$strErrorDesc) {
                $this->sendOutput(
                    $responseData,
                    array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                );
            } else {
                $this->sendOutput(
                    json_encode(array('error' => $strErrorDesc)),
                    array('Content-Type: application/json', $strErrorHeader)
                );
            }
        }

        public function createCourse($courseCode)
        {   
            $strErrorDesc = '';
            $requestMethod = $_SERVER["REQUEST_METHOD"];

            if ($requestMethod == 'POST') {
    
                $jsonData = file_get_contents('php://input'); // receives the json input

                $courseData = json_decode($jsonData, true);

                var_dump($courseData);

                echo $courseData[0]['CourseCode'];
                echo $courseData[0]['CourseName'];
                echo $courseData[0]['CourseDescription'];
                echo $courseData[0]['CourseWeight'];
        
                try {
                    $result = $this->courseModel->createCourse($courseData);
                    $responseData = json_encode($result);
                } catch (Error $e) {
                    $strErrorDesc = $e->getMessage();
                    $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                }
            }

            if (!$strErrorDesc) {
                $this->sendOutput(
                    $responseData,
                    array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                );
            } else {
                $this->sendOutput(
                    json_encode(array('error' => $strErrorDesc)),
                    array('Content-Type: application/json', $strErrorHeader)
                );
            }
        }

        public function deleteCourse($courseCode)
        {
            $strErrorDesc = '';
            $requestMethod = $_SERVER["REQUEST_METHOD"];

            if ($requestMethod == 'DELETE') {
                try {
                    $result = $this->courseModel->deleteCourse($courseCode);
                    $responseData = json_encode($result);
                } catch (Error $e) {
                    $strErrorDesc = $e->getMessage();
                    $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                }
            }

            if (!$strErrorDesc) {
                $this->sendOutput(
                    $responseData,
                    array('Content-Type: application/json', 'HTTP/1.1 200 OK')
                );
            } else {
                $this->sendOutput(
                    json_encode(array('error' => $strErrorDesc)),
                    array('Content-Type: application/json', $strErrorHeader)
                );
            }
        }

        public function updateCourse()
        {
            return null;
        }
    }
