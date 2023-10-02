<!DOCTYPE html>
<html>
<!-- Head Section -->

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Vrushang Patel</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="bg-black bg-no-repeat bg-cover bg-top bg-[url('../../../imgs/background.png')]">

        <!-- Header -->
        <header class="bg-black w-screen">
            <div class="flex flex-row">
                <div class="flex flex-row w-1/2 bg-black h-20 items-center py-6 px-10">
                    <a href="../../meet_the_team.php">
                        <span class="font-sans font-bold text-white text-4xl leading-10 underline decoration-[#FFC72A] decoration-4 underline-offset-4">
                            Vrushang Patel
                        </span>
                    </a>
                </div>
                <div class="flex gap-x-6 flex-row-reverse w-1/2 bg-black h-20 items-center py-6 px-10">
                    <a href="../../meet_the_team.php" class="group font-sans font-bold text-white text-2xl transition duration-300">
                        Meet The Team
                        <span class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-1 bg-[#FFC72A]"></span>
                    </a>

                    <a href="../../how_it_works.php" class="group font-sans font-bold text-white text-2xl transition duration-300">
                        How It Works
                        <span class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-1 bg-[#FFC72A]"></span>
                    </a>

                </div>
            </div>
        </header>

        <!-- Content  -->
        <content class="flex w-auto flex-col md:my-10 md:mx-10 md:p-10 bg-hero box-content bg-black/60 backdrop-blur-sm bg-no-repeat bg-cover bg-center bg-fixed md:rounded-md">

            <section class="content">
                <div class="container mx-auto text-center">
                    <h1 class="text-4xl underline decoration-[#FFC72A] mt-3 text-white font-bold ">University of Guelph Course Catalog</h1>

                    <p class="text-white">
                        This is a table of the entire UoG Course Catalog
                    </p>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg overflow-y-scroll mt-3" style="height: 60vh;">
                        <table class="w-full text-sm text-left text-white dark:text-white-400 overflow-y-scroll bg-[#C20430]">
                            <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-black dark:text-white dark:bg-black">
                                Courses
                                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse through all the courses the University of Guelph has to offer.</p>
                            </caption>
                            <thead class="text-xs text-white uppercase bg-[#FFC72A] dark:bg-[#FFC72A] dark:text-white">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Course Code
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Course Title
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Offered
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Weight
                                    </th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php
                            $file = fopen("files/course_list.csv", "r");
                            $row = 2;
                            while (($data = fgetcsv($file, 1000, ",")) !== false) {
                                //echo "tr class=\"bg-white border-b dark:bg-gray-800 dark:border-gray-700\">";
                                $num = count($data);
                                //echo "<p> $num fields in line$row: <br /></p>\n";
                                $row++;
                                for ($c = 0; $c < $num; $c++) {
                                    if ($c == 0 or $c == 1 or $c == 2 or $c == 3) {
                                        echo "<td class=\"px-6 py-3\">", $data[$c], "</td>";
                                    }
                                }
                                echo "</tr>";
                            }
                            fclose($file);
                                ?>

                            </tbody>
                        </table>
                    </div>



                </div>

            </section>


            <section class="content">
                <div class="container mx-auto px-24 text-center">
                    <form class="mb-6">

                        <div class="mb-6">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your course</label>
                            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Search a course code.</p>

                            <input type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ACCT*1220" required />
                        </div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>


                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-6">
                        <table class="w-full text-sm text-left text-white dark:text-white-400 bg-[#C20430]">
                            <thead class="text-xs text-white uppercase bg-[#FFC72A] dark:bg-[#FFC72A] dark:text-white">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Course Code
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Course Title
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Offered
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Weight
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                            $file = fopen("files/course_list.csv", "r");
                            $row = 2;
                            while (($data = fgetcsv($file, 1000, ",")) !== false) {
                                //echo "tr class=\"bg-white border-b dark:bg-gray-800 dark:border-gray-700\">";
                                $num = count($data);
                                //echo "<p> $num fields in line$row: <br /></p>\n";
                                $row++;
                                if ($data[0] == $_GET['email']) {
                                    for ($c = 0; $c < $num; $c++) {
                                        if ($c == 0 or $c == 1 or $c == 2 or $c == 3) {
                                            echo "<td class=\"px-6 py-3\">", $data[$c], "</td>";
                                        }
                                    }
                                }

                                //echo "</tr>";
                            }
                            fclose($file);
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </section>
        </content>


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

