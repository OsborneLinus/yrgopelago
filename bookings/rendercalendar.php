
    <?php
    require 'calendar.php';
    require 'bookings.php';
    require 'bookableCell.php';


    $booking = new Booking(
        'hotel_booking',
        '127.0.0.1',
        'root',
        ''
    );

    $bookableCell = new BookableCell($booking);
    $calendar = new Calendar();

    $calendar->attachObserver('showCell', $bookableCell);

    $bookableCell->routeActions();


    echo $calendar->show();

    ?>
