

# ISLANDISTAN

The island is actually many smaller islands, that have everything for everyone. You have the lovely beaches where you can roam all day, drink cocktails from our local bars. We also have an island with lovely mountain range where you can hike if you want to do something more than just lying on the beach. 
The wildlife is all that you can want from a tropical island, you can spot apes in the jungle and elephants roaming around basically everywhere except on the beach. But be careful because there are more dangerous creatues on the island aswell.
There are deadly snakes and spiders, but don't worry our hotel staff are trained to take care of you if the accident is close. 

# CASA OLIVE

The hotel of your dreams, we have everything to offer from a local wine made at our own vineyard, skydiving done with our own planes and staff at the hotel. And also the lovely beaches where you can drink drinks and eat food from the best bartenders and chefs in the whole wide world. 
From this trip you will go from here and want more. 
We offer three different hotel rooms, the Standard, the Deluxe and the Superior. All of them with exceptional standards, but differents sizes and bed types. You want too spend more time in the hotel room with an amazing view, then it's 100% worth it to pay more money to get more out of your stay. 

# Instructions
In my project i am using vanilla PHP, with vanilla javascript. 

The project is using Tailwind CSS via the CDN URL that is added at the top of the page. If going for a larger project it will need to be installed with NPM Install tailwindcss 

# mySQL 

For use of the database structure you need to install mySQL to your computer or use an online hosting site for the setup of mySQL. 
I have installed SQLTools as an extension in VScode for me to be able to see the database inside vsCode at all times. 

# Mailersend
To send emails to the end user after a successfull booking i am using mailersend API, 
https://developers.mailersend.com/?_gl=1*fppzr0*_gcl_aw*R0NMLjE3MDIyOTI4NzIuQ2p3S0NBaUFnOXVyQmhCX0Vpd0Fndzg4bVR5M2FmZU9JS01neElZcWl0Z3NvelNnOEN4Z3U3bWFhY0dleEJYNHRZMzg5eFJiSnd0NnV4b0N6NGNRQXZEX0J3RQ..*_gcl_au*MTU4ODg1MzcxMS4xNzAxOTU5MjI2 

For installation of the mailersend: 
composer require php-http/guzzle7-adapter nyholm/psr7 
Installation of the SDK: 
composer require mailersend/mailersend
Full setup and guide of use can be found via: https://github.com/mailersend/mailersend-php?tab=readme-ov-file#installation 

# cURL Fetch 
The curl fetch on curl.php, is fetching data from https://www.yrgopelag.se/centralbank/ - This site generates the transfercodes for the transaction, and the API has built in logic to check if a transfercode have been used or not. 

# Calendar 
The foundation for my site is the calendar which i have copied from this site: https://startutorial.com/view/how-to-build-a-php-booking-calendar-with-mysql 
No external downloads required for this calendar to work. 

# Code review

1. input.php:5 - Instead of hard coding the path use `__DIR__`.
2. index.php:7 - body.php seams to be only required in index.php, move body.php directly in to index.php would make it more clear that it is the home page.
3. body.php:44-47, 55-58, 73-76 - The form acts like a link to the input.php with query roomType, it's cleaner to use an `<a>` tag and include the formType in the href `/input.php?roomType=superior` no need for a hidden input field.
4. rendercalendar.php:2-5 - no such file as input.php in bookings folder, bookings.php and bookableCell is already required in input.php from the root directory which requires reandercalender.php
5. rendercalendar.php:8-13 - roomType comes from the form with method GET but roomType POST is set in the calender but dose not seam to be used in the context of rendercalendar.php so this can be done in a one liner `$roomType = $_GET["roomType"] ?? ""`
6. rendercalendar.php:14-18 - If roomType is not set you echo this to the user, but maybe give an option to select a room or navigate them to the home page where the rooms are located.
7. app.js:5-24 - Nested if/else statements looks a bit messy, maybe the nested if else that check if entry contains second-slide could be in a variable `isSecondSlide` and use it in a ternary operator as the argument in the add() method to conditionally add scroll-animation or scroll-animation-right. You are removing both classes from the same entry with two remove functions the remove() method takes multiple strings as an argument `remove('scroll-animation', 'scroll-animation-right')`
8. app.js:26-29 - The for loop that sets an intersection observer on all animation elements works great but this could be done in a one liner as well with a forEach e.g `theAnimation.forEach((animation) => observer.observe(animation));`
9. app.js:43-91 - This seams to be specific for input.php page where you book the room maybe have this in a separate js file and only use it when a user is on that page, when you are on index.php you get a typeError in the console that parentNode from book-btn is null
10. app.js:68-86 - A lot of if else checks this would be a bit cleaner with a switch case instead and i see a potential issue if you would change the price of the rooms your js code would not know about the price change unless you remember to update the price in the js file as well.
