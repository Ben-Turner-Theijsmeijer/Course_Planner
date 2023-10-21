 <?php
 require_once(__DIR__.'/BaseController.php');
 require_once(__DIR__.'/../../model/CourseModel.php');
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

        if($requestMethod == 'GET')
        {
            try
            {
                $result = $this->courseModel->getCourse($courseCode);
                $responseData = json_encode($result);
            }
            catch(Error $e)
            {
                $strErrorDesc = $e->getMessage();
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        }
        
        if(!$strErrorDesc)
        {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        }
        else
        {
            $this->sendOutput(
                json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }

    public function addCourse()
    {
        return null;
    }

    public function deleteCourse()
    {
        return null;
    }

    public function updateCourse()
    {
        return null;
    }
 }