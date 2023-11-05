<!DOCTYPE html>
<html>
<!-- Head Section -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>How It Works</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="src/js/scripts.js"></script>
    <link rel="icon" href="../src/favicon/favicon.png" type="image/png">
</head>

<!-- BODY SECTION -->

<body class="bg-black bg-no-repeat bg-cover bg-top bg-[url('../imgs/background.png')]">
    <!-- Header Section -->
    <?php
    require_once(__DIR__ . '/components/navbar.php');
    echo generateNav('content');
    ?>

    <!-- spacer after header to give content space -->
    <div class="mt-4 p-5">
    </div>

    <!-- Main Content Section -->
    <content
        class="flex w-auto flex-col md:my-20 md:mx-10 md:p-10 bg-hero box-content bg-black/60 backdrop-blur-sm bg-no-repeat bg-cover bg-center bg-fixed md:rounded-md">
        <section class="content">
            <div class="container mx-auto py-8">
                <div class="mb-8">
                    <h2 class="text-4xl underline decoration-[#FFC72A] text-white font-bold mb-4">About the Product</h2>
                    <div class="flex flex-col md:flex-row">
                        <div class="w-full md:w-1/2">
                            <img src="../imgs/product/calendar.jpg" alt="Calendar" class="rounded-lg shadow-lg mb-4">
                        </div>
                        <div class="w-full md:w-1/2 md:pl-8 text-xl">
                            <p class="text-white mb-4">
                                The Course Selector is an application that provides users an intuitive way to plan their
                                semester courses. Equipped with
                                a beautiful interface, users are able to access many of the valuable features the Course
                                Selector
                                offers.
                            </p>

                            <p class="text-white mb-8">
                                In just <strong> one </strong>step, users can enter their completed courses and semester
                                to
                                determine which courses
                                they would like to take in the future!
                            </p>

                            <h2 class="text-3xl text-[#FFC72A] mb-4"> What's Included </h2>

                            <ul class="list-disc text-white pl-4">
                                <li class="mb-2">Easy to use interface</li>
                                <li class="mb-2">Semester planning</li>
                                <li class="mb-2">Up-to-date Results</li>
                            </ul>

                        </div>
                    </div>
                </div>

                <div>
                    <h2 class="text-3xl underline decoration-[#C20430] text-white font-bold mb-4">How It Works</h2>
                    <div class="flex flex-col md:flex-row">
                        <div class="w-full md:w-1/2">
                            <img src="../imgs/product/product_one.png" alt="How It Works"
                                class="rounded-lg shadow-lg mb-4">
                        </div>
                        <div class="w-full md:w-1/2 md:pl-8 text-xl">
                            <h2 class="text-xl text-white underline decoration-[#C20430] font-semibold mb-2">Step One:
                            </h2>
                            <p class="text-white mb-4">
                                Enter all of the courses you have completed. Courses can either be written as their
                                course code
                                (CIS*1300) or by their course name (Programming).
                            </p>
                            <p class="text-white mb-4">
                                Next, click the <strong> Generate Output </strong> button and navigate to the <strong>
                                    output
                                </strong> sheet
                            </p>
                        </div>
                    </div>

                    <h2 class="text-3xl underline decoration-[#C20430] text-white font-bold mb-4 mt-4">Result</h2>
                    <div class="flex flex-col md:flex-row mt-8">
                        <div class="w-full md:w-1/2">
                            <img src="../imgs/product/product_two.png" alt="How It Works"
                                class="rounded-lg shadow-lg mb-4">
                        </div>
                        <div class="w-full md:w-1/2 md:pl-8 text-xl">
                            <h2 class="text-xl underline decoration-[#C20430] text-white font-semibold mb-2">Possible
                                Future Courses</h2>
                            <p class="text-white">
                                This section includes all of the courses that you may take in the future based on the
                                courses
                                you have
                                completed in the past.
                            </p>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row mt-8">
                        <div class="w-full md:w-1/2">
                            <img src="../imgs/product/product_three.png" alt="How It Works"
                                class="rounded-lg shadow-lg mb-4">
                        </div>
                        <div class="w-full md:w-1/2 md:pl-8 text-xl">
                            <h2 class="text-xl underline decoration-[#C20430] text-white font-semibold mb-2">Next
                                Semester Courses</h2>
                            <p class="text-white">
                                Similarly, these are the courses you can take next semester, depending on the semester
                                you have
                                inserted in step one.
                            </p>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row mt-8">
                        <div class="w-full md:w-1/2">
                            <img src="../imgs/product/product_four.png" alt="How It Works"
                                class="rounded-lg shadow-lg mb-4">
                        </div>
                        <div class="w-full md:w-1/2 md:pl-8 text-xl">
                            <h2 class="text-xl underline decoration-[#C20430] text-white font-semibold mb-2">Courses
                                Without Prerequisites</h2>
                            <p class="text-white">
                                Lastly, these are the courses that do not have any prerequisites, which are great
                                for students who need electives, or are looking to complete an area of
                                application/minor.
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