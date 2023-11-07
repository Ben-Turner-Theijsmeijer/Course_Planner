<?php
/*
Landing page which contains the API logic to fetch information from the database
*/
require_once(__DIR__ . '/src/controller/api/CourseController.php');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

// API endpoints located in /api/v1/
if (isset($uri[1]) && $uri[1] == 'api') {
    if (isset($uri[2]) && $uri[2] == 'v1') {
        $controller = new CourseController();
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        // Course Endpoint
        if (isset($uri[3]) && $uri[3] == 'course') {
            $uri[4] = urldecode($uri[4]);
            switch ($requestMethod) {
                case 'GET':
                    if (isset($uri[4])) {
                        $controller->getCourse($uri[4]);
                    }
                    break;
                case 'DELETE':
                    if (isset($uri[4])) {
                        $controller->deleteCourse($uri[4]);
                    }
                    break;
                case 'POST':
                    if (isset($uri[4])) {
                        $controller->createCourse($uri[4]);
                    }
                    break;
                case 'PUT':
                    if (isset($uri[4])) {
                        $controller->updateCourse($uri[4]);
                    }
                    break;
            }
        }
        //  Subject Endpoint
        if (isset($uri[3]) && $uri[3] == 'subject') {
            // All subjects
            if (isset($uri[4]) && $uri[4] == 'all') {
                switch ($requestMethod) {
                    case 'GET':
                        if (isset($uri[5])) {
                            $controller->getAllSubjectCourses();
                        }
                        break;
                }
            }
            // Specific Subject
            switch ($requestMethod) {
                case 'GET':
                    if (isset($uri[4])) {
                        $uri[4] = urldecode($uri[4]);
                        $controller->getSubjectCourses($uri[4]);
                    }
                    break;
            }
        }
        // Prereq Endpoints
        if (isset($uri[3]) && $uri[3] == 'prereq') {
            if (isset($uri[4]) && $uri[4] == 'future') {
                switch ($requestMethod) {
                    case 'GET':
                        if (isset($uri[5])) {
                            $uri[5] = urldecode($uri[5]);
                            $controller->getFuturePrereqs($uri[5]);
                        }
                        break;
                    case 'POST':
                        $controller->postFuturePrereqs();
                        break;
                }
            } else {
                switch ($requestMethod) {
                    case 'GET':
                        if (isset($uri[4])) {
                            $uri[4] = urldecode($uri[4]);
                            $controller->getPrereqs($uri[4]);
                        }
                        break;
                }
            }
        }
        // Student Endpoint
        if (isset($uri[3]) && $uri[3] == 'student') {
            switch ($requestMethod) {
                case 'GET':
                    $controller->getCourse_table();

                    break;
                case 'POST':
                    if (isset($uri[4])) {
                        $controller->postCourse_table($uri[4]);
                    }
                    break;
                case 'DELETE':
                    if (isset($uri[4])) {
                        $controller->deleteCourse_table($uri[4]);
                    }
                    break;
                case 'PUT':
                    if (isset($uri[4])) {
                        $controller->putCourse_table($uri[4], $uri[5]);
                    }
                    break;
            }
        }
    }
} else {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: text/html; charset=UTF-8");
    header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
}
?>

<!-- HTML SECTION -->
<!DOCTYPE html>
<html>

<!-- Head Section -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="/src/js/scripts.js"></script>
</head>

<!-- Navbar -->
<?php
include './src/components/navbar.php';
?>

<!-- Content Section -->
<div class="relative flex flex-col w-full min-h-screen bg-no-repeat bg-cover bg-top bg-[url('imgs/background.png')]">
    <content class="flex items-center justify-center min-h-screen">
        <div
            class="p-4 md:py-6 md:px-14 flex flex-col justify-center bg-black/60 rounded-md backdrop-blur-sm text-white md:flex-row items-center gap-4 md:gap-20">
            <div class="text-center md:text-left mb-4 md:mb-0">
                <span class="block font-sans font-bold text-xl md:text-3xl whitespace-nowrap">Forget about course
                    planning hassle!</span>
                <span
                    class="block font-sans font-bold text-4xl md:text-6xl text-left underline decoration-[#FFC72A] decoration-4 underline-offset-2">Course
                    Finder</span>
            </div>

            <div class="h-full flex flex-col text-center md:text-left mt-4 md:mt-0">
                <ul class="list-disc list-inside flex flex-col">
                    <li class="font-sans font-bold text-lg md:text-2xl">Add your courses</li>
                    <li class="font-sans font-bold text-lg md:text-2xl">Click Generate</li>
                    <li class="font-sans font-bold text-lg md:text-2xl">See all the courses you can take!</li>
                </ul>
                <a href="/src/course_finder.php"
                    class="self-center group bg-[#FFC72A] text-lg text-black font-bold mt-6 py-2 px-4 rounded">
                    Get Started Today!
                    <span
                        class="block max-w-0 group-hover:max-w-full transition-all duration-300 h-1 bg-[#C20430]"></span>
                </a>
            </div>
        </div>
    </content>

    <!-- Contact Section-->
    <section class="contact h-screen flex items-center bg-black/60 backdrop-blur-sm">
        <div class="max-w-md mx-auto rounded-lg p-8 m-16">
            <h3 class="text-2xl font-semibold text-white mb-4">Have a question? Contact Us</h3>
            <form action="https://formspree.io/f/meqnpqdw" method="POST" id="contactForm">
                <div class="mb-4">
                    <label for="name" class="block text-white text-sm font-medium mb-2">Name</label>
                    <input type="text" id="name" name="name"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-[#FFC72A]" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-white text-sm font-medium mb-2">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-[#FFC72A]" required>
                </div>
                <div class="mb-6">
                    <label for="message" class="block text-white text-sm font-medium mb-2">Message</label>
                    <textarea id="message" name="message" rows="4"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-[#FFC72A]"
                        required></textarea>
                </div>
                <div class="flex items-center justify-center">
                    <button type="submit" id="submitButton"
                        class="bg-[#FFC72A] py-2 px-6 font-bold rounded-md group transition duration-300">Submit
                        <span
                            class="block max-w-0 group-hover:max-w-full transition-all duration-300 h-1 bg-[#C20430]"></span>
                    </button>
                </div>

            </form>
        </div>
    </section>

    <!-- Footer Section -->
    <section class="footer w-full">
        <footer class="bg-black text-white py-6 text-center">
            <div class="container mx-auto">
                <p>&copy; CIS 3760 Group 303</p>
            </div>
        </footer>
    </section>
</div>


</section>
</body>

</html>