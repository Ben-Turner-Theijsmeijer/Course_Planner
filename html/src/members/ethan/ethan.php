<!DOCTYPE html>
<html>
<!-- Head Section -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ethan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<!-- Header -->

<?php
require_once('../../components/navbar.php');
echo generateNav('member', 'Ethan');
?>

<body>
    <!-- Content  -->
    <section class="content">
        <div class="mt-36">
            <p>
                Here is my small PHP script. It calculates the result of performing an operation on two operands.
            </p></br>
        </div>
        <div class="w-full max-w-xs">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="post" attribute="post" action="calculate.php">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="operand1">Operand 1</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type=number id="operand1" name="operand1" value=0>
                </div>
                <div class="mb-4">
                    <input type=radio name="operator" name="add" value="add" checked=true>
                    <label for="add">+</label>
                    <input type=radio name="operator" name="subtract" value="subtract">
                    <label for="subtract">-</label>
                    <input type=radio name="operator" name="multiply" value="multiply">
                    <label for="multiply">*</label>
                    <input type=radio name="operator" name="divide" value="divide">
                    <label for="divide">/</label>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="operand2">Operand 2</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type=number id="operand2" name="operand2" value=0>
                    </div>
                    <button class="bg-[#FFC72A] hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Calculate</button>
            </form>
        </div>
    </section>
</body>

<footer>
    <!-- Footer  -->
    <section class="footer">

    </section>
</footer>

</html>