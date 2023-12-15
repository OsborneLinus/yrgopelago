 <?php
/*
require_once 'bookings.php';

// Instantiate the Booking class
$booking = new Booking('hotel_booking', '127.0.0.1', 'root', '');

// Handle the AJAX request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the action parameter from the AJAX request
    $action = $_POST['action'];

    // Perform the corresponding action based on the value of the action parameter
    if ($action === 'add') {
        // Retrieve the booking date from the AJAX request
        $bookingDate = new DateTimeImmutable($_POST['booking_date']);

        // Add the booking
        $booking->add($bookingDate);

        // Return a success response
        header('Content-Type: application/json');
        echo json_encode(['success' => true]);
        exit;
    } elseif ($action === 'delete') {
        // Retrieve the booking ID from the AJAX request
        $bookingId = $_POST['booking_id'];

        // Delete the booking
        $booking->delete($bookingId);

        // Return a success response
        header('Content-Type: application/json');
        echo json_encode(['success' => true]);
        exit;
    }
}

// Handle other AJAX requests or return an error response if needed
echo json_encode(['success' => false, 'message' => 'Invalid request']); */
