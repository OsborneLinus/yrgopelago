<?php


require_once '/Users/linusholm/Documents/yrgopelago/bookings/bookableCell.php';
require 'mailersend/email.php';
require 'bookings/bookings.php';
// värdena
if (isset($_POST['email']) && isset($_POST['name'])) {

    $name = htmlspecialchars($_POST['name']);
    $email = (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
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

    <input type="submit" value="Book">
</form>