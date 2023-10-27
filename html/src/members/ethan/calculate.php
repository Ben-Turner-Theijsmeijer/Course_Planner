<!DOCTYPE html>
<html>
<!-- Head Section -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculate</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<!-- Header -->
<?php
require_once('../../components/navbar.php');
echo generateNav('member', 'Calculate');
?>

<body>
    <section class="content">
        <div class="mt-36 flex bg-white shadow-md rounded px-8">
            <div class="border-solid border-2 mb-4">
                <?php
                // get form variables
                $operator = $_POST['operator'];
                $operand1 = $_POST['operand1'];
                $operand2 = $_POST['operand2'];

                if ($operator == 'divide' and $operand2 == 0) {
                    // check if divide by 0
                    echo "ERROR: divide by 0";
                } else {
                    // switch case
                    switch ($operator) {
                        case 'add':
                            echo $operand1, " + ", $operand2, " = ", $operand1 + $operand2;
                            break;
                        case 'subtract':
                            echo $operand1, " - ", $operand2, " = ", $operand1 - $operand2;
                            break;
                        case 'multiply':
                            echo $operand1, " * ", $operand2, " = ", $operand1 * $operand2;
                            break;
                        case 'divide':
                            echo $operand1, " / ", $operand2, " = ", $operand1 / $operand2;
                            break;
                    }
                }
                ?>
            </div>
            <div class="mb-4">
                <p class="bg-[#FFC72A] hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"><a href="ethan.php">Return to Ethan's page</p>
            </div>
        </div>
    </section>
</body>