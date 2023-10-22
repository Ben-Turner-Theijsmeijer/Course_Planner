<!DOCTYPE html>
<html>
<!-- Head Section -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>API Access</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="src/js/scripts.js"></script>
    <link rel="icon" href="../src/favicon/favicon.png" type="image/png">
</head>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //If Hard Reset
        if (isset($_POST['reset'])) {
            //Drop tables. 
            include 'database/droptable.php';
            $command = " mysql --user='cis3760' --password='AmountDirestPropel' < database/config.sql"
            $output = shell_exec($command);
            echo $output;
        }
        if (isset($_POST['sendRequest'])) {
            $url = $_POST['command'];
            $method = $_POST['method'];

            //Drop tables. 
            $_SERVER['REQUEST_METHOD'] = $method;
            header('Location: https://cis3760f23-11.socs.uoguelph.ca/api/v1/course/'. $url);
            die();
        }
  


?>
<!-- Header Section -->
    <body class="bg-black bg-no-repeat bg-cover bg-top bg-[url('../imgs/background.png')]">

        <header class="bg-black w-full top-0">
            <div class="flex flex-row relative">
                <div class="flex flex-row w-1/2 bg-black h-20 items-center py-6 px-10">
                    <a href="../index.php">
                        <span class="font-sans font-bold text-white text-4xl leading-10 underline decoration-[#FFC72A] hover:decoration-[#C20430] transition-all duration-300 decoration-4 underline-offset-4">
                            Course
                            Selector
                        </span>
                    </a>
                </div>
                <div class="flex gap-x-6 flex-row-reverse w-1/2 bg-black h-20 items-center py-6 px-10">
                    <a href="meet_the_team.php" class="group font-sans font-bold text-white text-2xl transition duration-300">
                        Meet The Team
                        <span class="block max-w-0 group-hover:max-w-full transition-all duration-300 h-1 bg-[#FFC72A]"></span>
                    </a>

                    <a href="how_it_works.php" class="group font-sans font-bold text-white text-2xl transition duration-300">
                        How It Works
                        <span class="block max-w-0 group-hover:max-w-full transition-all duration-300 h-1 bg-[#FFC72A]"></span>
                    </a>
                </div>
            </div>
        </header>

        <!-- Main Content Section -->
        <content class="flex w-auto flex-col md:my-20 md:mx-10 md:p-10 bg-hero box-content bg-black/60 backdrop-blur-sm bg-no-repeat bg-cover bg-center bg-fixed md:rounded-md">
            <section class="content">
                <div class="container mx-auto py-8">
                    <div class="mb-8">
                        <h2 class="text-4xl underline decoration-[#FFC72A] text-white font-bold mb-4">About the Product</h2>
                        <div class="flex flex-col md:flex-row">
                            <div class= " w-full md:w-1/2">

                                <div class="max-w-md mx-auto rounded-lg p-8 m-16">
                                    <h3 class="text-2xl font-semibold text-white mb-4">Enter and API Command</h3>
                                    <form action="" method="POST" id="contactForm">
                                        
                                        <div class="mb-4 ">
                                        <select name="method" id="method" class="rounded px-2 py-1 border border-gray-400" required>
                                            <option value="" disabled selected>Request Method</option>
                                            <option value="GET">GET</option>
                                            <option value="PUT">PUT</option>
                                            <option value="POST">POST</option>
                                            <option value="DELETE">DELETE</option>
                                        </select>
                                        </div>
                                        <div class="mb-4 ">
                                            <label for="command" class="block text-white text-sm font-medium mb-2">Command</label>
                                            <input type="text" id="command" name="command" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-[#FFC72A]" required>
                                        </div>
                                        
                                        <div class="flex items-center justify-center">
                                            <button type="submit" id="sendRequest" name="sendRequest" class="bg-[#FFC72A] py-2 px-6 font-bold rounded-md group transition duration-300">Submit
                                                <span class="block max-w-0 group-hover:max-w-full transition-all duration-300 h-1 bg-[#C20430]"></span>
                                            </button>
                                        </div>

                                    </form>
                                </div>

                            </div>
                            <div class="w-full md:w-1/2 md:pl-8 text-xl">
                                <!-- <h2 class="text-xl text-white underline decoration-[#C20430] font-semibold mb-2">Step One:</h2> -->
                                
                                <a href="../api.yml" download class="bg-[#FFC72A] rounded-sm py-1  font-bold p-3.5 group">Download api.yml file</a>
                                
                                <input type= "submit" name="reset" value="Hard Reset Database" class="button border border-[#FFC72A] hover:bg-[#FFC72A] text-black px-8 py-2 mt-4 mb-2 rounded font-bold">
                                        <p class="text-white mb-4">
                                    <br/>
                                    This yml file has all the upto date details about our API based on the OpenAPI V3 specification.
                                </p>
                                <p class="text-white mb-4">
                                    Next, click the <strong> Generate Output </strong> button and navigate to the <strong>
                                        output
                                    </strong> sheet
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </content>

        <div class="container mx-auto text-center mt-8">
            <h2 class="text-3xl underline decoration-[#C20430] text-white font-semibold mb-4">Get Started Today!</h2>
            <a href="/excel/course_selection_tool.xlsm"
               class="inline-block group bg-[#FFC72A] hover:bg-[#C20430] text-xl text-black font-bold py-3 px-6 rounded-lg transition duration-300 ease-in-out transform hover:scale-105 mb-12"
               download="course_selection.xlsm">
                Download
            </a>
        </div>


        <!-- Footer Section -->
        <section class="footer absolute w-full">
            <footer class=" bg-black text-white py-6">
                <div class="container mx-auto text-center">
                    <p>&copy; CIS 3760 Group 11</p>
                </div>
            </footer>
        </section>

    </body>

</html>