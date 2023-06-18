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
            $flatRent = "SELECT buy_flat.*, users.name AS user_name, flats.f_price, location.loc_name FROM `buy_flat`
            INNER JOIN users ON users.email = buy_flat.email
            INNER JOIN flats ON flats.f_id = buy_flat.f_id
            INNER JOIN location ON location.loc_id = flats.f_location
            WHERE buy_flat.email = '$id'";
            $statement = $conn -> prepare($flatRent);
            $statement -> execute();
            $flat = $statement -> fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($flat);
            
            break;
    }


?>