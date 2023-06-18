<?php
    
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    
    include '../_stream/connection.php';
    
    $objDb = new dbConnect;
    $conn = $objDb -> connect();

    $method = $_SERVER['REQUEST_METHOD'];
    
    switch ($method) {
        case 'POST';
            $feedBacks = json_decode(file_get_contents("php://input"));
            $queryFeedBack = "INSERT INTO feedback_table(name, email, message)VALUES(:name, :email, :message)";

            $statement = $conn -> prepare($queryFeedBack);
            $statement->bindParam(':name', $feedBacks->name);
            $statement->bindParam(':email', $feedBacks->email);
            $statement->bindParam(':message', $feedBacks->message);

            if ($statement -> execute()) {
                $response = ['status' => 1, 'alert' => 'Thank you for your feedback!'];
            }else {
                $response = ['status' => 0, 'alert' => 'Feedback failed!'];
            }
            echo json_encode($response);
            
            break;
    }


?>