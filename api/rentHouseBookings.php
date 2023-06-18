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
            $homesRent = "SELECT house_booking.*, users.u_id, users.name AS user_name, houses.h_price, location.loc_name FROM `house_booking`
            INNER JOIN users ON users.email = house_booking.email
            INNER JOIN houses ON houses.h_id = house_booking.h_id
            INNER JOIN location ON location.loc_id = houses.h_location
            WHERE house_booking.email = '$id'";
            $statement = $conn -> prepare($homesRent);
            $statement -> execute();
            $homes = $statement -> fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($homes);
            
            break;
    }


?>