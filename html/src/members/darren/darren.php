<!DOCTYPE html>
<html>
<!-- Head Section -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Darren Awesome Page</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="src/js/scripts.js"></script>
</head>
<body class = "bg-gray-900 flex flex-col justify-between overflow-auto overflow-x-hidden ">
    <!-- Header Section -->
    <div class="flex flex-col w-full h-full sticky top-0 z-30">
        <header class="bg-black w-full">
            <div class="flex flex-row relative">
                <div class="flex flex-row w-1/2 bg-black h-20 items-center py-6 px-10">
                    <a href="https://cis3760f23-11.socs.uoguelph.ca/index.php">
                        <span class="font-sans font-bold text-white text-4xl leading-10 underline decoration-[#FFC72A] hover:decoration-[#C20430] transition-all duration-300 decoration-4 underline-offset-4">Darren
                            </span>
                    </a>
                </div>
                <div class="flex gap-x-6 flex-row-reverse w-1/2 bg-black h-20 items-center py-6 px-10">
                    <a href="https://cis3760f23-11.socs.uoguelph.ca/src/meet_the_team.php" class="group font-sans font-bold text-white text-2xl transition duration-300">
                        Meet The Team
                        <span class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-1 bg-[#FFC72A]"></span>
                    </a>
                    <a href="https://cis3760f23-11.socs.uoguelph.ca/src/how_it_works.php" class="group font-sans font-bold text-white text-2xl transition duration-300">
                        How It Works
                        <span class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-1 bg-[#FFC72A]"></span>
                    </a>
                    
                </div>

            </div>
        </header>
    </div>

    <!-- Hero Section  -->
    <section class="hero py-16 pt-10  w-11/12 mx-auto ">
        <div class="container py-16 px-8 mx-auto flex items-center rounded-lg justify-center bg-cyan-500">
            <div class="w-full md:w-1/3 flex items-center justify-center">
                <div class="rounded-lg overflow-hidden">
                    <img src="photo1.jpg" alt="Hero Picture"
                        class="w-full h-full object-cover" />
                </div>
            </div>
            <div class="w-full md:w-1/3 px-4 font-sans font-bold text-white items-center">
                <h1 class="text-4xl font-semibold mb-4">Hi, I'm Darren! </h1>
                <h1 class="text-4xl font-semibold mb-4">And I like trees </h1>
            </div>
                
            <div class="w-full md:w-1/3 flex items-center justify-center">
                <div class="rounded-lg overflow-hidden">
                    <img src="photo2.jpg" alt="Hero Picture"
                        class="w-full h-full object-cover" />
                </div>
            </div>
            
        </div>
        
    </section>
   

    <!-- Content Section -->
    <div class="flex flex-col relative w-screen h-full bg-hero bg-no-repeat bg-cover bg-top ">

        <div class="absolute inset-y-2 right-5  h-10 bg-orange-300 rounded-lg shadow-md  p-2 opacity-90">System uptime: 
            <?php
                $output = shell_exec("uptime");
                echo nl2br($output);
                
            ?>
        
        </div>
        <div class="absolute inset-y-2 h-20 bg-orange-300 rounded-lg shadow-md p-1 opacity-90 "> 
            <?php
                
                $output = shell_exec("head -n3 /proc/meminfo");
                echo nl2br($output);

                
            ?>
        
        </div>
        <div class="absolute bottom-10  h-96 bg-orange-300 rounded-lg shadow-md p-1 opacity-90 ">CPU Details:<br/>
            <?php
                
                

                $output = shell_exec("lscpu | grep -A 14 Architecture");
                echo nl2br($output);

            ?>
        
        </div>
        <!-- Opening message -->
        <section class="py-6">
            <div class=" w-9/12 mx-auto rounded bg-neutral-100 p-6 font-serif text-center">
                <h2 class=" text-xl">Welcome to My PHP Page</h2> 
                <p class="text-base">This is to show a fun feature of php. PHP is a server sided programing language meaning everthing ran in PHP run on the sever (not locally) <br/>This is safe as vistors can not see or change PHP code. But what happen if I give the users access to run terminal commands.
                </br> Below you can enter BASH compands or run a program installed on the server and it'll output the output of the command  </p>
                </br> Everyone has read/write/execute access to test.txt try adding to with echo "hello world" >> test.txt Then cat test.txt   
                </br> Use whoami do find out what user the website is run as
                </br> You can get the date and time with: date 
                </br>
                </br>The limitations of this is that it will reset after one line is run. It won't keep the process of cd ../</br> It is also limted as to what permisions the user has.
                </br>This is very useful as it lets you run any program on the server with a web interface. Just run it from comand line with the command line arguments the user is requesting and output it how ever you'd like to in a clean website interface
                </br>Future Improvements: If I had more time to add to this. I would look more into pipes in php with proc_open(). This would let me create a more terimnal like experance being able to keep track of location and history   
            </div> 
        </section>

        


        <!-- Contact Section-->
        <section class="contact  py-8 ">
            <div class="max-w-md mx-auto rounded-lg shadow-md p-8 mb-18 bg-orange-300">
                <h3 class="text-2xl font-semibold text-white mb-4">Enter your termal command below</h3>
                <form action="#termComand" method="POST" id="termal">
                    <div class="mb-6">
                        <label for="message" class="block text-white text-sm font-medium mb-2">Command</label>
                        <input type="text" id="termComand" name="termComand" 
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

        <section class="py-6">
            <div class="w-7/12 mx-auto rounded bg-neutral-100 p-6 font-serif text-center">
                        <?php

                        if (isset($_POST['termComand'])) {
                            
                            $comand = $_POST['termComand'];
                            //echo $comand;
                            $output = shell_exec($comand . " 2>&1");
                            echo nl2br($output);
                        }else{
                            echo("No command entered");
                            
                        }
                        
                        ?>
            </div> 
        </section>
    </div>



    <!-- Footer Section -->
    <section class="footer bg-gray-900">
        <footer class="w-full bg-black text-white py-6">
            <div class="container mx-auto text-center">
                <p>&copy; CIS 3760 Group 11</p>
            </div>
        </footer>
    </section>
</body>

</html>