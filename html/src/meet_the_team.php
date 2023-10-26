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
    <link rel="icon" href="../src/favicon/favicon.png" type="image/png">
</head>

<body class="bg-black bg-no-repeat bg-cover bg-fixed bg-top bg-[url('../imgs/background.png')]">
    <!-- Header -->
    <div class="flex flex-col w-full h-full sticky top-0 z-30">
        <!-- Header -->
        <header class="bg-black w-full">
            <div class="flex flex-row relative">
                <div class="flex flex-row w-1/2 bg-black h-20 items-center py-6 px-10">
                    <a href="../index.php">
                        <span
                            class="font-sans font-bold text-white text-4xl leading-10 underline decoration-[#FFC72A] hover:decoration-[#C20430] transition-all duration-300 decoration-4 underline-offset-4">Course
                            Selector</span>
                    </a>
                </div>
                <div class="flex gap-x-6 flex-row-reverse w-1/2 bg-black h-20 items-center py-6 px-10">
                    <a href="meet_the_team.php"
                        class="group font-sans font-bold text-white text-xl transition duration-300">
                        Meet The Team
                        <span
                            class="block max-w-0 group-hover:max-w-full transition-all duration-300 h-1 bg-[#FFC72A]"></span>
                    </a>

                    <a href="how_it_works.php"
                        class="group font-sans font-bold text-white text-xl transition duration-300">
                        How It Works
                        <span
                            class="block max-w-0 group-hover:max-w-full transition-all duration-300 h-1 bg-[#FFC72A]"></span>
                    </a>

                    <a href="api_access.php"
                        class="group font-sans font-bold text-white text-xl transition duration-300">
                        API Access
                        <span
                            class="block max-w-0 group-hover:max-w-full transition-all duration-300 h-1 bg-[#FFC72A]"></span>
                    </a>

                    <a href="api_documentation.html"
                        class="group font-sans font-bold text-white text-xl transition duration-300">
                        API Documentation
                        <span
                            class="block max-w-0 group-hover:max-w-full transition-all duration-300 h-1 bg-[#FFC72A]"></span>
                    </a>
                </div>

                <div class="h-4 w-3/4 bg-[#C20430] absolute -bottom-6"></div>
                <div class="h-4 w-1/3 bg-[#FFC72A] absolute -bottom-12"></div>
            </div>
        </header>

    </div>
    <content
        class="flex w-auto flex-col md:my-20 md:mx-10 md:p-10 bg-hero box-content bg-black/60 backdrop-blur-sm bg-no-repeat bg-cover bg-center bg-fixed md:rounded-md">
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
                            Hello World! My name is Ben, Like several of my groupmates I am a 4th-year Software
                            Engineering
                            student at the University of Guelph.
                            <br>
                            Accademically I find programming intriguing and fufilling but feel little to no interest in
                            it outside of work/school
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
                            <img src="../imgs/profiles/darren_profile.jpg" alt="Darren's Profile Picture"
                                class="w-full h-full object-cover" />
                        </div>
                    </div>
                    <div class="flex flex-col justify-between flex-grow">
                        <p class="leading-relaxed text-base text-white mb-4">
                            Howdy! I'm Darren. I really did just say howdy.. Everyone else was saying hello so I had to
                            switch it up! I'm and Xth-year(lost track) Computer Science student at the University of
                            Guelph. I work at the IT Help desk in my spare time, so come by if you need any help!
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
                            <img src="../imgs/profiles/ethan_profile.jpg" alt="Ethan's Profile Picture"
                                class="w-full h-full object-cover" />
                        </div>
                    </div>
                    <div class="flex flex-col justify-between flex-grow">
                        <p class="leading-relaxed text-base text-white mb-4">
                            Hey there! I'm Ethan, a 4th-year Computer Science student at the University of Guelph. While
                            I'm passionate about coding and the world of technology, I believe in finding a balance
                            between work and play. When I'm not diving into lines of code or solving complex algorithms,
                            you can catch me exploring the great outdoors and hiking through scenic trails.
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
                        <h2 class="font-sans font-bold text-white text-2xl mb-4">Noureldeen</h2>
                        <div class="rounded-full w-24 h-24 overflow-hidden mb-4">
                            <img src="../imgs/profiles/nour_profile.jpg" alt="Nour's Profile Picture"
                                class="w-full h-full object-cover" />
                        </div>
                    </div>
                    <div class="flex flex-col justify-between flex-grow">
                        <p class="leading-relaxed text-base text-white mb-4">
                            Hi! I'm Noureldeen Ahmed, a 4th-year Software Engineering student at the University of
                            Guelph. I'm passionate about building projects and connecting things that work. Checkout my
                            script where I made an emotional seminment analysis app!
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
                            <img src="../imgs/profiles/vrushang_profile.jpg" alt="Vrushang's Profile Picture"
                                class="w-full h-full object-cover" />
                        </div>
                    </div>
                    <div class="flex flex-col justify-between flex-grow">
                        <p class="leading-relaxed text-base text-white mb-4">
                            Hi everyone, I'm Vrushang, I'm a 5th-year Computer Science student at the University
                            of Guelph. In my free time I enjoy playing video games or learning about technologies
                            I'm not familiar with. In addition to coding and gaming, I have an interest in staying
                            updated on the latest tech trends, attending hackathons, and exploring indie
                            projects.
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
    <section class="footer">
        <footer class="w-full bg-black text-white py-6">
            <div class="container mx-auto text-center">
                <p>&copy; CIS 3760 Group 11</p>
            </div>
        </footer>
    </section>
</body>

</html>