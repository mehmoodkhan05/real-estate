<?php
    
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    
    include '../_stream/connection.php';
    
    $objDb = new dbConnect;
    $conn = $objDb -> connect();

    $method = $_SERVER['REQUEST_METHOD'];
    
    $id = $_GET['id'];

    switch ($method) {
            case 'GET';
            $rooms = "SELECT bookinh_room.*, users.name AS user_name, rooms.r_price, location.loc_name FROM `bookinh_room`
            INNER JOIN users ON users.email = bookinh_room.email
            INNER JOIN rooms ON rooms.r_id = bookinh_room.r_id
            INNER JOIN location ON location.loc_id = rooms.r_loc;
            WHERE users.email = '$id'";
            $statement = $conn -> prepare($rooms);
            $statement -> execute();
            $room = $statement -> fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($room);
            
            break;
    }


?>