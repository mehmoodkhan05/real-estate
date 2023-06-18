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
            $getRooms = "SELECT rooms.*, room_gallery.*, owner.o_name, location.loc_name FROM `rooms`
            INNER JOIN room_gallery ON room_gallery.r_id = rooms.r_id
            INNER JOIN owner ON owner.o_id = rooms.o_id
            INNER JOIN location ON location.loc_id = rooms.r_loc
            WHERE rooms.r_status = '1' AND rooms.r_id = '$id'
            GROUP BY rooms.r_id";
            $statement = $conn -> prepare($getRooms);
            $statement -> execute();
            $rooms = $statement -> fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($rooms);
            
            break;
    }


?>