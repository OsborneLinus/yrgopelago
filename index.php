<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/styles/styles.css" />

    <title>Yrgopelago</title>
</head>

<body>
    <header>
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
    <section class="flex h-screen">
        <div class="h-screen bg-cover bg-no-repeat absolute top-0 left-0 right-0 " style="background-image: url(media/SunbedsOnShore.jpg)"></div>
    </section>
    <section class="flex justify-center items-center gap-7 m-2">
        <select class="w-64">
            <option value="cheap">Two single beds with no balcony</option>
            <option value="standard">King Size bed with balcony to reception</option>
            <option value="Expensive">Three roomer with king size bed and balcony towards the beach</option>
        </select>
        <button id="showCalendar" class=" border-2 border-green-700">Date</button>
    </section>
    <?php require 'bookings/rendercalendar.php';
    ?>

    <script src=" app.js"></script>
</body>

</html>