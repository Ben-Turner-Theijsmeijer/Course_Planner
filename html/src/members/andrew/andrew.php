<!DOCTYPE html>
<html>
<!-- Head Section -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Andrew Chow</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="src/js/scripts.js"></script>
</head>


<body class="bg-gradient-to-b from-blue-300 to-pink-400">
    <!-- Header -->
    <?php
    require_once('../../components/navbar.php');
    echo generateNav('member', 'Andrew');
    ?>
    <!-- Hero Section  -->
    <section class="hero py-16">
        <div class="mt-36 container mx-auto flex items-center justify-center">
            <div class="w-full md:w-1/3 flex items-center justify-center">
                <div class="rounded-full overflow-hidden">
                    <img src="/src/members/andrew/photos/hero.jpg" alt="Hero Picture" class="w-full h-full object-cover" />
                </div>
            </div>
            <div class="w-full md:w-1/4 px-4">
                <h1 class="text-4xl font-semibold mb-4">Hello! I'm Andrew</h1>
                <h2 class="text-2xl font-semibold mb-4">At the moment I am..</h2>
                <ul class="list-inside text-black-700 text-xl">
                    <li class="mb-2">💻 Building new applications with Elixir/Phoenix</li>
                    <li class="mb-2">📘 Learning about product management</li>
                    <li class="mb-2">📷 Capturing the world around me</li>
                </ul>
            </div>
        </div>
    </section>



    <!-- PHP Section  -->
    <section class="content">
        <div class="container mx-auto text-center">
            <h1 class="text-2xl font-bold mt-4">Currency Converter</h1>
            <p class="mt-4">
                Here's my php script where a user can select a currency to convert
            </p>
            <form action="" method="post" class="mt-4">
                <div class="mb-4">
                    <input type="text" name="amount" id="amount" class="rounded px-2 py-1 border border-gray-400" placeholder="Enter Amount" required>
                </div>
                <div class="mb-4">
                    <label for="from_currency" class="block font-sans font-bold text-black mb-4">From Currency:</label>
                    <select name="from_currency" id="from_currency" class="rounded px-2 py-1 border border-gray-400" required>
                        <option value="" disabled selected>Select Currency</option>
                        <option value="CAD">CAD - Canadian Dollar</option>
                        <option value="USD">USD - United States Dollar</option>
                        <option value="EUR">EUR - Euro</option>
                        <option value="GBP">GBP - British Pound</option>
                        <option value="JPY">JPY - Japanese Yen</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="to_currency" class="block font-sans font-bold text-black mb-4">To Currency:</label>
                    <select name="to_currency" id="to_currency" class="rounded px-2 py-1 border border-gray-400" required>
                        <option value="" disabled selected>Select Currency</option>
                        <option value="CAD">CAD - Canadian Dollar</option>
                        <option value="USD">USD - United States Dollar</option>
                        <option value="EUR">EUR - Euro</option>
                        <option value="GBP">GBP - British Pound</option>
                        <option value="JPY">JPY - Japanese Yen</option>
                    </select>
                </div>
                <button type="submit" class="bg-[#FFC72A] hover:bg-yellow-300 text-black px-8 py-2 mt-4 mb-6 rounded font-bold">Convert</button>
            </form>

            <?php

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                // Receive values
                $amount = isset($_POST["amount"]) ? floatval($_POST["amount"]) : 0;
                $from_currency = isset($_POST["from_currency"]) ? $_POST["from_currency"] : '';
                $to_currency = isset($_POST["to_currency"]) ? $_POST["to_currency"] : '';

                // Stores conversion rates for currencies supported
                $conversion_rates = [
                    "USD" => [
                        "CAD" => 1.35,
                        "EUR" => 0.95,
                        "GBP" => 0.82,
                        "JPY" => 149.43,

                    ],
                    "EUR" => [
                        "CAD" => 1.43,
                        "USD" => 1.06,
                        "GBP" => 0.87,
                        "JPY" => 157.81,
                    ],
                    "CAD" => [
                        "USD" => 0.74,
                        "GBP" => 0.61,
                        "JPY" => 110.63,
                        "EUR" => 0.70,
                    ],
                    "GBP" => [
                        "USD" => 1.22,
                        "CAD" => 1.65,
                        "JPY" => 182.27,
                        "EUR" => 1.15,
                    ]
                ];


                // Output the converted amount
                if (isset($conversion_rates[$from_currency]) && isset($conversion_rates[$from_currency][$to_currency])) {
                    $converted_amount = $amount * $conversion_rates[$from_currency][$to_currency];
                    echo "<h1 class='font-sans font-bold text-black'>Converted Amount: {$converted_amount} {$to_currency}</h1>";
                } else {
                    echo "<h1 class='font-sans font-bold text-black'>Invalid Currency!</h1>";
                }
            }


            ?>
        </div>
    </section>


    <section class="p-4 mt-12">
        <div class="container mx-auto">
            <h1 class="text-2xl font-semibold mb-4 text-center">Photo Gallery</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="bg-white rounded shadow-md">
                    <img src="/src/members/andrew/photos/lights.jpg" alt="Night Lights" class="w-full h-auto">
                </div>
                <div class="bg-white rounded shadow-md">
                    <img src="/src/members/andrew/photos/flower.jpg" alt="Flower" class="w-full h-auto">
                </div>
                <div class="bg-white rounded shadow-md">
                    <img src="/src/members/andrew/photos/squirrel.jpg" alt="Squirrel" class="w-full h-auto">
                </div>
                <div class="bg-white rounded shadow-md">
                    <img src="/src/members/andrew/photos/park.jpg" alt="Park" class="w-full h-auto">
                </div>
                <div class="bg-white rounded shadow-md">
                    <img src="/src/members/andrew/photos/leafs.jpg" alt="Leafs" class="w-full h-auto">
                </div>
                <div class="bg-white rounded shadow-md">
                    <img src="/src/members/andrew/photos/nyc.jpg" alt="NYC" class="w-full h-auto">
                </div>
            </div>
        </div>
    </section>
</body>

<!-- Footer Section -->
<section class="footer">
    <footer class="w-full bg-black text-white py-6">
        <div class="container mx-auto text-center">
            <p>&copy; CIS 3760 Group 11</p>
        </div>
    </footer>
</section>


</html>