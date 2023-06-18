<?php
    
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    
    include '../_stream/connection.php';
    
    $objDb = new dbConnect;
    $conn = $objDb -> connect();

    $method = $_SERVER['REQUEST_METHOD'];
    
    switch ($method) {
        case 'POST';
            $Register = json_decode(file_get_contents("php://input"));
            $RegisterQuery = "INSERT INTO users(name, contact, email, password, address)VALUES(:name, :contact, :email, :password, :address)";

            $statement = $conn -> prepare($RegisterQuery);
            $statement->bindParam(':name', $Register->name);
            $statement->bindParam(':contact', $Register->contact);
            $statement->bindParam(':email', $Register->email);
            $statement->bindParam(':password', $Register->password);
            $statement->bindParam(':address', $Register->address);

            if ($statement -> execute()) {
                $response = ['status' => 1, 'alert' => 'User Added!'];
            }else {
                $response = ['status' => 0, 'alert' => 'User Not Added!'];
            }
            echo json_encode($response);
            
            break;
    }


?>