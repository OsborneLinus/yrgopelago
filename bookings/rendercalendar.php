
    <?php
    require_once 'calendar.php';
    require_once 'bookings.php';
    require_once 'bookableCell.php';
    require_once 'input.php';




    // Get current room type
    $roomType = '';
    if (isset($_GET['roomType'])) {
        $roomType = $_GET['roomType'];
    } else if (isset($_POST['roomType'])) {
        $roomType = $_POST['roomType'];
    }
    if (empty($roomType)) {
        echo 'ROOM TYPE IS REQUIRED';
        // ändra till throw
        exit;
    }


    $booking = new Booking(
        'hotel_booking',
        '127.0.0.1',
        'root',
        '',
        $roomType
    );

    $bookableCell = new BookableCell($booking);
    $calendar = new Calendar();

    $calendar->attachObserver('showCell', $bookableCell);

    $bookableCell->routeActions();

    echo $calendar->show();

    ?>
