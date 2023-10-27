<!DOCTYPE html>
<html>
<!-- Head Section -->

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>API Documentation</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/swagger-ui-dist@3/swagger-ui-bundle.js"></script>
  <script src="./js/swagger-ui.js"></script>
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/swagger-ui-dist@3/swagger-ui.css" />
</head>

<!-- Header -->

<?php
require_once(__DIR__ . '/components/navbar.php');
echo generateNav('content');
?>


<!-- API Documentation -->

<body>
  <div class="mt-36" id="swagger-ui"></div>
</body>

<!-- Footer Section -->
<section class="footer absolute w-full">
  <footer class="bg-black text-white py-6">
    <div class="container mx-auto text-center">
      <p>&copy; CIS 3760 Group 11</p>
    </div>
  </footer>
</section>

</html>