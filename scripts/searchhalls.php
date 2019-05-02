<?php

require_once 'helpers.php';
require_once 'DB.php';

if (isset($_POST['city']) && isset($_POST['date'])) {
    $input = clean($_POST);
    
    $city = $input['city'];
    $date = $input['date'];

    $sql = "SELECT * FROM `halls` AS h WHERE NOT EXISTS (SELECT id FROM bookings WHERE hall_id = h.id AND date = ?) AND city=?";
    $stmt = DB::query($sql, [
        $date, $city
    ]);

    $halls = $stmt->fetchAll(PDO::FETCH_OBJ);

    if (count($halls) > 0) {
        echo json_encode($halls);
    } else {
        echo '{"failed": true }';
    }
}
