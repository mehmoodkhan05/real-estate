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
            $getHouses = "SELECT houses.*, house_gallery.*, owner.o_name, location.loc_name FROM `houses`
            INNER JOIN house_gallery ON house_gallery.h_id = houses.h_id
            INNER JOIN owner ON owner.o_id = houses.o_id
            INNER JOIN location ON location.loc_id = houses.h_location
            WHERE houses.h_status = '1' AND houses.h_id = '$id'
            GROUP BY houses.h_id";
            $statement = $conn -> prepare($getHouses);
            $statement -> execute();
            $houses = $statement -> fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($houses);
            
            break;
    }


?>