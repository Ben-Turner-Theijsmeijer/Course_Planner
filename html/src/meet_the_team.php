<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Selector</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-black">
    <!-- Header -->
    <div class="flex flex-col w-screen h-full bg-hero bg-no-repeat bg-cover bg-top bg-[url('../imgs/background.png')]">
        <header class="bg-black w-screen">
            <div class="flex flex-row">
                <div class="flex flex-row w-1/2 bg-black h-20 items-center py-6 px-10">
                    <a href="../index.php">
                        <span
                            class="font-sans font-bold text-white text-4xl leading-10 underline decoration-yellow-400 decoration-4 underline-offset-4">Course
                            Selector</span>
                    </a>
                </div>
                <div class="flex gap-x-6 flex-row-reverse w-1/2 bg-black h-20 items-center py-6 px-10">
                    <a href="meet_the_team.php"
                        class="group font-sans font-bold text-white text-2xl transition duration-300">
                        Meet The Team
                        <span
                            class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-1 bg-yellow-400"></span>
                    </a>

                    <a href="about.php" class="group font-sans font-bold text-white text-2xl transition duration-300">
                        About
                        <span
                            class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-1 bg-yellow-400"></span>
                    </a>

                </div>
            </div>
        </header>
        <content
            class="flex w-fill h-screen flex-col mx-10 my-10 px-10 py-10 bg-hero bg-black bg-opacity-50 bg-no-repeat bg-cover bg-center bg-fixed rounded-md mb-80">
            <span
                class="font-sans font-bold text-white text-center text-4xl underline decoration-[#FFC72A] decoration-4 underline-offset-4 mb-8">Meet
                The Team</span>
            <div class="flex w-fill h-full flex-wrap justify-center">

                <div class="p-4 max-w-md max-h-md">
                    <div class="flex rounded-lg h-full bg-[#C20430] bg-opacity-75 p-8 flex-col">
                        <div class="flex items-center flex-col">
                            <h2 class="font-sans font-bold text-white text-2xl mb-4">Andrew Chow</h2>
                            <div class="rounded-full w-24 h-24 overflow-hidden mb-4">
                                <img src="../imgs/profiles/andrew_profile.png" alt="Andrew's Profile Picture"
                                    class="w-full h-full object-cover" />
                            </div>
                        </div>
                        <div class="flex flex-col justify-between flex-grow">
                            <p class="leading-relaxed text-base text-white mb-4">
                                👋 Hello! I'm Andrew, a 4th-year Software Engineering student at the University of
                                Guelph.
                                My interests include software development and product management. During my free time, I
                                enjoy going to the gym 🏋️ and capturing moments with my camera 📷
                            </p>
                            <a href="/src/members/andrew/andrew.php">
                                <button class="group font-sans font-bold text-white text-2xl transition duration-300">
                                    Learn More
                                    <div
                                        class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-1 bg-[#FFC72A]">
                                    </div>
                                </button>
                            </a>

                        </div>
                    </div>
                </div>

                <div class="p-4 max-w-md max-h-md">
                    <div class="flex rounded-lg h-full bg-[#C20430] bg-opacity-75 p-8 flex-col">
                        <div class="flex items-center flex-col">
                            <h2 class="font-sans font-bold text-white text-2xl mb-4">Ben Turner-Theijsmeijer</h2>
                            <div class="rounded-full w-24 h-24 overflow-hidden mb-4">
                                <img src="../imgs/profiles/ben_profile.JPG" alt="Ben's Profile Picture"
                                    class="w-full h-full object-cover" />
                            </div>
                        </div>
                        <div class="flex flex-col justify-between flex-grow">
                            <p class="leading-relaxed text-base text-white mb-4">
                                Hello World! My name is Ben, Like several of my groupmates I am a 4th-year Software Engineering
                                student at the University of Guelph. 
                                <br>
                                Accademically I find programming intriguing and fufilling but feel little to no interest in it outside of work/school 
                                as I like to think of my profession and life as two separate aspects that don't overlap.
                                In my free time I much pefer to spend my time outdoors, playing sports, 
                                <a class="text-blue-500 font-bold" target="_blank"
                                    href="https://www.instagram.com/phen.ori/">Working on my latest art project</a>
                                , and spending time with my friends.
                                
                            </p>
                            <a href="/src/members/ben/ben.php">
                                <button class="group font-sans font-bold text-white text-2xl transition duration-300">
                                    Learn More
                                    <div
                                        class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-1 bg-[#FFC72A]">
                                    </div>
                                </button>
                            </a>

                        </div>
                    </div>
                </div>

                <div class="p-4 max-w-md max-h-md">
                    <div class="flex rounded-lg h-full bg-[#C20430] bg-opacity-75 p-8 flex-col">
                        <div class="flex items-center flex-col">
                            <h2 class="font-sans font-bold text-white text-2xl mb-4">Darren</h2>
                            <div class="rounded-full w-24 h-24 overflow-hidden mb-4">
                                <img src="https://placehold.co/400" alt="Darren's Profile Picture"
                                    class="w-full h-full object-cover" />
                            </div>
                        </div>
                        <div class="flex flex-col justify-between flex-grow">
                            <p class="leading-relaxed text-base text-white mb-4">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                mollit anim id est laborum.
                            </p>
                            <a href="/src/members/darren/darren.php">
                                <button class="group font-sans font-bold text-white text-2xl transition duration-300">
                                    Learn More
                                    <div
                                        class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-1 bg-[#FFC72A]">
                                    </div>
                                </button>
                            </a>

                        </div>
                    </div>
                </div>

                <div class="p-4 max-w-md max-h-md">
                    <div class="flex rounded-lg h-full bg-[#C20430] bg-opacity-75 p-8 flex-col">
                        <div class="flex items-center flex-col">
                            <h2 class="font-sans font-bold text-white text-2xl mb-4">Ethan</h2>
                            <div class="rounded-full w-24 h-24 overflow-hidden mb-4">
                                <img src="https://placehold.co/400" alt="Ethan's Profile Picture"
                                    class="w-full h-full object-cover" />
                            </div>
                        </div>
                        <div class="flex flex-col justify-between flex-grow">
                            <p class="leading-relaxed text-base text-white mb-4">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                mollit anim id est laborum.
                            </p>
                            <a href="/src/members/ethan/ethan.php">
                                <button class="group font-sans font-bold text-white text-2xl transition duration-300">
                                    Learn More
                                    <div
                                        class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-1 bg-[#FFC72A]">
                                    </div>
                                </button>
                            </a>

                        </div>
                    </div>
                </div>

                <div class="p-4 max-w-md max-h-md">
                    <div class="flex rounded-lg h-full bg-[#C20430] bg-opacity-75 p-8 flex-col">
                        <div class="flex items-center flex-col">
                            <h2 class="font-sans font-bold text-white text-2xl mb-4">Nour</h2>
                            <div class="rounded-full w-24 h-24 overflow-hidden mb-4">
                                <img src="https://placehold.co/400" alt="Nour's Profile Picture"
                                    class="w-full h-full object-cover" />
                            </div>
                        </div>
                        <div class="flex flex-col justify-between flex-grow">
                            <p class="leading-relaxed text-base text-white mb-4">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                mollit anim id est laborum.
                            </p>
                            <a href="/src/members/nour/nour.php">
                                <button class="group font-sans font-bold text-white text-2xl transition duration-300">
                                    Learn More
                                    <div
                                        class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-1 bg-[#FFC72A]">
                                    </div>
                                </button>
                            </a>

                        </div>
                    </div>
                </div>

                <div class="p-4 max-w-md max-h-md">
                    <div class="flex rounded-lg h-full bg-[#C20430] bg-opacity-75 p-8 flex-col">
                        <div class="flex items-center flex-col">
                            <h2 class="font-sans font-bold text-white text-2xl mb-4">Quinn</h2>
                            <div class="rounded-full w-24 h-24 overflow-hidden mb-4">
                                <img src="../imgs/profiles/quinn_profile.jpg" alt="Quinn's Profile Picture"
                                    class="w-full h-full object-cover" />
                            </div>
                        </div>
                        <div class="flex flex-col justify-between flex-grow">
                            <p class="leading-relaxed text-base text-white mb-4">
                                Hello everyone! I'm Quinn, a 4th-year Computer Science student at the University of
                                Guelph.
                                I love learning how things work, and computers are no exception. I seek to study and
                                understand the
                                mathematics and low-level operations behind computation. Recently, I've become
                                fascinated by the
                                Transformer machine learning model, and you can see my very basic implementation
                                <a class="text-blue-500 font-bold" target="_blank"
                                    href="https://colab.research.google.com/drive/19j5w9zTgfO2KFeFYMnf_9azkbsN7dM8-?usp=sharing">here</a>.
                                In my free time, you can find me experimenting with synthesizers and painting
                                miniatures.
                            </p>
                            <a href="/src/members/quinn/quinn.php">
                                <button class="group font-sans font-bold text-white text-2xl transition duration-300">
                                    Learn More
                                    <div
                                        class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-1 bg-[#FFC72A]">
                                    </div>
                                </button>
                            </a>

                        </div>
                    </div>
                </div>

                <div class="p-4 max-w-md max-h-md">
                    <div class="flex rounded-lg h-full bg-[#C20430] bg-opacity-75 p-8 flex-col">
                        <div class="flex items-center flex-col">
                            <h2 class="font-sans font-bold text-white text-2xl mb-4">Vrushang</h2>
                            <div class="rounded-full w-24 h-24 overflow-hidden mb-4">
                                <img src="https://placehold.co/400" alt="Vrushang's Profile Picture"
                                    class="w-full h-full object-cover" />
                            </div>
                        </div>
                        <div class="flex flex-col justify-between flex-grow">
                            <p class="leading-relaxed text-base text-white mb-4">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                mollit anim id est laborum.
                            </p>
                            <a href="/src/members/vrushang/vrushang.php">
                                <button class="group font-sans font-bold text-white text-2xl transition duration-300">
                                    Learn More
                                    <div
                                        class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-1 bg-[#FFC72A]">
                                    </div>
                                </button>
                            </a>

                        </div>
                    </div>
                </div>

            </div>
        </content>
    </div>
    <section class="footer">
        <footer class="fixed bottom-0 w-full bg-black text-white py-6">
            <div class="container mx-auto text-center">
                <p>&copy; CIS 3760 Group 11</p>
            </div>
        </footer>
    </section>
</body>

</html>