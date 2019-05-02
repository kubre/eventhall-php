<?php

require_once 'session.php';
require_once 'DB.php';
require_once 'helpers.php';

if (isset($_POST['register'])) {
    $input = clean($_POST);

    $name = $input['name'];
    $contact = $input['contact'];
    $price = $input['price'];
    $descr = $input['descr'];
    $size = $input['size'];
    $adder1 = $input['adder1'];
    $adder2 = $input['adder2'];
    $city = $input['city'];
    $password = $input['password'];

    $photo1 = $_FILES['photo1'];
    $photo2 = $_FILES['photo2'];

    $file1 = upload($photo1);
    $file2 = upload($photo2);

    if ($file1 == false || $file2 == false) {
        header('Location', '../register.php?msg=file');
        exit();
    }

    $isHallCreated = DB::query("INSERT INTO halls values(DEFAULT, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", [
            $name,$contact,$price,$descr,$size,$adder1,$adder2,$city,$password,$file1,$file2
        ]);

    if ($isHallCreated) {
        header('Location: ../register.php?msg=success');
        exit();
    } else {
        unlink('../storage/'.$file1);
        unlink('../storage/'.$file2);
        header('Location: ../register.php?msg=failed');
        exit();
    }
}
