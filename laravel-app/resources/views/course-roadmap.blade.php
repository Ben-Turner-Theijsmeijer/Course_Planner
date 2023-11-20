<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Course Roadmap</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="manifest" href="{{asset('manifest.json')}}">
    <link rel="icon" href="{{asset('img/favicon.webp')}}" type="image/webp" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/vis-network/standalone/umd/vis-network.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{asset('js/scripts.js')}}"></script>
    <script src="{{asset('js/course-finder.js')}}"></script>
</head>

<!-- Include the navigation bar -->
@include('components.navbar')

<!-- Body Section -->

<body class="bg-gray-100">

    <div class="container mx-auto mt-8 p-8 bg-white shadow-lg rounded-lg h-full">

        <h1 class="text-3xl font-bold mb-6">Course Roadmap</h1>

        <div class="flex items-center mb-4">
            <label for="subjectText" class="mr-2 text-gray-600">Subject:</label>
            <input type="text" id="subjectText" class="p-2 border-2 border-gray-300 rounded-md" placeholder="Enter a Subject">
            <button id="generateRoadmapBtn" class="ml-2 py-2 btn bg-green-500 text-white p-2 rounded-lg transition duration-300 hover:bg-green-600">
                Visualize Department Courses
            </button>
            <button id="resetRoadmapBtn" class="ml-2 py-2 btn bg-red-500 text-white p-2 rounded-lg transition duration-300 hover:bg-red-600">
                Reset
            </button>


            <div class="ml-2 ml-auto flex items-center">
                <span class="text-gray-600 mr-2">Show Arrows</span>
                <div id="toggleArrowsBtn" class="cursor-pointer">
                    <i id="toggleIcon" class="fas fa-toggle-off text-gray-500 text-4xl"></i>
                </div>
            </div>
        </div>

        <!-- Roadmap Section -->
        <div class="mt-4 border-2 border-gray-300 p-4 h-full">
            <div id="subject-roadmap" class="w-full h-screen">
            </div>
        </div>

    </div>
</body>






</html>