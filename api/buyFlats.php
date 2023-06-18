<?php
    
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    
    include '../_stream/connection.php';
    
    $objDb = new dbConnect;
    $conn = $objDb -> connect();

    $method = $_SERVER['REQUEST_METHOD'];
    switch ($method) {
        case 'GET';
            $getFlats = "SELECT flats.*, flat_gallery.*, owner.o_name, location.loc_name FROM `flats`
            INNER JOIN flat_gallery ON flat_gallery.f_id = flats.f_id
            INNER JOIN owner ON owner.o_id = flats.o_id
            INNER JOIN location ON location.loc_id = flats.f_location
            WHERE flats.f_status = '1' AND flats.f_type = '2'
            GROUP BY flats.f_id";
            $statement = $conn -> prepare($getFlats);
            $statement -> execute();
            $flats = $statement -> fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($flats);
            
            break;
    }


?>