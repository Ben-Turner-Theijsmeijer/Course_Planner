<html>
<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
        Courses
        <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse through all the courses the University of Guelph has to offer.</p>
    </caption>
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
            <th scope="col" class="px-6 py-3">
                <span class="sr-only">Edit</span>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                Apple MacBook Pro 17"
            </th>
            <td class="px-6 py-4">
                Silver
            </td>
            <td class="px-6 py-4">
                Laptop
            </td>
            <td class="px-6 py-4">
                $2999
            </td>
            <td class="px-6 py-4 text-right">
                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
            </td>
        </tr>
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
                    echo "<td class=\"px-6 py-4\">", $data[$c], "</td>";
                }

            }
            echo "</tr>";
        }

        fclose($file);
        ?>


    </tbody>
</table>




</html>
