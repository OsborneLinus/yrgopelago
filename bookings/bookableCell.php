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
            // check id dates exist in array
            //  && $_POST['date'] === $cal->getCurrentDate() // old flow with one date, can be an option to check of valid sets date to this value
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


        if (isset($_POST['startDate']) && isset($_POST['endDate'])) {
            $startDate = $_POST['startDate'];
            $endDate = $_POST['endDate'];
            $email = $_SESSION['email'];
            $name = $_SESSION['name'];

            $dates = $this->generateDates($startDate, $endDate);

            foreach ($dates as $date) {
                $this->addBooking($date, $email, $name);
            }

            header('Location: ../mailersend/emailsend.php');
            unset($_SESSION['email']);
            unset($_SESSION['name']);
        }
    }
    public function generateDates(string $startDate, string $endDate): array
    {

        $dates = [];
        $startingDate = new DateTime($startDate);
        $endDate = new DateTime($endDate);
        while ($startingDate < $endDate) {
            $dates[] = $startingDate->format('Y-m-d');
            $startingDate->modify('+1 day');
        }

        return $dates;
    }

    private function openCell(string $date): string
    {
        return '<input type="checkbox" name="date[]" value="' . $date . '">';
    }

    private function bookedCell(string $date): string
    {
        return '<div class="booked" style="background-color: gray;">' . $this->deleteForm($this->bookingId($date)) . '</div>';
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

    private function addBooking(string $date, string $email, string $name): void
    {
        $date = new DateTimeImmutable($date);
        $email = $_SESSION['email'];
        $name = $_SESSION['name'];
        $this->booking->add($date, $email, $name);
    }

    private function bookingForm(string $date): string
    {
        return '<input name="newDates[' . $date . ']" type="checkbox">' .
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
