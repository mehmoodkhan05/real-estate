<?php
    
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    
    include '../_stream/connection.php';
    
    $objDb = new dbConnect;
    $conn = $objDb -> connect();

    $method = $_SERVER['REQUEST_METHOD'];


    $h_id = $_GET['h_id'];
    $email = $_GET['token'];

    
    switch ($method) {
        case 'POST';
            $Booking = json_decode(file_get_contents("php://input"));
            $BookingQUery = "INSERT INTO house_booking(email, booking_date, h_id, name)VALUES(:email, :booking_date, :h_id, :name)";
            


            $statement = $conn -> prepare($BookingQUery);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':booking_date', $Booking->booking_date);
            $statement->bindParam(':h_id', $h_id);
            $statement->bindParam(':name', $Booking->name);

            if ($statement -> execute()) {
                $response = ['status' => 1, 'alert' => 'Booking Added!'];
            }else {
                $response = ['status' => 0, 'alert' => 'Booking Not Added!'];
            }
            echo json_encode($response);
            
            break;
    }


?>