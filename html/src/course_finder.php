<!DOCTYPE html>
<html>
<!-- Head Section -->

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>API Documentation</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://unpkg.com/swagger-ui-dist@3/swagger-ui-bundle.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> <!-- Axios -->
  <script src="./js/course-finder.js"></script>
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/swagger-ui-dist@3/swagger-ui.css" />
  <!-- Accordion https://www.w3schools.com/howto/howto_js_accordion.asp-->
</head>

<!-- Header -->

<?php
require_once(__DIR__ . '/components/navbar.php');
echo generateNav('content');
?>



<body class="bg-gray-100 py-8 pt-36">
  <div class="container mx-auto p-4 bg-white shadow-lg rounded-lg">
    <h1 class="text-2xl font-bold mb-4">Course Schedule</h1>
    <form id="course-form" class="flex mb-4">
      <input type="text" id="course-code" placeholder="Enter Course Code (i.e CIS*1300 or CIS1300)"
        class="w-1/3 p-2 rounded-lg border border-gray-300 mr-4" />
      <button type="button" id="add-course" class="w-1/3 bg-blue-500 text-white p-2 rounded-lg ml-4">Add
        Course</button>
      <button type="button" id="generate-courses" class="w-1/3 bg-green-500 text-white p-2 rounded-lg ml-4">Generate
        Courses</button>
    </form>
    <table id="my-courses" class="w-full border-collapse ">
      <thead>
        <tr>
          <th class="px-6 py-3 text-left text-gray-600 border-b-2 border-gray-300">Course Code</th>
          <th class="px-6 py-3 text-left text-gray-600 border-b-2 border-gray-300">Course Name</th>
          <th class="px-6 py-3 text-left text-gray-600 border-b-2 border-gray-300">Credits</th>
          <th class="px-6 py-3 text-left text-gray-600 border-b-2 border-gray-300">Remove</th>
        </tr>
      </thead>
      <div class="flex justify-center borderpy-2 border-blue-300" id="credit_container">
        <h1 class="text-black px-2"> Total Credits: </h1>
        <p class="text-black px-2" id="credits_completed"></p>
      </div>
      <tbody>
        <!-- Courses are added here -->
        <tr class="hover:bg-gray-100" data-course-id="course-">
        </tr>
      </tbody>
    </table>

  </div>

  <!-- Courses a student is able to take -->
  <div class="container mx-auto p-4 bg-white shadow-lg rounded-lg mt-8">
    <h1 class="text-2xl font-bold mb-4">Available Courses</h1>
    <div class="grid grid-cols-3 gap-4">
      <div class="bg-blue-300 p-4 rounded-lg">
        <p class="text-xl font-semibold">CIS*1300</p>
        <p>Introduction to Programming</p>
        <p>Fall</p>
      </div>
      <div class="bg-blue-300 p-4 rounded-lg">
        <p class="text-xl font-semibold">CIS*1910</p>
        <p>Discrete Structures I</p>
        <p>Fall</p>
      </div>
      <div class="bg-blue-300 p-4 rounded-lg">
        <p class="text-xl font-semibold">CIS*2500</p>
        <p>Intermediate Programming</p>
        <p>Winter</p>
        <!-- <button class="accordion w-28 " >More Details</button>
          <div  class="panel" >
            <p> offered: Fall, Winter. Credits: 0.5</p>
          </div> -->
      </div>
    </div>
  </div>

  <div class="container mx-auto p-4 bg-white shadow-lg rounded-lg mt-8">
    <button class="accordion text-2xl font-bold mb-4 py-2">Courses with No Prerequisites</button>
    <div class="panel">
      <input type="text" id="course-filter" placeholder="Search Courses (i.e CIS)"
        class="mb-4 px-3 py-1 border rounded-md">
      <div id="no-prereq-courses" class="grid grid-cols-3 gap-4">
        <!-- No Prerequisite courses listed here -->
      </div>
    </div>
  </div>

</body>




</html>