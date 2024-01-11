<section class="flex justify-center items-center h-screen">
    <div>
        <img class="w-full h-full absolute object-cover top-0 left-0" src="media/SunbedsOnShore.jpg" alt="">
        <p class="z-20 absolute left-0 top-52 text-7xl text-white font-serif md:text-9xl">CASA OLIVE <br><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></p>
    </div>
</section>

<section class="flex flex-col m-8 h-full md:grid grid-cols-2">
    <div class="bg-no-repeat h-fit p-2 mr-5">
        <img class="rounded-2xl" src="media/enPalmochHotell.jpg" alt="Outskirts of an island with view over water">
    </div>
    <div class="flex flex-col">
        <h2 class="text-2xl pt-2">Enchance your feelings!</h2>
        <p>Welcome to our tropical paradise, a secluded haven nestled on the fringes of pristine beaches and lush landscapes—an island retreat where enchantment awaits at every turn. Our hotel, a beacon of luxury, is not just a respite for the soul but a gateway to a world where nature's embrace and refined indulgence harmonize seamlessly.</p>
        <p>As the sun paints the skies in hues of warmth, our island unveils its beauty. Imagine waking up to the gentle lullaby of waves, with your private haven just steps away from the ivory sands. Lounge under swaying palms, letting the ocean breeze caress your senses as you surrender to the rhythm of island life.?</p>
        <p>What sets our paradise apart is the fusion of coastal serenity and the artistry of winemaking. Explore our exclusive vineyard, a verdant oasis overlooking the azure horizon. Stroll through rows of vines heavy with succulent grapes, basking in the tropical sun. Our hotel proudly owns this vineyard, ensuring that each sip of our wines embodies the essence of this island's terroir.</p>
    </div>

    <div class="flex flex-col mt-10">
        <h2 class="text-2xl">Experience calmness!</h2>
        <p>Indulge in curated wine tastings, guided by our expert sommeliers, who unveil the secrets behind each bottle. The symphony of flavors, a marriage of sun-kissed grapes and masterful craftsmanship, lingers on your palate, creating a sensory masterpiece. Savor the unique experience of sipping world-class wines with the sea breeze as your companion.</p>
        <p>At nightfall, let the island's magic unfold. Candlelit dinners on the beach, accompanied by the melodic sounds of nature, elevate the dining experience to a new level of romance. As the stars sprinkle the sky, your connection with this tropical sanctuary deepens.
        <p>Escape to our island, where the fusion of coastal bliss and vineyard elegance invites you to enhance your feelings, creating memories that linger long after the journey ends.</p>
    </div>
    <div class="bg-no-repeat h-fit pt-10 md:ml-10">
        <img class="rounded-2xl" src="media/ensamtHusonIsland.jpg" alt="Outskirts of an island with view over water">
    </div>
</section>

<section class="flex flex-col m-8" id="rooms">
    <a class="" href="">
        <h1 class="mb-10 font-semibold text-5xl text-green-900 text-center">Rooms</h1>
    </a>
    <div class="custom mb-10 flex flex-col sm:grid grid-cols-2 text-center self-center">
        <h1 class="text-2xl md:text-2xl col-span-2 lg:text-4xl">Superior Room</h1>

        <div>
            <img class="rounded-t-2xl sm:rounded-none sm:rounded-l-2xl" id="picture1" src="media/SuperiorRoom.jpg" alt="Picture of the Standard based room">
        </div>
        <div class="bg-green-950 grid grid-cols-2 grid-rows-1 justify-center items-center rounded-b-2xl sm:rounded-none sm:rounded-r-2xl">
            <p class="text-lg text-gray-300">2 Guests 1 King Size Bed 30m2</p>


            <form action="input.php" method="get">
                <input type="hidden" name="roomType" value="superior">
                <button class="px-2 py-3 mr-2 bg-gradient-to-r from-green-900 to-green-950 text-white font-bold rounded-md transition-transform transform-gpu hover:-translate-y-1 hover:shadow-lg md:px-5" type="submit">Check availability</button>
            </form>
        </div>

    </div>
    <div class="custom mb-10 second-slide flex flex-col sm:grid grid-cols-2 mt-5 text-center self-center">
        <h1 class="text-2xl sm:text-2xl col-span-2 lg:text-4xl">Deluxe Room</h1>
        <div class="bg-green-950 grid grid-cols-2 grid-rows-1 justify-center items-center rounded-t-2xl sm:rounded-none sm:rounded-l-2xl">
            <p class="text-lg text-gray-300">2 Guests 1 Queen Size Bed 22m2</p>
            <form action="input.php" method="get">
                <input type="hidden" name="roomType" value="deluxe">
                <button class="px-2 py-3 mr-2 bg-gradient-to-r from-green-900 to-green-950 text-white font-bold rounded-md transition-transform transform-gpu hover:-translate-y-1 hover:shadow-lg md:px-5" type="submit">Check availability</button>
            </form>
        </div>
        <div>
            <img class="rounded-b-2xl sm:rounded-none sm:rounded-r-2xl" id="picture2" src="media/DeluxeRoom.jpg" alt="Picture 2">
        </div>

    </div>
    <div class="custom flex flex-col sm:grid grid-cols-2 text-center mt-5 self-center">
        <h1 class="text-2xl md:text-2xl col-span-2 lg:text-4xl">Standard Room</h1>

        <div>
            <img class="rounded-t-2xl sm:rounded-none sm:rounded-l-2xl" id="picture3" src="media/StandardRoom.jpg" alt="Picture 3">
        </div>
        <div class="bg-green-950 grid grid-cols-2 grid-rows-1 justify-center items-center rounded-b-2xl sm:rounded-none sm:rounded-r-2xl">
            <p class="text-lg text-gray-300">2 Guests 2 Twin Size Bed 15m2</p>
            <form action="input.php" method="get">
                <input type="hidden" name="roomType" value="standard">
                <button class="px-2 py-3 mr-2 bg-gradient-to-r from-green-900 to-green-950 text-white font-bold rounded-md transition-transform transform-gpu hover:-translate-y-1 hover:shadow-lg md:px-5" type="submit">Check availability</button>
            </form>
        </div>
    </div>
</section>
<section>
    <div class="m-8" id="features">
        <h1 class="flex justify-center text-2xl font-semibold text-green-900">Features</h1>
        <div class="flex flex-col md:flex-row gap-10 items-center justify-center">
            <div class="relative group">
                <h3 class="text-xl text-green-900">Explore the Vineyard</h3>
                <img class="rounded-lg" src="media/vineyard.jpg" alt="vineyard on a hill">
                <div class="opacity-0 group-hover:opacity-100 duration-300 absolute inset-x-0 bottom-0 top-0 flex justify-center text-green-800 bg-white md:text-base overflow-scroll lg:text-xl">
                    <p>
                        Embark on an enchanting journey through our picturesque vineyard, a haven where nature's artistry and winemaking expertise converge. Traverse the verdant landscapes, where sun-drenched grapes await their transformation into liquid gold. Picture yourself strolling amidst the vines, guided by the allure of discovery and the promise of extraordinary flavors.

                        Step into our inviting winery, where every bottle tells a story of terroir and tradition. Our passionate sommeliers await, ready to curate an unforgettable tasting experience. Immerse yourself in the symphony of aromas and notes, each sip a portal to the essence of our region. Join us in savoring the poetry of the vine, and let the journey into exceptional wines become your own.</p>
                </div>

            </div>
            <div class="relative group">
                <h3 class="text-xl text-green-900">Skydiving-package</h3>
                <img class="rounded-lg" src="media/Skydiving.jpg" alt="skydiving over an island">
                <div class="opacity-0 group-hover:opacity-100 duration-300 absolute inset-x-0 bottom-0 top-0 flex justify-center text-green-800 bg-white md:text-base overflow-scroll lg:text-xl">
                    <p>
                        Elevate your stay with an adrenaline-pumping skydiving package around the stunning island of your hotel. Soar to new heights as you free-fall over turquoise waters, capturing breathtaking aerial views of the picturesque coastline and lush landscapes. Experienced instructors ensure a safe and thrilling adventure, making this skydiving experience perfect for both beginners and seasoned thrill-seekers.</p>
                </div>

            </div>
            <div class="relative group">
                <h3 class="text-xl text-green-900">Massage on the beach</h3>
                <img class="rounded-lg" src="media/massageBeach.jpg" alt="woman getting massage on beach">
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
        <button class="bg-green-900 text-white rounded-md p-1 hover:bg-green-700" type="submit">Subscribe</button>
    </form>
</section>

</body>