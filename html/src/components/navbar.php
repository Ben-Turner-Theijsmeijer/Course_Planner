<?php
function generateNav($pageType, $name = 'Course Selector')
{
    if ($pageType === 'content') {
        $indexPrefix = '../';
        $pagesPrefix = '';
    } else if ($pageType === 'index') {
        $indexPrefix = '';
        $pagesPrefix = 'src/';
    } else {
        $indexPrefix = '../../../';
        $pagesPrefix = '../../';
    }
    $nav = sprintf('<header class="bg-black w-full fixed top-0 z-30">
    <div class="flex flex-row relative">
        <div class="flex flex-row w-1/3 bg-black h-20 items-center py-6 px-10">
            <a href="%sindex.php">
                <span
                    class="font-sans font-bold text-white text-4xl leading-10 underline decoration-[#FFC72A] hover:decoration-[#C20430] transition-all duration-300 decoration-4 underline-offset-4">%s</span>
            </a>
        </div>
        <div class="flex gap-x-6 flex-row-reverse w-2/3 bg-black h-20 items-center py-6 px-10">
            <a href="%smeet_the_team.php"
                class="group font-sans font-bold text-white text-2xl transition duration-300">
                Meet The Team
                <span class="block max-w-0 group-hover:max-w-full transition-all duration-300 h-1 bg-[#FFC72A]"></span>
            </a>
    
            <a href="%show_it_works.php"
                class="group font-sans font-bold text-white text-2xl transition duration-300">
                How It Works
                <span class="block max-w-0 group-hover:max-w-full transition-all duration-300 h-1 bg-[#FFC72A]"></span>
            </a>
    
            <a href="%sapi_access.php" class="group font-sans font-bold text-white text-2xl transition duration-300">
                API Access
                <span class="block max-w-0 group-hover:max-w-full transition-all duration-300 h-1 bg-[#FFC72A]"></span>
            </a>
            

            <a href="%scourse_finder.php" class="group font-sans font-bold text-white text-2xl transition duration-300">
                Course Finder
            <span class="block max-w-0 group-hover:max-w-full transition-all duration-300 h-1 bg-[#FFC72A]"></span>
            </a>
    
            <a href="%sapi_documentation.php"
                class="group font-sans font-bold text-white text-2xl transition duration-300">
                API Documentation
                <span class="block max-w-0 group-hover:max-w-full transition-all duration-300 h-1 bg-[#FFC72A]"></span>
            </a>
        </div>
    </div>
    <div class="h-4 w-3/4 bg-[#C20430] absolute -bottom-6"></div>
    <div class="h-4 w-1/3 bg-[#FFC72A] absolute -bottom-12"></div>
    </header>', $indexPrefix, $name, $pagesPrefix, $pagesPrefix, $pagesPrefix, $pagesPrefix, $pagesPrefix);
    return $nav;
}
