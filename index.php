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
            <nav class="w-5/6 h-16 relative top-0 z-10 flex bg-green-900 text-white items-center justify-end space-x-10 px-10">
                <p class="">YRGOPELAGO</p>
                <a href="index.php">HOME</a>
                <a href="#">ROOMS</a>
                <a href="#">BOOKINGS</a>
                <a href="#">ABOUT US</a>
            </nav>
        </div>
    </header>
    <section class="flex justify-center items-center h-screen">
        <div class="h-screen bg-cover bg-fixed bg-no-repeat absolute top-0 right-0 left-0" style="background-image: url(media/SunbedsOnShore.jpg)"></div>
    </section>

    <section class="grid gap-10 h-screen grid-cols-2 grid-rows-3 mx-5 mb-96">
        <div class="bg-no-repeat h-screen row-span-2" style="background-image: url(media/enPalmochHotell.jpg)"></div>
        <div class="flex flex-col">
            <h2 class="text-2xl">Enchance your feelings!</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam asperiores nam ab quis maxime accusamus doloremque et mollitia impedit odit. Voluptas atque perferendis quod facilis. Deserunt blanditiis deleniti neque optio!</p>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur eveniet, sint accusantium eum quos eligendi, optio ab maxime architecto inventore, magni mollitia aliquid accusamus praesentium et eaque dolorum officiis? Molestias?</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minima explicabo hic laudantium voluptates ab totam vero corporis iusto accusantium nostrum eaque, animi odio! Aperiam corrupti ipsam esse veniam ex nemo.</p>
        </div>

        <div class="bg-no-repeat h-screen row-span-2 mt-40" style="background-image: url(media/ensamtHusonIsland.jpg)"></div>
        <div class="flex flex-col pt-40">
            <h2 class="text-2xl">Experience calmness!</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatibus quae praesentium at. Atque sit adipisci deserunt labore impedit suscipit dolores illum doloribus eum magni, velit aliquam veritatis nam ipsum odit?</p>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur eveniet, sint accusantium eum quos eligendi, optio ab maxime architecto inventore, magni mollitia aliquid accusamus praesentium et eaque dolorum officiis? Molestias?</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minima explicabo hic laudantium voluptates ab totam vero corporis iusto accusantium nostrum eaque, animi odio! Aperiam corrupti ipsam esse veniam ex nemo.</p>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur eveniet, sint accusantium eum quos eligendi, optio ab maxime architecto inventore, magni mollitia aliquid accusamus praesentium et eaque dolorum officiis? Molestias?</p>
        </div>
    </section>
    <!--     <form method="get" id="myForm">
        <section class="flex justify-center items-center gap-7 m-2 ">
            <button type="button" name="superior" id="showCalendar" class=" border-2 border-green-700">Superior</button>
            <button name="deluxe" id="showCalendar" class=" border-2 border-green-700">Deluxe</button>
            <button name="standard" id="showCalendar" class=" border-2 border-green-700">Standard</button>
        </section>
    </form> -->

    <div>
        <div id="scrolling-section" class="relative">
            <div class="grid grid-cols-2 gap-4 text-center self-center">
                <div>
                    <img id="picture1" src="media/SuperiorRoom.jpg" alt="Picture of the Standard based room">
                </div>
                <div class="bg-green-800 flex flex-col justify-center items-center">
                    <h1 class="text-6xl text-white">Superior Room</h1>
                    <p class="text-lg text-gray-300">2 Guests 1 Bed 15m2</p>
                    <form action="input.php" method="get">
                        <input type="hidden" name="roomType" value="superior">
                        <button type="submit">Check availability</button>
                    </form>
                </div>
            </div>
            <div class=" grid grid-cols-2 gap-4 mt-10">
                <div>
                    <img id="picture2" src="media/DeluxeRoom.jpg" alt="Picture 2">
                </div>
                <div class="bg-green-800 flex flex-col justify-center items-center">
                    <h1 class="text-6xl text-white">Deluxe Room</h1>
                    <p class="text-lg text-gray-300">2 Guests 1 Bed 15m2</p>
                    <form action="input.php" method="get">
                        <input type="submit" name="deluxe" value="check availability"></input>
                    </form>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4 mt-10">
                <div>
                    <img id="picture3" src="media/StandardRoom.jpg" alt="Picture 3">
                </div>
                <div class="bg-green-800 flex flex-col justify-center items-center">
                    <h1 class="text-6xl text-white">Standard Room</h1>
                    <p class="text-lg text-gray-300">2 Guests 1 Bed 15m2</p>
                    <form action="input.php" method="get">
                        <input type="submit" name="standard" value="check availability"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src=" app.js">
    </script>
</body>

</html>