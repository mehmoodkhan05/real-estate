<?php
    
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    
    include '../_stream/connection.php';
    
    $objDb = new dbConnect;
    $conn = $objDb -> connect();

    $method = $_SERVER['REQUEST_METHOD'];


    $p_id = $_GET['p_id'];
    $email = $_GET['token'];

    
    switch ($method) {
        case 'POST';
            $Booking = json_decode(file_get_contents("php://input"));
            $BookingQUery = "INSERT INTO buy_plot(email, p_id, name, quote_price)VALUES(:email, :p_id, :name, :quote_price)";
            


            $statement = $conn -> prepare($BookingQUery);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':name', $Booking->name);
            $statement->bindParam(':p_id', $p_id);
            $statement->bindParam(':quote_price', $Booking->quote_price);

            if ($statement -> execute()) {
                $response = ['status' => 1, 'alert' => 'Booking Added!'];
            }else {
                $response = ['status' => 0, 'alert' => 'Booking Not Added!'];
            }
            echo json_encode($response);
            
            break;
    }


?>