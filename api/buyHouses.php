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
            $homesBuy = "SELECT house_buy.*, users.u_id, users.name AS user_name, houses.h_price, location.loc_name FROM `house_buy`
            INNER JOIN users ON users.email = house_buy.email
            INNER JOIN houses ON houses.h_id = house_buy.h_id
            INNER JOIN location ON location.loc_id = houses.h_location
            WHERE house_buy.email = '$id'";
            $statement = $conn -> prepare($homesBuy);
            $statement -> execute();
            $house = $statement -> fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($house);
            
            break;
    }


?>