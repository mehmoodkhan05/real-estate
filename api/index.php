<?php
    
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    
    include '../_stream/connection.php';
    
    $objDb = new dbConnect;
    $conn = $objDb -> connect();

    $method = $_SERVER['REQUEST_METHOD'];
    switch ($method) {
        case 'GET';
            $getLocation = "SELECT * FROM location";
            $statement = $conn -> prepare($getLocation);
            $statement -> execute();
            $locations = $statement -> fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($locations);
            
            break;
    }


?>