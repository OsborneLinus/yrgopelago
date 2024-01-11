<?php

declare(strict_types=1);


session_start();

class BookableCell
{
    /**
     * @var Booking
     */
    private $booking;

    private $currentURL;


    /**
     * BookableCell constructor.
     * @param Booking $booking
     */
    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
        $this->currentURL = htmlentities($_SERVER['REQUEST_URI']);
    }

    public function update(Calendar $cal): string
    {
        if ($this->isDateBooked($cal->getCurrentDate())) {
            return $cal->cellContent =
                $this->bookedCell($cal->getCurrentDate());
        }

        if (
            isset($_POST['newDates']) && count($_POST['newDates']) > 0
            // check if dates exist in array
        ) {

            $this->routeActions();
            $_SESSION['newDates'] = array_keys($_POST['newDates']);
            header('Location: ../input.php');
        }

        return $cal->cellContent = $this->openCell($cal->getCurrentDate());
    }


    public function routeActions(): void
    {
        if (isset($_POST['delete'])) {
            $this->deleteBooking((int)$_POST['id']);
        }

        if (isset($_POST['addNewBooking'])) {


            if (isset($_POST['email']) && isset($_POST['name']) && isset($_POST['transferCode'])) {

                $name = htmlspecialchars($_POST['name']);
                $email = (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
                $transferCode = htmlspecialchars($_POST['transferCode']);
                $dates = array_keys($_POST['newDates']);
                $features = $_POST['features'];


                // validera transferkoden från yrgopelag för att se om den är giltig att betala med.
                $curlHandling = new CurlHandling();
                // make sure that we send the correct data to transfercode validation
                $result = $curlHandling->transferCode($transferCode, $dates, $_GET['roomType']);
                // get the featurecost from curl.php to be able to use it in the body of the email
                $featureCost = $curlHandling->calculateFeatureCost($features);
                // get the totalcost of the stay from curl.php to use it in the body of the email
                $totalcost = $curlHandling->getTotalCost();
                // make sure that the money is being placed on the correct account after validation
                $deposit = $curlHandling->deposit($transferCode);

                // Lägg till värdena i databasen


                foreach ($dates as $date) {
                    $dateTime = DateTimeImmutable::createFromFormat('Y-m-d', $date);

                    $dbState = $this->booking->add($dateTime, $email, $name, $features);
                }

                if ($dbState) {
                    // skicka mail
                    $body = 'Hello ' . $name . '!<br>Welcome to Casa Olive<br>
                    We are happy that you have chosen to stay at Casa Olive and wish you a happy stay. <br> Down below are some important information about your stay: <br>
                    Island: Islandistan <br>
                    Dates: ' . implode(", ", $dates) . '<br>
                    Room Type: ' . ucfirst($_GET['roomType']) . '
                    <br>Feature: ' . ucfirst($_POST['features']) . '
                    <br>Cost for feature: $' . $featureCost .
                        '<br>Totalcost: $' . $totalcost .
                        '<br><br>
                         Mvh Linus Holm ';


                    $mailersendWrapper = new MailersendWrapper;
                    $sendstate = $mailersendWrapper->sendEmail($email, $body);

                    if ($sendstate) {
                        $confirm = '<p class="mt-20"><span class="font-semibold">Thank you for choosing Casa Olive!</span> Your booking has been successfully confirmed. <br> You will receive a confirmation email shortly with all the details.</p>';
                        echo $confirm;
                        $input = '<a id="homepage-btn" href="index.php">Back to Homepage</a>';
                        echo $input;
                        exit;
                    } else {
                        $confirm = '<p class="pt-18">We could not complete the booking. Please try again!</p>';
                        echo $confirm;
                        $input = '<a id="homepage-btn" href="index.php">Back to Homepage</a>';
                        echo $input;
                        exit;
                    }
                }
            } else {
                echo "Not valid parameters for save";
                exit;
            }
        }

        /**
         * Controll input end
         *
         */
    }

    private function openCell(string $date): string
    {
        return '<div class="open">' . $this->bookingForm($date) . '</div>';
    }

    private function bookedCell(string $date): string
    {
        return '<div class="booked">' . $this->deleteForm($this->bookingId($date)) . '</div>';
    }

    private function isDateBooked(string $date): bool
    {
        return in_array($date, $this->bookedDates(), true);
    }

    private function bookedDates(): array
    {
        return array_map(function ($record) {
            return $record['booking_date'];
        }, $this->booking->index());
    }

    private function bookingId(string $date): int
    {
        $booking = array_filter($this->booking->index(), function ($record) use ($date) {
            return $record['booking_date'] == $date;
        });

        $result = array_shift($booking);

        return (int)$result['id'];
    }

    private function deleteBooking(int $id): void
    {
        $this->booking->delete($id);
    }

    private function addBooking(string $date, string $email, string $name, string $roomType): void
    {
        $date = new DateTimeImmutable($date);
        $email = $_SESSION['email'];
        $name = $_SESSION['name'];
        $this->booking->add($date, $email, $name, $roomType);
    }

    private function bookingForm(string $date): string
    {
        return '<input id="calendar-checkbox" name="newDates[' . $date . ']" type="checkbox"/>' .
            '<input class="submit" type="submit" value="Book" />';
    }

    private function deleteForm(int $id): string
    {
        // TODO denna kan du göra om till samma fast omvänt
        $ret = '<form onsubmit="return confirm(\'Are you sure to cancel?\');" method="post" action="' . $this->currentURL . '">' .
            '<input type="hidden" name="delete" />' .
            '<input type="hidden" name="id" value="' . $id . '" />' .
            '<input class="submit" type="submit" value="Delete" />' .
            '</form>';


        return '';
    }
}
