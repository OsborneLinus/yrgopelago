<?php

require_once '/Users/linusholm/Documents/yrgopelago/bookings/bookableCell.php';


if (isset($_POST['email']) && isset($_POST['name'])) {
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['name'] = $_POST['name'];

    header('Location: /mailersend/emailsend.php');
}

?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    <label for="email">Email:</label>
    <input type="email" name="email" required><br>

    <label for="name">Name:</label>
    <input type="text" name="name" required><br>

    <input type="submit" value="Book">
</form>