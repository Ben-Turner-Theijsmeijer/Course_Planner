<!DOCTYPE html>
<html>
<!-- Head Section -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quinn Meiszinger</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="src/js/scripts.js"></script>
</head>

<!-- Header -->

<?php
require_once('../../components/navbar.php');
echo generateNav('member', 'Quinn');
?>

<!-- Content  -->
<section class="content">
    <div class="container mt-36 mx-auto text-center max-width-md">
        <h1 class="text-2xl font-bold mt-4">Base64 Encoder & Decoder</h1>
        <p class="mt-4">
            This is my PHP script to convert a string to and from base64
        </p>
        <form action="" method="post" class="mt-4">
            <div class="mb-4">
                <label for="decoded_string" class="block font-sans font-bold text-white">Decoded String:</label>
                <textarea rows=4 name="decoded_string" id="decoded_string" class="block w-full rounded px-2 py-1 border border-gray-400" placeholder="Type decoded string here..."><?php include("decode_64.php");
                                                                                                                                                                                    echo decode_64($_POST["encoded_string"] ?? ''); ?></textarea>
            </div>

            <button type="submit" class="bg-[#FFC72A] hover:bg-yellow-300 text-black px-8 py-2 mt-4 mb-6 rounded font-bold">Encode/Decode</button>

            <div class="mb-4">
                <label for="encoded_string" class="block font-sans font-bold text-white">Encoded String:</label>
                <textarea rows=4 name="encoded_string" id="encoded_string" class="block w-full rounded px-2 py-1 border border-gray-400" placeholder="Type encoded string here..."><?php include("encode_64.php");
                                                                                                                                                                                    echo encode_64($_POST["decoded_string"] ?? ''); ?></textarea>
            </div>
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