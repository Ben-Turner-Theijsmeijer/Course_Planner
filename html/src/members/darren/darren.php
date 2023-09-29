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
<body class = "bg-gray-900 flex flex-col h-screen justify-between">
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
    <div class="flex flex-col w-screen h-full bg-hero bg-no-repeat bg-cover bg-top ">

        <!-- Opening message -->
        <section class="py-6">
            <div class="w-9/12 mx-auto rounded bg-neutral-100 p-6 font-serif text-center">
                <h2 class=" text-xl">Welcome to My PHP Page</h2> 
                <p class="text-base">This is to show a fun feature of php. PHP is a server sided programing language meaning everthing ran in PHP run on the sever (not locally) <br/>This is safe as vistors can not see or change PHP code. But what happen if I give the users access to run terminal commands.
                </br> Below you can enter BASH compands or run a program installed on the server and it'll output the output of the command  </p>
            </div> 
        </section>


        <!-- Contact Section-->
        <section class="contact  py-8 ">
            <div class="max-w-md mx-auto rounded-lg shadow-md p-8 mb-32 bg-orange-300">
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



    <!-- Footer Section -->
    <section class="footer bg-gray-900">
        <footer class="fixed bottom-0 absolute inset-x-0 w-full bg-black text-white py-6">
            <div class="container mx-auto text-center">
                <p>&copy; CIS 3760 Group 11</p>
            </div>
        </footer>
    </section>
</body>

</html>