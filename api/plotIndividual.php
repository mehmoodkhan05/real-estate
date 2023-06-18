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
            $getPlots = "SELECT plots.*, plot_gallery.*, owner.o_name, location.loc_name FROM `plots`
            INNER JOIN plot_gallery ON plot_gallery.p_id = plots.p_id
            INNER JOIN owner ON owner.o_id = plots.o_id
            INNER JOIN location ON location.loc_id = plots.p_loc
            WHERE plots.p_status = '1' AND plots.p_id = '$id'
            GROUP BY plots.p_id";
            $statement = $conn -> prepare($getPlots);
            $statement -> execute();
            $plots = $statement -> fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($plots);
            
            break;
    }


?>