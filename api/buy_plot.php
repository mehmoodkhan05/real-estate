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
            $plots = "SELECT buy_plot.*, users.name AS user_name, plots.p_price, location.loc_name FROM `buy_plot`
            INNER JOIN users ON users.email = buy_plot.email
            INNER JOIN plots ON plots.p_id = buy_plot.p_id
            INNER JOIN location ON location.loc_id = plots.p_loc
            WHERE users.email = '$id'";
            $statement = $conn -> prepare($plots);
            $statement -> execute();
            $plot = $statement -> fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($plot);
            
            break;
    }


?>