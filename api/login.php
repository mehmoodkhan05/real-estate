<?php
    
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    
    include '../_stream/connection.php';
    
    $objDb = new dbConnect;
    $conn = $objDb -> connect();

    $method = $_SERVER['REQUEST_METHOD'];
    
    switch ($method) {
        case 'GET';
            $login = json_decode(file_get_contents("php://input"));

            $email = trim($login ->email);
            $password = trim($login ->password);

            $loginQuery = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

            $statement = $conn -> prepare($loginQuery);
            // $statement -> execute();
            // $logged = $statement -> fetchAll(PDO::FETCH_ASSOC);

            if ($statement -> execute()) {
                $response = ['status' => 1, 'alert' => 'Success!'];
            }else {
                $response = ['status' => 0, 'alert' => 'Failed!'];
            }
            
            echo json_encode($response);
            break;
    }
?>