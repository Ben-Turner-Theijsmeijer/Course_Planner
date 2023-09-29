<!DOCTYPE html>
<html>
<!-- Head Section -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Andrew Chow</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="src/js/scripts.js"></script>
</head>

<!-- Header -->
<header class="bg-black w-screen">
    <div class="flex flex-row">
        <div class="flex flex-row w-1/2 bg-black h-20 items-center py-6 px-10">
            <span
                class="font-sans font-bold text-white text-4xl leading-10 underline decoration-yellow-400 decoration-4 underline-offset-4">Andrew
                Chow
            </span>
        </div>
        <div class="flex gap-x-6 flex-row-reverse w-1/2 bg-black h-20 items-center py-6 px-10">
            <a href="src/meet_the_team.php"
                class="group font-sans font-bold text-white text-2xl transition duration-300">
                Meet The Team
                <span class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-1 bg-yellow-400"></span>
            </a>

            <a href="src/about.php" class="group font-sans font-bold text-white text-2xl transition duration-300">
                About
                <span class="block max-w-0 group-hover:max-w-full transition-all duration-500 h-1 bg-yellow-400"></span>
            </a>

        </div>
    </div>
</header>

<!-- Content  -->
<section class="content">
    <div class="container mx-auto text-center">
        <h1 class="text-2xl font-bold mt-4">Currency Converter</h1>
        <p class="mt-4">
            Here's my php script where a user can select a currency to convert
        </p>
        <form action="converter.php" method="post" class="mt-4">
            <div class="mb-4">
                <label for="amount" class="block font-sans font-bold text-white">Amount:</label>
                <input type="text" name="amount" id="amount" class="rounded px-2 py-1 border border-gray-400"
                    placeholder="Enter Amount" required>
            </div>
            <div class="mb-4">
                <label for="from_currency" class="block font-sans font-bold text-black mb-4">From Currency:</label>
                <select name="from_currency" id="from_currency" class="rounded px-2 py-1 border border-gray-400"
                    required>
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
                    <option value="GBP">GBP - Pound</option>
                    <option value="JPY">JPY - Japanese Yen</option>
                </select>
            </div>
            <button type="submit" class="bg-yellow-400 hover:bg-yellow-300 text-black px-8 py-2 mt-4 rounded font-bold">Convert</button>
        </form>
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