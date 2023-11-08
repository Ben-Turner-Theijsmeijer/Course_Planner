<nav class="bg-black p-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="/">
            <span
                class="font-sans font-bold text-white md:text-4xl text-2xl leading-10 underline decoration-[#FFC72A] hover:decoration-[#C20430] transition-all duration-300 decoration-4 underline-offset-4">CIS
                3760 Group 303</span>
        </a>
        <div class="hidden md:flex space-x-6 text-xl">
            <a href="/src/api_documentation.php"
                class="group font-sans font-bold text-white text-2xl transition duration-300">
                API Docs
                <span class="block max-w-0 group-hover:max-w-full transition-all duration-300 h-1 bg-[#FFC72A]"></span>
            </a>
            <a href="/src/course_finder.php"
                class="group font-sans font-bold text-white text-2xl transition duration-300">
                Course Finder
                <span class="block max-w-0 group-hover:max-w-full transition-all duration-300 h-1 bg-[#FFC72A]"></span>
            </a>
            <a href="/src/meet_the_team.php"
                class="group font-sans font-bold text-white text-2xl transition duration-300">
                About
                <span class="block max-w-0 group-hover:max-w-full transition-all duration-300 h-1 bg-[#FFC72A]"></span>
            </a>
        </div>
        <div class="md:hidden">
            <button id="mobile-menu-button" class="text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>
</nav>
<div id="mobile-menu"
    class="hidden md:hidden fixed top-0 left-0 w-full h-full bg-black text-white z-50 overflow-y-auto">
    <div class="flex flex-col items-center justify-center h-full">
        <button id="close-mobile-menu" class="text-white absolute top-4 right-4 text-3xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <a href="/src/api_documentation.php" class="text-white text-2xl mb-4">API Docs</a>
        <a href="/src/course_finder.php" class="text-white text-2xl mb-4">Course Finder</a>
        <a href="/src/meet_the_team.php" class="text-white text-2xl mb-4">About</a>
    </div>
</div>