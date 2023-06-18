<?php
    
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    
    include '../_stream/connection.php';
    
    $objDb = new dbConnect;
    $conn = $objDb -> connect();

    $method = $_SERVER['REQUEST_METHOD'];


    $r_id = $_GET['r_id'];
    $email = $_GET['token'];

    
    switch ($method) {
        case 'POST';
            $Booking = json_decode(file_get_contents("php://input"));
            $BookingQUery = "INSERT INTO bookinh_room(name, booking_date, booking_days, email, r_id)VALUES(:name, :booking_date, :booking_days, :email, :r_id)";
            


            $statement = $conn -> prepare($BookingQUery);
            $statement->bindParam(':name', $Booking->name);
            $statement->bindParam(':booking_date', $Booking->booking_date);
            $statement->bindParam(':booking_days', $Booking->booking_days);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':r_id', $r_id);

            if ($statement -> execute()) {
                $response = ['status' => 1, 'alert' => 'Booking Added!'];
            }else {
                $response = ['status' => 0, 'alert' => 'Booking Not Added!'];
            }
            echo json_encode($response);
            
            break;
    }


?>