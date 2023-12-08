<body>
    <?php
    require 'calendar.php';
    require 'bookings.php';
    require 'bookableCell.php';


    $booking = new Booking(
        'tutorial',
        'localhost',
        'root',
        ''
    );

    $bookableCell = new BookableCell($booking);

    $calendar = new Calendar();

    $calendar->attachObserver('showCell', $bookableCell);

    $bookableCell->routeActions();

    echo $calendar->show();
    ?>
</body>