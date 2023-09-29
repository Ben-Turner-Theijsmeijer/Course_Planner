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
    <script src="src/js/scripts.js"></script>
</head>

<!-- Header Section -->
<header class="bg-black w-screen">
    <div class="flex flex-row">
        <div class="flex flex-row w-1/2 bg-black h-20 items-center py-6 px-10">
            <a href="/">
                <span
                    class="font-sans font-bold text-white text-4xl leading-10 underline decoration-yellow-400 decoration-4 underline-offset-4">Course
                    Selector</span>
            </a>

        </div>
        <div class="flex gap-x-6 flex-row-reverse w-1/2 bg-black h-20 items-center py-6 px-10">
            <a href="src/meet_the_team.php"
                class="group font-sans font-bold text-white text-2xl transition duration-300">
                Meet The Team
                <span class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-1 bg-yellow-400"></span>
            </a>

            <a href="src/about.php" class="group font-sans font-bold text-white text-2xl transition duration-300">
                About
                <span class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-1 bg-yellow-400"></span>
            </a>

        </div>
    </div>
</header>

<!-- Content Section -->
<div class="flex flex-col w-screen h-full bg-hero bg-no-repeat bg-cover bg-top bg-[url('../imgs/background.png')]">
    <content
        class="flex items-center justify-center h-screen mx-20 my-20 bg-hero bg-black bg-opacity-50 bg-no-repeat bg-cover bg-center bg-fixed rounded-md backdrop-blur-sm">
        <div
            class="max-w-4xl mx-auto p-10 text-center flex flex-col md:flex-row items-center space-y-6 md:space-y-0 md:space-x-6">
            <div class="md:w-1/2 text-white p-4">
                <span class="block font-sans font-bold text-2xl text-left mb-4">Forget about your course
                    planning hassle!</span>
                <span
                    class="block font-sans font-bold text-5xl text-left underline decoration-[#FFC72A] decoration-4 underline-offset-2">Course
                    Selector</span>
            </div>

            <div class="md:w-1/2 text-white text-left">
                <ul class="list-disc list-inside flex flex-col">
                    <li class="font-sans font-bold text-2xl mb-2">Add your courses</li>
                    <li class="font-sans font-bold text-2xl mb-2">Select your semester</li>
                    <li class="font-sans font-bold text-2xl mb-2">Click Generate</li>
                    <li class="font-sans font-bold text-2xl mb-2 whitespace-nowrap">See all the courses you can
                        take!</li>
                </ul>
                <a href="/excel/course_selection_tool.xlsm" download="course_selection.xlsm">
                    <button class="bg-yellow-400 hover:bg-yellow-300 text-black font-bold mt-6 py-2 px-12 rounded">
                        Download
                    </button>
                </a>
            </div>
        </div>
    </content>
    <!-- Contact Section-->
    <section class="contact bg-black bg-opacity-20">
        <div class="max-w-md mx-auto rounded-lg shadow-md p-8 mb-32">
            <h3 class="text-2xl font-semibold text-white mb-4">Have a question? Contact Us</h3>
            <form action="https://formspree.io/f/meqnpqdw" method="POST" id="contactForm">
                <div class="mb-4">
                    <label for="name" class="block text-white text-sm font-medium mb-2">Name</label>
                    <input type="text" id="name" name="name"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-400" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-white text-sm font-medium mb-2">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-400" required>
                </div>
                <div class="mb-6">
                    <label for="message" class="block text-white text-sm font-medium mb-2">Message</label>
                    <textarea id="message" name="message" rows="4"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-400"
                        required></textarea>
                </div>
                <div class="flex items-center justify-center">
                    <button type="submit" id="submitButton"
                        class="bg-blue-500 text-white py-2 px-6 rounded-lg hover:bg-blue-600 transition duration-300">Submit</button>
                </div>

            </form>
        </div>
    </section>
</div>
</div>
</section>


<!-- Footer Section -->
<section class="footer">
    <footer class="w-full bg-black text-white py-6">
        <div class="container mx-auto text-center">
            <p>&copy; CIS 3760 Group 11</p>
        </div>
    </footer>
</section>
</body>

</html>