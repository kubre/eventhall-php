<?php

require_once 'helpers.php';
require_once 'DB.php';

if (isset($_POST['book'])) {
    $input = clean($_POST);
 
    $hall = $_POST['hall'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contact = $_POST['contact'];
    $adder = $_POST['adder'];
    $date = $_POST['date'];
    $days = $_POST['days'];
    $queries = $_POST['queries'];
    $payment = $_POST['payment'];

    $sql = "INSERT INTO bookings values(DEFAULT, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $isBooked = DB::query($sql, [
        $hall, $fname, $lname, $contact, $adder, $date, $days, $payment, $queries
    ]);

    if ($isBooked) {
        header("Location: ../booking.php?hall=$hall&msg=success");
        exit();
    } else {
        header("Location: ../booking.php?hall=$hall&msg=failed");
        exit();
    }
}
