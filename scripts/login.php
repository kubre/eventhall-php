<?php

require_once 'session.php';
require_once 'DB.php';
require_once 'helpers.php';

if (isset($_POST['login'])) {
    $input = clean($_POST);

    $contact = $input['contact'];
    $password = $input['password'];

    if ($contact == "9090908080" && $password == "admin") {
        $s = new stdClass();
        $s->name = "admin";
        $_SESSION['user'] = $s;

        header('Location: ../admin.php');
        exit();
    } else {
        $stmt = DB::query(
            "SELECT * FROM halls WHERE contact=? AND password=?",
            [$contact , $password]
        );
        $hall = $stmt->fetch(PDO::FETCH_OBJ);

        if (isset($hall->name)) {
            $_SESSION['user'] = $hall;
            header('Location: ../hall.php');
            exit();
        } else {
            header('Location: ../login.php?msg=failed');
            exit();
        }
    }
}
