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

        if (isset($_POST['date']) && $_POST['date'] === $cal->getCurrentDate()) {
            $this->routeActions();
            $_SESSION['date'] = $_POST['date'];
            header('Location: ../input.php');
            exit;
        }

        return $cal->cellContent = $this->openCell($cal->getCurrentDate());
    }

    public function routeActions(): void
    {
        if (isset($_POST['delete'])) {
            $this->deleteBooking((int)$_POST['id']);
        }


        if (isset($_SESSION['email']) && isset($_SESSION['name'])) {
            $date = $_SESSION['date'];
            $email = $_SESSION['email'];
            $name = $_SESSION['name'];
            $this->addBooking($date, $email, $name);

            header('Location: ../mailersend/emailsend.php');
            unset($_SESSION['email']);
            unset($_SESSION['name']);
            unset($_SESSION['date']);
        }
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

    private function addBooking(string $date, string $email, string $name): void
    {
        $date = new DateTimeImmutable($date);
        $email = $_SESSION['email'];
        $name = $_SESSION['name'];
        $this->booking->add($date, $email, $name);
    }

    private function bookingForm(string $date): string
    {
        return
            '<form  method="post" action="' . $this->currentURL . '">' .
            '<input type="hidden" name="add" />' .
            '<input type="hidden" name="date" value="' . $date . '" />' .
            '<input class="submit" type="submit" value="Book" />' .
            '</form>';
    }

    private function deleteForm(int $id): string
    {
        return
            '<form onsubmit="return confirm(\'Are you sure to cancel?\');" method="post" action="' . $this->currentURL . '">' .
            '<input type="hidden" name="delete" />' .
            '<input type="hidden" name="id" value="' . $id . '" />' .
            '<input class="submit" type="submit" value="Delete" />' .
            '</form>';
    }
}
