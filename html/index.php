<!DOCTYPE html>
<html>
<!-- Head Section -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="src/js/scripts.js"></script>
</head>

<!-- Header Section -->
<header class="bg-black w-full fixed top-0 z-30">
    <div class="flex flex-row relative">
        <div class="flex flex-row w-1/2 bg-black h-20 items-center py-6 px-10">
            <a href="index.php">
                <span class="font-sans font-bold text-white text-4xl leading-10 underline decoration-[#FFC72A] hover:decoration-[#C20430] transition-all duration-300 decoration-4 underline-offset-4">Course
                    Selector</span>
            </a>
        </div>
        <div class="flex gap-x-6 flex-row-reverse w-1/2 bg-black h-20 items-center py-6 px-10">
            <a href="src/meet_the_team.php" class="group font-sans font-bold text-white text-2xl transition duration-300">
                Meet The Team
                <span class="block max-w-0 group-hover:max-w-full transition-all duration-300 h-1 bg-[#FFC72A]"></span>
            </a>

            <a href="src/how_it_works.php" class="group font-sans font-bold text-white text-2xl transition duration-300">
                How It Works
                <span class="block max-w-0 group-hover:max-w-full transition-all duration-300 h-1 bg-[#FFC72A]"></span>
            </a>
        </div>
    </div>
    <div class="h-4 w-3/4 bg-[#C20430] absolute -bottom-6"></div>
    <div class="h-4 w-1/3 bg-[#FFC72A] absolute -bottom-12"></div>
</header>

<!-- Content Section -->
<div class="relative flex flex-col w-full h-full bg-no-repeat bg-cover bg-top bg-[url('imgs/background.png')]">
    <content class="flex items-center justify-center h-screen">
        <div class="py-[4rem] px-14 flex max-w-4xl gap-20 flex-col justify-between rounded-md backdrop-blur-sm bg-black/60 md:flex-row items-center">
            <div class="text-white w-1/2">
                <span class="block font-sans font-bold text-2xl text-left whitespace-nowrap">Forget about course
                    planning hassle!</span>
                <span class="block font-sans font-bold text-8xl text-left underline decoration-[#FFC72A] decoration-4 underline-offset-8">Course
                    Selector</span>
            </div>

            <div class="h-full flex flex-col text-white text-left">
                <ul class="list-disc list-inside flex flex-col">
                    <li class="font-sans font-bold text-xl">Add your courses</li>
                    <li class="font-sans font-bold text-xl whitespace-nowrap">Select your semester</li>
                    <li class="font-sans font-bold text-xl">Click Generate</li>
                    <li class="font-sans font-bold text-xl whitespace-nowrap">See all the courses you can
                        take!</li>
                </ul>
                <a href="/excel/course_selection_tool.xlsm" class="self-center group bg-[#FFC72A] text-xl text-black font-bold mt-6 py-2 px-4 rounded" download="course_selection.xlsm">
                    Download
                    <span class="block max-w-0 group-hover:max-w-full transition-all duration-300 h-1 bg-[#C20430]"></span>
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
                    <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-[#FFC72A]" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-white text-sm font-medium mb-2">Email</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-[#FFC72A]" required>
                </div>
                <div class="mb-6">
                    <label for="message" class="block text-white text-sm font-medium mb-2">Message</label>
                    <textarea id="message" name="message" rows="4" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-[#FFC72A]" required></textarea>
                </div>
                <div class="flex items-center justify-center">
                    <button type="submit" id="submitButton" class="bg-[#FFC72A] py-2 px-6 font-bold rounded-md group transition duration-300">Submit
                        <span class="block max-w-0 group-hover:max-w-full transition-all duration-300 h-1 bg-[#C20430]"></span>
                    </button>
                </div>

            </form>
        </div>
    </section>
    <!-- Footer Section -->
    <section class="footer absolute bottom-0 w-full">
        <footer class=" bg-black text-white py-6">
            <div class="container mx-auto text-center">
                <p>&copy; CIS 3760 Group 11</p>
            </div>
        </footer>
    </section>
</div>

</section>
</body>

</html>