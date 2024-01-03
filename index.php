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
            <nav class="w-5/6 h-16 relative top-0 z-10 flex bg-green-950 text-white items-center justify-end space-x-10 px-10">
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

    <section class="flex flex-col m-0 h-full md:grid grid-cols-2">
        <div class="flex flex-col">
            <h2 class="text-2xl">Enchance your feelings!</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam asperiores nam ab quis maxime accusamus doloremque et mollitia impedit odit. Voluptas atque perferendis quod facilis. Deserunt blanditiis deleniti neque optio!</p>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur eveniet, sint accusantium eum quos eligendi, optio ab maxime architecto inventore, magni mollitia aliquid accusamus praesentium et eaque dolorum officiis? Molestias?</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minima explicabo hic laudantium voluptates ab totam vero corporis iusto accusantium nostrum eaque, animi odio! Aperiam corrupti ipsam esse veniam ex nemo.</p>
        </div>
        <div class="bg-no-repeat h-fit">
            <img src="media/enPalmochHotell.jpg" alt="Outskirts of an island with view over water">
        </div>


        <div class="bg-no-repeat h-fit mt-10">
            <img src="media/ensamtHusonIsland.jpg" alt="Outskirts of an island with view over water">
        </div>
        <div class="flex flex-col mb-10">
            <h2 class="text-2xl">Experience calmness!</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatibus quae praesentium at. Atque sit adipisci deserunt labore impedit suscipit dolores illum doloribus eum magni, velit aliquam veritatis nam ipsum odit?</p>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur eveniet, sint accusantium eum quos eligendi, optio ab maxime architecto inventore, magni mollitia aliquid accusamus praesentium et eaque dolorum officiis? Molestias?</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minima explicabo hic laudantium voluptates ab totam vero corporis iusto accusantium nostrum eaque, animi odio! Aperiam corrupti ipsam esse veniam ex nemo.</p>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur eveniet, sint accusantium eum quos eligendi, optio ab maxime architecto inventore, magni mollitia aliquid accusamus praesentium et eaque dolorum officiis? Molestias?</p>
        </div>
    </section>

    <section class="flex flex-col">
        <a class="custom" href="">
            <h1 class="font-semibold text-5xl text-green-900">Rooms</h1>
        </a>
        <div class=" custom flex flex-col md:grid grid-cols-2 text-center self-center">
            <div>
                <img id="picture1" src="media/SuperiorRoom.jpg" alt="Picture of the Standard based room">
            </div>
            <div class="bg-green-800 flex flex-col justify-center items-center">
                <h1 class="md:text-2xl lg:text-4xl text-white">Superior Room</h1>
                <p class="text-lg text-gray-300">2 Guests 1 King Size Bed 30m2</p>
                <form action="input.php" method="get">
                    <input type="hidden" name="roomType" value="superior">
                    <button type="submit">Check availability</button>
                </form>
            </div>
        </div>
        <div class="custom flex flex-col md:grid grid-cols-2 mt-5 text-center self-center">
            <div>
                <img id="picture2" src="media/DeluxeRoom.jpg" alt="Picture 2">
            </div>
            <div class="bg-green-800 flex flex-col justify-center items-center">
                <h1 class="md:text-2xl lg:text-4xl text-white">Deluxe Room</h1>
                <p class="text-lg text-gray-300">2 Guests 1 Queen Size Bed 22m2</p>
                <form action="input.php" method="get">
                    <input type="hidden" name="roomType" value="deluxe">
                    <button type="submit">Check availability</button>
                </form>
            </div>
        </div>
        <div class="custom flex flex-col md:grid grid-cols-2 text-center mt-5 self-center">
            <div>
                <img id="picture3" src="media/StandardRoom.jpg" alt="Picture 3">
            </div>
            <div class="bg-green-800 flex flex-col justify-center items-center">
                <h1 class="md:text-2xl lg:text-4xl text-white">Standard Room</h1>
                <p class="text-lg text-gray-300">2 Guests 2 Twin Size Beds 15m2</p>
                <form action="input.php" method="get">
                    <input type="hidden" name="roomType" value="standard">
                    <button type="submit">Check availability</button>
                </form>
            </div>
        </div>
    </section>
    <section>
        <div class="mb-5">
            <h1 class="custom flex justify-center text-2xl font-semibold text-green-900">Features</h1>
            <div class="flex flex-col md:flex-row gap-10 items-center justify-center">
                <div class="custom relative group">
                    <h3 class="text-xl text-green-900">Dolphin Safari</h3>
                    <img src="media/dolphins.jpg" alt="dolphins swimming">
                    <div class="opacity-0 group-hover:opacity-100 duration-300 absolute inset-x-0 bottom-0 top-0 flex justify-center text-green-800 bg-white md:text-base overflow-scroll lg:text-xl">
                        <p>Embark on a captivating dolphin safari around your island hotel. Cruise along the coastline in a specialized boat as expert guides share insights into marine life. Anticipate the thrill of encountering playful dolphins in their natural habitat, witnessing their acrobatic displays and joyful leaps.</p>
                    </div>

                </div>
                <div class="custom relative group">
                    <h3 class="text-xl text-green-900">Skydiving-package</h3>
                    <img src="media/Skydiving.jpg" alt="skydiving over an island">
                    <div class="opacity-0 group-hover:opacity-100 duration-300 absolute inset-x-0 bottom-0 top-0 flex justify-center text-green-800 bg-white md:text-base overflow-scroll lg:text-xl">
                        <p>
                            Elevate your stay with an adrenaline-pumping skydiving package around the stunning island of your hotel. Soar to new heights as you free-fall over turquoise waters, capturing breathtaking aerial views of the picturesque coastline and lush landscapes. Experienced instructors ensure a safe and thrilling adventure, making this skydiving experience perfect for both beginners and seasoned thrill-seekers.</p>
                    </div>

                </div>
                <div class="custom relative group">
                    <h3 class="text-xl text-green-900">Massage on the beach</h3>
                    <img src="media/massageBeach.jpg" alt="woman getting massage on beach">
                    <div class="opacity-0 group-hover:opacity-100 duration-300 absolute inset-x-0 bottom-0 top-0 flex justify-center text-green-800 bg-white md:text-sm overflow-scroll lg:text-xl">
                        <p>
                            Indulge in ultimate relaxation with our exclusive massage package set against the serene backdrop of your island hotel. Immerse yourself in a world of tranquility as skilled therapists pamper you with a rejuvenating massage experience. The soothing sounds of lapping waves and gentle sea breezes enhance the calming ambiance, creating a perfect escape for relaxation.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="flex h-20 my-10 text-center justify-center">
        <form action="#">
            <label for="email">
                <h2 class="text-3xl">
                    <span class="italic font-light">SPECIAL OFFERS</span> <span class="font-semibold">TO YOUR INBOX</span>
                </h2>
            </label>
            <input type="email" name="email" placeholder="Email" class="border-solid border-2 p-1 border-green-900 rounded-md">
            <button class="bg-green-900 text-white rounded-md p-1" type="submit">Subscribe</button>
        </form>
    </section>

</body>
<footer>
    <div class="flex w-full h-72 bg-green-950 pt-10 justify-center text-white">
        <div class="flex flex-col gap-2 pr-20 ">
            <p class="text-xl">YRGOPELAGO</p>
            <p class="pt-10">031-123 123</p>
            <p>Yrgopelagio 2, Islandistan</p>
        </div>
        <div class="flex flex-col pt-10">
            <a href="index.php">Home</a>
            <a href="#">Rooms</a>
            <a href="#">Bookings</a>
            <a href="#">About us</a>
        </div>
    </div>
</footer>
<script src=" app.js">
</script>

</html>