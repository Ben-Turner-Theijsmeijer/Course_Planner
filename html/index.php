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

<!-- Header -->
<header class="bg-black w-screen">
    <div class="flex flex-row">
        <div class="flex flex-row w-1/2 bg-black h-20 items-center py-6 px-10">
            <span
                class="font-sans font-bold text-white text-4xl leading-10 underline decoration-yellow-400 decoration-4 underline-offset-4">Course
                Selector</span>
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

<!-- Content  -->
<section class="content">

    <body class="min-h-screen">

        <!-- Content  -->
        <section class="content">

            <body>
                <h1 class="text-3xl font-bold text-black">
                    Main Content Page
                </h1>

            </body>
        </section>



        <p><a href="/excel/course_selection_tool.xlsm" download="course_selection.xlsm">DOWNLOAD EXCEL FILE</p>

</section>
<!-- Contact Section-->
<section class="contact">
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-8">
        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Have a question? Contact Us</h3>
        <form action="https://formspree.io/f/meqnpqdw" method="POST" id="contactForm">
            <div class="mb-4">
                <label for="name" class="block text-gray-600 text-sm font-medium mb-2">Name</label>
                <input type="text" id="name" name="name"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-400" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-600 text-sm font-medium mb-2">Email</label>
                <input type="email" id="email" name="email"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-400" required>
            </div>
            <div class="mb-6">
                <label for="message" class="block text-gray-600 text-sm font-medium mb-2">Message</label>
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

<!-- Footer Section -->
<section class="footer">
    <footer class="fixed bottom-0 w-full bg-black text-white py-6">
        <div class="container mx-auto text-center">
            <p>&copy; CIS 3760 Group 11</p>
        </div>
    </footer>
</section>
</body>

</html>