<!DOCTYPE html>
<html>
<!-- Head Section -->

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>API Access</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="src/js/scripts.js"></script>
    <script src="./js/api.js"></script>

    <link rel="icon" href="../src/favicon/favicon.png" type="image/png" />

</head>


<!-- PHP SECTION -->
<?php
$env = parse_ini_file(__DIR__ . '/../.env');
echo ('<span class="hidden" id="serverRoot">' . $env['root'] . '</span>');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //If Hard Reset
    if (isset($_POST['reset'])) {
        echo ("<script>console.log('PHP: TEST');</script> ");
        //Drop tables.
        include __DIR__ . '/database/droptables.php';
        $command = " mysql --user='cis3760' --password='AmountDirestPropel' < database/config.sql";
        $output = shell_exec($command . " 2>&1");
        echo ("<script>console.log('PHP: " . $output . "');</script> ");
        include __DIR__ . '/database/import.php';
    }
}
?>


<!-- BODY SECTION -->

<body class="bg-black bg-no-repeat bg-cover bg-top bg-[url('../imgs/background.png')]">
    <!-- Header -->
    <?php
    require_once(__DIR__ . '/components/navbar.php');
    echo generateNav('content');
    ?>

    <!-- spacer after header to give content space -->
    <div class="p-1">
    </div>

    <!-- Main Content Section -->
    <content class="flex w-auto flex-col md:my-20 md:mx-10 md:p-10 bg-hero box-content bg-black/60 backdrop-blur-sm bg-no-repeat bg-cover bg-center bg-fixed md:rounded-md">
        <section class="content">
            <div class="container mx-auto py-8">
                <div class="mb-8">

                    <!-- box header section -->
                    <div class="flex justify-between w-full">
                        <h2 class="text-4xl underline decoration-[#FFC72A] text-white font-bold mb-4">API Info</h2>
                        
                        <!-- SQL Database Reset section -->
                        <form action="" method="POST" id="">
                            <input type="submit" name="reset" value="Hard Reset Database" onclick="return confirm('Are you sure you want to reset the database?');" class="cursor-pointer button border border-[#FFC72A] hover:border-[#C20430] transition duration-300 hover:bg-[#C20430] text-white  px-8 py-2 mb-2 rounded-md font-bold" />
                        </form>
                    </div>

                    <!-- box content section -->
                    <div class="flex flex-col gap-14 md:flex-row">

                        <!-- course Table API commands section -->
                        <div class="w-full md:w-1/2 text-xl pt-14 text-center">
                            <!-- command selection & submission section -->
                            <h3 class="text-2xl font-semibold underline decoration-[#C20430] whitespace-nowrap text-white mb-4">API Commands for Courses Table</h3>
                            <select name="method" id="method" class="rounded px-2 py-1 mb-4 border border-gray-400" required>
                                <option value="" disabled selected>Request Method</option>
                                <option value="GET">GET</option>
                                <option value="PUT">PUT</option>
                                <option value="POST">POST</option>
                                <option value="DELETE">DELETE</option>
                            </select>

                            <!-- command textbox -->
                            <div class="mb-4 ">
                                <label for="command" class="block text-white text-sm font-medium mb-2">Course Name</label>
                                <input type="text" id="command" name="command" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-[#FFC72A]" required />
                            </div>

                            <!-- submit button -->
                            <button id="sendRequest" name="sendRequest" class="bg-[#FFC72A] py-2 px-10 mt-2 font-bold rounded-md group transition duration-300">
                                Submit
                                <span class="block max-w-0 group-hover:max-w-full transition-all duration-300 h-1 bg-[#C20430]"></span>
                            </button>
                        </div>

                        <!-- Student Table API commands section -->
                        <div class="w-full md:w-1/2 text-xl pt-14 text-center">
                            <!-- student command selection & submission section -->
                            <h3 class="text-2xl font-semibold underline decoration-[#C20430] text-white mb-4">API Commands for Student Table</h3>
                            <select name="requestType" id="requestType" class="rounded px-2 py-1 mb-4 border border-gray-400" required>
                                <option value="" disabled selected>Request Method</option>
                                <option value="GET">GET</option>
                                <option value="PUT">PUT</option>
                                <option value="POST">POST</option>
                                <option value="DELETE">DELETE</option>
                            </select>

                            <!-- student command textbox -->
                            <div class="mb-4 ">
                                <label for="command" class="block text-white text-sm font-medium mb-2">Course
                                    Name</label>
                                <input type="text" id="command1" name="command1" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-[#FFC72A]" required />
                            </div>

                            <!-- Student PUT-specific textbox -->
                            <div class="mb-4 " id="textbox" style="display: none;">
                                <label for="command" class="block text-white text-sm font-medium mb-2">Grade</label>
                                <input type="text" id="grade" name="grade" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-[#FFC72A]" required />
                            </div>

                            <!-- student submit button -->
                            <button id="StudentRequest" name="StudentRequest" class="bg-[#FFC72A] py-2 px-10 mt-2 font-bold rounded-md group transition duration-300">
                                Submit
                                <span class="block max-w-0 group-hover:max-w-full transition-all duration-300 h-1 bg-[#C20430]"></span>
                            </button>

                        </div>

                        <!-- Subject API commands section -->
                        <div class="w-full md:w-1/2 text-xl pt-14 text-center">
                            <!-- student command selection & submission section -->
                            <h3 class="text-2xl font-semibold underline decoration-[#C20430] text-white mb-4">API Commands for Subjects</h3>
                            <select name="endpointType" id="endpointType" class="rounded px-2 py-1 mb-4 border border-gray-400" selected="All" required>
                                <option value="" disabled selected>Endpoint</option>
                                <option value="Specific">Specific</option>
                                <option value="All">All</option>
                            </select>

                            <!-- Subject specific textbox -->
                            <div class="mb-4 " id="subjectCodeBox" style="display: none;">
                                <label for="command" class="block text-white text-sm font-medium mb-2">Subject Code</label>
                                <input type="text" id="subjectCode" name="subjectCode" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-[#FFC72A]" required />
                            </div>

                            <!-- student submit button -->
                            <button id="SubjectRequest" name="SubjectRequest" class="bg-[#FFC72A] py-2 px-10 mt-2 font-bold rounded-md group transition duration-300">
                                Submit
                                <span class="block max-w-0 group-hover:max-w-full transition-all duration-300 h-1 bg-[#C20430]"></span>
                            </button>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Outputed results section -->
            <div>
                <h3 class="text-3xl text-white font-semibold mb-4">Output</h3>
                <!-- output placeholder -->
                <p class="text-white mb-4" id="results" name="results">output will be displayed here</p>
            </div>

        </section>
    </content>

    <!-- yml file download section -->
    <div class="flex w-auto flex-col mx-72 bg-hero box-content bg-black/60 backdrop-blur-sm bg-no-repeat bg-cover md:rounded-md">
        <div class="w-full mx-auto md:pl-8 text-xl pt-14 text-center">
            <h2 class="text-3xl underline decoration-[#FFC72A] text-white font-bold">Learn More</h2>
            <p class="text-white mb-4">
                <br />
                Want to take a Look under the hood? Download our api.yml file.
            </p>
            <div class="pt-2">
                <a href="../api.yml" download class="bg-[#FFC72A] hover:bg-[#C20430] transition duration-300 text-black w-1/6 px-7 py-2 mt-4 mb-2 rounded font-bold">Download
                    api.yml</a>
            </div>

            <p class="text-white mb-4">
                <br />
                This yml file contains all the up to date information regarding our API based on the OpenAPI V3
                specification.
            </p>

        </div>
    </div> 

    <!-- spacer to give footer room at botom of page -->
    <div class="flex my-auto mx-auto text-center mt-8 p-10">
    </div>

    <!-- Footer Section -->
    <section class="footer absolute w-full mt-auto">
        <footer class="bg-black text-white py-6">
            <div class="container mx-auto text-center">
                <p>&copy; CIS 3760 Group 11</p>
            </div>
        </footer>
    </section>
</body>
</html>