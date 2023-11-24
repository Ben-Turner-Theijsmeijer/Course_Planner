<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Course Roadmap</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="manifest" href="{{asset('manifest.json')}}">
    <link rel="icon" href="{{asset('img/favicon.webp')}}" type="image/webp" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/vis-network/standalone/umd/vis-network.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{asset('js/scripts.js')}}"></script>
    <script src="{{asset('js/course-roadmap.js')}}"></script>
</head>

<!-- Include the navigation bar -->
@include('components.navbar')

<!-- Body Section -->

<body class="bg-gray-100">

    <div class="container mx-auto mt-8 mb-8 p-4 md:p-8 bg-white shadow-lg rounded-lg">

        <!-- User Input Section -->
        <div class="relative inline-block">
            <h1 class="text-4xl md:text-4xl font-bold mb-4 md:mb-6">Course Roadmap
                <div class="tooltip inline-flex items-center text-gray-600 group">
                    <i class="md:text-2xl fas fa-info-circle ml-2"></i>
                    <div
                        class="md:text-xs tooltip-content opacity-0 bg-gray-800 text-white text-center p-2 rounded-md w-full md:w-48 absolute left-0 md:left-full bottom-[-1.5rem] transform -translate-y-full md:-translate-y-3/4 group-hover:opacity-100 transition-opacity">
                        <p class="text-xs md:text-sm">
                            Enter your subject code and click visualize!
                        </p>
                    </div>
                </div>
            </h1>
        </div>

        <!-- Button/Toggle section -->
        <div class="flex flex-col md:flex-row items-stretch mb-4">

            <label for="subjectText" class="mr-2 text-gray-600 mb-2 md:mb-0 font-bold pt-2">Subject:</label>
            <input type="text" id="subjectText" class="p-2 border-2 border-gray-300 rounded-md mb-2 md:mb-0"
                placeholder="Enter a Subject (i.e CIS)">

            <div class="flex">
                <button id="generateRoadmapBtn"
                    class="py-2 btn bg-green-500 text-white p-2 rounded-lg transition duration-300 hover:bg-green-600 ml-2 mr-2">
                    Visualize Department Courses
                </button>

                <button id="resetRoadmapBtn"
                    class="py-2 btn bg-yellow-500 text-white p-2 rounded-lg transition duration-300 hover:bg-yellow-600 mr-2">
                    Reset Arrows
                </button>

                <button id="clearRoadmapBtn"
                    class="py-2 btn bg-red-500 text-white p-2 rounded-lg transition duration-300 hover:bg-red-600">
                    Clear Roadmap
                </button>
            </div>

            <div class="ml-2 md:ml-auto flex items-center mt-4 md:mt-0">
                <span class="text-gray-600 mr-2">Show Arrows</span>
                <div id="toggleArrowsBtn"
                    class="cursor-pointer bg-gray-100 rounded-full p-2 transition duration-300 hover:bg-gray-200">
                    <i id="toggleIcon" class="fas fa-toggle-off text-gray-500 text-4xl md:text-4xl"></i>
                </div>
            </div>
        </div>


        <!-- Roadmap Section -->
        <div class="mt-4 border-2 border-gray-300 p-4 rounded-lg"
            style="background-color: rgb(226 232 240); box-shadow: inset 0 0 6px #B4B4EA;">
            <div id="subject-roadmap" class="w-full h-screen rounded-lg">
                <!-- SUBJECT ROADMAP HERE -->
            </div>
        </div>

        <!-- Legend Section -->
        <div class="mt-4 p-4 border-2 border-gray-300 rounded-lg">
            <h2 class="text-xl font-bold mb-2">Legend:</h2>
            <div class="flex items-center">
                <div class="w-4 h-4 bg-blue-500 mr-2 rounded-full"></div>
                <span>Blue Arrows: OR</span>
            </div>
            <div class="flex items-center mt-2">
                <div class="w-4 h-4 bg-red-500 mr-2 rounded-full"></div>
                <span>Red Arrows: AND</span>
            </div>
        </div>

        <div class="mt-4 p-4 border-2 border-gray-300 rounded-lg">
            <h2 class="text-xl font-bold mb-2">Selected Course Info:</h2>
            <div id="course-details">
                <p class="text-gray-400">Course information will appear here once a node has been selected</p>
                <!-- DISPLAY COURSE DETAILS HERE -->
            </div>
        </div>

    </div>

</body>

<!-- Footer Section -->
@include('components/footer')


</html>