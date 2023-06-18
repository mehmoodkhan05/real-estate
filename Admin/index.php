<?php
    include '../_stream/db_config.php';
    
    $valid_login = "";
    if (isset($_POST["log_in_session"])) {
        $user_email = $_POST["user_email"];
        $user_password = $_POST["user_password"];
  
      $select_user_query = "SELECT * FROM `owner` WHERE o_email = '".$user_email."' AND o_password = '".$user_password."'";
      $result_query = mysqli_query($connect, $select_user_query);
  
      $fetch_userQuery = mysqli_fetch_array($result_query);
      
      if (empty($fetch_userQuery)) {
        $valid_login = '<div class="alert alert-danger" style="background:#D52520; color:white; border: none !important;" role="alert">Enter a valid Login</div>';
      }else {
        $user_status = $fetch_userQuery['o_status'];
        $user_role = $fetch_userQuery['o_type'];
        if ($user_status == 1) {
          session_start();
          $_SESSION["user"] = $user_email;
        //   $_SESSION["id"] = $id;

          if ($user_role == '1') {
              header("LOCATION:pages/Dashboard/adminDashboard.php");
          }elseif ($user_role == '2') {
              header("LOCATION:pages/Dashboard/index.php");
          }
          
        }else {
          $valid_login = ' <div class="alert alert-danger" style="background:#D52520; color:white; border: none !important;" role="alert">
              Access Denied!</div>';
        }
      }
  }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="./login_assets/css/style.css">

    <style>
        .submit:hover {
            background-color: #855417 !important;
            color: white !important;
            border: none !important;
        } 

        .heading {
            font-family: Georgia !important;
            font-weight: 100 !important
        }
    </style>
</head>
<body class="img js-fullheight background" style="background-image: url(./login_assets/images/1.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	    <h3 class="mb-4 text-center heading">Real Estate Admin</h3>
                    <br />
		      	    <form class="signin-form"  method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" name="user_email" placeholder="Email" required>
                        </div>

                        <div class="form-group">
                            <input id="password-field" name="user_password" type="password" class="form-control" placeholder="Password" required>
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>

                        <br />

                        <div class="form-group">
                            <button  type="submit" name="log_in_session" class="form-control btn btn-primary submit px-3">Sign In</button>
                        </div>

                        <h5 align="center"><?php echo $valid_login ?></h5>
	                </form>
		        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="./login_assets/js/jquery.min.js"></script>
    <script src="./login_assets/js/popper.js"></script>
    <script src="./login_assets/js/bootstrap.min.js"></script>
    <script src="./login_assets/js/main.js"></script>
</body>
</html>