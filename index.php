<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="node_modules/@glidejs/glide/dist/glide.min.js"></script>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="styles.css" />

    <title>Yrgopelago</title>
</head>

<body>
    <!--     <header>
        <div class="flex justify-center">
            <nav class="w-5/6 h-16 fixed top-0 z-10 flex bg-green-900 text-white items-center justify-end space-x-10 px-10">
                <p class="">YRGOPELAGO</p>
                <a href="#">HOME</a>
                <a href="#">ROOMS</a>
                <a href="#">BOOKINGS</a>
                <a href="#">ABOUT US</a>
            </nav>
        </div>
    </header>
    <section>
        <div class="h-screen bg-cover bg-no-repeat absolute top-0 left-0 right-0" style="background-image: url(media/SunbedsOnShore.jpg)"></div>
    </section> -->
    <?php require 'rendercalendar.php';
    ?>
    <script src="app.js"></script>
</body>

</html>