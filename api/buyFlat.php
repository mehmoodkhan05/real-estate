<?php
    
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    
    include '../_stream/connection.php';
    
    $objDb = new dbConnect;
    $conn = $objDb -> connect();

    $method = $_SERVER['REQUEST_METHOD'];


    $f_id = $_GET['f_id'];
    $email = $_GET['token'];

    
    switch ($method) {
        case 'POST';
            $Booking = json_decode(file_get_contents("php://input"));
            $BookingQUery = "INSERT INTO buy_flat(name, quoted_price, email, f_id)VALUES(:name, :quoted_price, :email, :f_id)";
            


            $statement = $conn -> prepare($BookingQUery);
            $statement->bindParam(':name', $Booking->name);
            $statement->bindParam(':quoted_price', $Booking->quoted_price);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':f_id', $f_id);

            if ($statement -> execute()) {
                $response = ['status' => 1, 'alert' => 'Booking Added!'];
            }else {
                $response = ['status' => 0, 'alert' => 'Booking Not Added!'];
            }
            echo json_encode($response);
            
            break;
    }


?>