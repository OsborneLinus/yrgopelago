<?php


require_once '/Users/linusholm/Documents/yrgopelago/bookings/bookableCell.php';
require 'mailersend/email.php';
require 'bookings/bookings.php';
require 'bookings/curl.php';

// värdena
if (isset($_POST['email']) && isset($_POST['name']) && isset($_POST['transferCode'])) {

    $name = htmlspecialchars($_POST['name']);
    $email = (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $transferCode = htmlspecialchars($_POST['transferCode']);
    $date = $_SESSION['date'];
    $dateTime = DateTimeImmutable::createFromFormat('Y-m-d', $date);
    $body = 'Hej ' . $name . '!<br>Välkommen till oss!' . $date;


    // spara DB

    $inputDatabase = new Booking(
        'hotel_booking',
        '127.0.0.1',
        'root',
        ''
    );

    // validera transferkoden från yrgopelag för att se om den är giltig att betala med.
    $curlHandling = new CurlHandling();
    // ska ändra värden beroende på klass på rum i framtiden.
    $result = $curlHandling->transferCode($transferCode, '10');
    // Lägg in pengarna på rätt konto efter validering.
    $deposit = $curlHandling->deposit($transferCode);

    // Lägg till värdena i databasen
    $dbState = $inputDatabase->add($dateTime, $email, $name);

    if ($dbState) {
        // skickar du mail
        $mailersendWrapper = new MailersendWrapper;
        $sendstate = $mailersendWrapper->sendEmail($email, $body);
    }


    if ($sendstate) {
        echo "mailet skickades, skicka mig ngn stans";
    } else {
        echo "mailet skickades INTE, skicka mig ngn stans";
    }
}

?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    <label for="email">Email:</label>
    <input type="email" name="email" required><br>

    <label for="name">Name:</label>
    <input type="text" name="name" required><br>

    <label for="transferCode">TransferCode: </label>
    <input type="text" name="transferCode" required>

    <input type="submit" value="Book">
</form>