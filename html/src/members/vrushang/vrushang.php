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
    <script src="src/js/scripts.js"></script>
</head>

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
                About
                <span class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-1 bg-[#FFC72A]"></span>
            </a>

        </div>
    </div>
</header>

<!-- Content  -->
<section class="content">
    <div class="container mx-auto text-center">
        <h1 class="text-2xl font-bold mt-4">University of Guelph Course Catalog</h1>
        <p class="mt-4">
            This is a table of the entire UoG Course Catalog
        </p>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg overflow-y-scroll" style="height: 60vh;">
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

<!-- Footer Section -->
<section class="footer">
    <footer class="fixed bottom-0 w-full bg-black text-white py-6">
        <div class="container mx-auto text-center">
            <p>&copy; CIS 3760 Group 11</p>
        </div>
    </footer>
</section>

</html>
