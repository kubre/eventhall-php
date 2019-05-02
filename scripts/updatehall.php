<?php
include_once "session.php";
include_once "checklogin.php";
include_once "DB.php";
include_once "helpers.php";

if (!check()) {
    header('Location: logout.php');
    exit();
}

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

    $isHallCreated = DB::query(
        "UPDATE halls SET  name=?, contact=?, price=?, size=?, adder1=?, adder2=?, city=?, photo1=?, photo2=?, descr=?, password=? WHERE id=?",
        [$name,$contact,$price,$size,$adder1,$adder2,$city,$file1,$file2, $descr, $password, $_SESSION['user']->id]
    );

    if ($isHallCreated) {
        unlink($_SESSION['user']->photo1);
        unlink($_SESSION['user']->photo2);
        header('Location: ../logout.php');
        exit();
    } else {
        unlink('../storage/'.$file1);
        unlink('../storage/'.$file2);
        header('Location: ../logout.php');
        exit();
    }
}
