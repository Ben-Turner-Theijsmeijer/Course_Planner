<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Selector</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black">
<!-- Header -->
<div class="flex flex-col w-screen h-screen bg-hero bg-no-repeat bg-cover bg-top bg-[url('../imgs/background.png')]">
    <header class="bg-black w-screen">
        <div class="flex flex-row">
            <div class="flex flex-row w-1/2 bg-black h-20 items-center py-6 px-10">
                <span class="font-sans font-bold text-white text-4xl leading-10 underline decoration-yellow-400 decoration-4 underline-offset-4">Course Selector</span>
            </div>
            <div class="flex gap-x-6 flex-row-reverse w-1/2 bg-black h-20 items-center py-6 px-10">
                <?php
                    echo '
                    <form method="post" action="meet_the_team.php">
                        <button class="group font-sans font-bold text-white text-2xl transition duration-300">
                            Meet The Team
                            <span class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-1 bg-yellow-400"></span>
                        </button>
                    </form>
                    ';
                ?>
                <?php
                    echo '
                    <form method="post" action="about.php">
                        <button class="group font-sans font-bold text-white text-2xl transition duration-300">
                            About
                            <span class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-1 bg-yellow-400"></span>
                        </button>
                    </form>
                    ';
                ?>
            </div>
        </div>
    </header>
    <content class="flex flex-col mx-20 my-10 px-10 py-10 bg-hero bg-black bg-opacity-25 bg-no-repeat bg-cover bg-center bg-fixed">
        BEANS <br>
        BRANS <br>
    </content>
</div>
</body>
</html>