<?php
require 'mailersend/email.php';
require 'bookings/bookings.php';
require 'bookings/curl.php';
require '/Users/linusholm/Documents/yrgopelago/bookings/bookableCell.php';



/**
 * Controll input
 *
 */


// Defines valid room types



/**
 * Controll input end
 *
 */


/*
if (isset($_POST['email']) && isset($_POST['name']) && isset($_POST['transferCode'])) {


    $inputDatabase = new Booking(
        'hotel_booking',
        '127.0.0.1',
        'root',
        '',
        $roomType
    );

    $name = htmlspecialchars($_POST['name']);
    $email = (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $transferCode = htmlspecialchars($_POST['transferCode']);
    $dates = $_SESSION['newDates'];



    // validera transferkoden från yrgopelag för att se om den är giltig att betala med.
    $curlHandling = new CurlHandling();
    // ska ändra värden beroende på klass på rum i framtiden.
    $result = $curlHandling->transferCode($transferCode, '10');
    // Lägg in pengarna på rätt konto efter validering.
    $deposit = $curlHandling->deposit($transferCode);

    // Lägg till värdena i databasen

    foreach ($dates as $date) {
        $dateTime = DateTimeImmutable::createFromFormat('Y-m-d', $date);
        $dbState = $inputDatabase->add($dateTime, $email, $name, $roomType);
    }

    if ($dbState) {
        // skickar du mail
        echo $body = 'Hej ' . $name . '!<br>Välkommen till oss!' . implode(", ", $dates);

        /* $mailersendWrapper = new MailersendWrapper;
        $sendstate = $mailersendWrapper->sendEmail($email, $body);
    }


    /*     if ($sendstate) {
        echo "mailet skickades, skicka mig ngn stans";
    } else {
        echo "mailet skickades INTE, skicka mig ngn stans";
    }
}

*/
?>

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


    <?php require 'bookings/rendercalendar.php'; ?>