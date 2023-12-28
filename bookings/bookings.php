<?php
class Booking
{
    /* booking constructor
                    Booking constructor.
                    @param string $database
                    @param string $host
                    @param string $databaseUsername
                    @param string $databaseUserPassword
                    */
    private $dbh;
    private $bookingsTable = 'bookings';
    private $roomType;

    public $validRoomTypes = array('superior', 'deluxe', 'standard');


    public function __construct($database, $host, $databaseUsername, $databaseUserPassword, $roomType)
    {

        // Check if current room type is valid
        if (!in_array($roomType, $this->validRoomTypes)) {
            throw new Exception('no valid room value. Valid: ' . implode(' ,', $this->validRoomTypes));
        } else {
            $this->roomType = $roomType;
        }


        try {
            $this->dbh = new PDO(
                sprintf('mysql:host=%s;dbname=%s', $host, $database),
                $databaseUsername,
                $databaseUserPassword
            );
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function index()
    {
        $statement = $this->dbh->prepare('SELECT * FROM ' . $this->bookingsTable . ' WHERE room_type = :roomType');
        $statement->bindParam(':roomType', $this->roomType);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function add(DateTimeImmutable $bookingDate, $email, $name)
    {

        $statement = $this->dbh->prepare(
            'INSERT INTO ' . $this->bookingsTable . ' (booking_date, email, name, room_type) VALUES (:bookingDate, :email, :name, :roomType)'
        );

        if (false === $statement) {
            throw new Exception('Invalid prepare statement');
        }
        $success = $statement->execute([
            ':bookingDate' => $bookingDate->format('Y-m-d'),
            ':email' => $email,
            ':name' => $name,
            ':roomType' => $this->roomType
        ]);
        if ($success) {
            return true;
        } else {
            return false;
        }; {
            throw new Exception(implode(' ', $statement->errorInfo()));
        }
    }
    public function delete($id)
    {
        $statement = $this->dbh->prepare(
            'DELETE from ' . $this->bookingsTable . ' WHERE id = :id'
        );
        if (false === $statement) {
            throw new Exception('Invalid prepare statement');
        }
        if (false === $statement->execute([':id' => $id])) {
            throw new Exception(implode(' ', $statement->errorInfo()));
        }
    }
}
