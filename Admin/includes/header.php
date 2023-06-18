<?php
  include '../../../_stream/db_config.php';

    session_start();
    if (empty($_SESSION["user"])) {
        header("LOCATION:../index.php");
    }

    $sesssionEmail = $_SESSION["user"];
    $query = mysqli_query($connect, "SELECT * FROM `owner` WHERE o_email = '$sesssionEmail'");
    $fetch_query = mysqli_fetch_assoc($query);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../../assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../../assets/images/favicon.png" type="image/x-icon">
    <title>Real E-State Swat</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/fontawesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/chartist.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/date-picker.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/prism.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/vector-map.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    <link id="color" rel="stylesheet" href="../../assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/responsive.css">

    <link rel="stylesheet" type="text/css" href="../../assets/css/datatables.css">
    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />



    <style>
      .table {
          overflow-x: hidden !important;
      }
  </style>
  </head>
  <body>
    <!-- Loader starts-->
    <!-- <div class="loader-wrapper">
      <div class="theme-loader">    
        <div class="loader-p"></div>
      </div>
    </div> -->
    <!-- Loader ends-->
    <!-- page-wrapper Start -->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
      <div class="page-main-header">
        <div class="main-header-right row m-0">
          <div class="main-header-left">
            <div class="logo-wrapper"><h4>Real E-State</h4></div>
            <div class="dark-logo-wrapper"><a href="index.html"><img class="img-fluid" src="../../assets/images/logo-1/dark-logo.png" alt=""></a></div>
            <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle"></i></div>
          </div>
          
          <div class="nav-right col pull-right right-menu p-0">
            <ul class="nav-menus">
              <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
              <li class="onhover-dropdown p-0">
                <button class="btn btn-primary-light" type="button"><a href="../Signout/signout.php"><i data-feather="log-out"></i>Log out</a></button>
              </li>
            </ul>
          </div>
          <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
        </div>
      </div>
      
      <!-- Page Header Ends -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper sidebar-icon">
        <!-- Page Sidebar Start-->
        <header class="main-nav">
          <?php
          if ($fetch_query['o_type'] === '1') {
            echo '
            <div class="sidebar-user text-center"><img class="img-90 rounded-circle" src="../../assets/images/dashboard/1.png" alt="">
              <a href="../Profile/profile.php?id='.$fetch_query['o_id'].'">
                <h6 class="mt-3 f-14 f-w-600">'.$fetch_query['o_name'].'</h6>
              </a>
              <p class="mb-0 font-roboto">Admin</p>
            </div>
            ';
          }elseif ($fetch_query['o_type'] === '2') {
            echo '
            <div class="sidebar-user text-center"><img class="img-90 rounded-circle" src="../../assets/images/dashboard/1.png" alt="">
              <a href="../Profile/profile.php?id='.$fetch_query['o_id'].'">
                <h6 class="mt-3 f-14 f-w-600">'.$fetch_query['o_name'].'</h6>
              </a>
              <p class="mb-0 font-roboto">Property Owner</p>
            </div>
            ';
          } 
          ?>
          
          <nav>
            <div class="main-navbar">
              <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
              <div id="mainnav">           
                <ul class="nav-menu custom-scrollbar">
                  <li class="back-btn">
                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                  </li>
                  <li class="sidebar-main-title">
                    <div>
                      <h6>General</h6>
                    </div>
                  </li>

                  <?php
                    if ($fetch_query['o_type'] === '1') {               
                  ?>
                  <li class="dropdown"><a class="nav-link menu-title link-nav" href="../Dashboard/adminDashboard.php"><i data-feather="command"></i><span>Dashboard</span></a></li>
                  
                  
                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="map-pin"></i><span>Location</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="../Location/addLocation.php">Add Location</a></li>
                      <li><a href="../Location/locationList.php">Location List</a></li>
                    </ul>
                  </li>

                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="layout"></i><span>Owners</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="../RegisteredOwners/addOwner.php">Add Owner</a></li>
                      <li><a href="../RegisteredOwners/adminList.php">Admin List</a></li>
                      <li><a href="../RegisteredOwners/ownersList.php">Owners List</a></li>
                    </ul>
                  </li>

                  <li class="sidebar-main-title">
                    <div>
                      <h6>Components</h6>
                    </div>
                  </li>


                  <li class="dropdown"><a class="nav-link menu-title link-nav" href="../AdminView/housesList.php"><i data-feather="home"></i><span>Houses List</span></a></li>
                  <li class="dropdown"><a class="nav-link menu-title link-nav" href="../AdminView/roomsList.php"><i data-feather="home"></i><span>Rooms List</span></a></li>
                  <li class="dropdown"><a class="nav-link menu-title link-nav" href="../AdminView/plotsList.php"><i data-feather="home"></i><span>Plots List</span></a></li>
                  <li class="dropdown"><a class="nav-link menu-title link-nav" href="../AdminView/flatsList.php"><i data-feather="home"></i><span>Flats List</span></a></li>
                    
                  <li class="sidebar-main-title">
                    <div>
                      <h6>Contact</h6>
                    </div>
                  </li>

                  <li class="dropdown"><a class="nav-link menu-title link-nav" href="../Contact/contact.php"><i data-feather="phone"></i><span>Contact</span></a></li>

                  <?php
                  }elseif ($fetch_query['o_type'] === '2') {
                  ?>

                  
                  <li class="dropdown"><a class="nav-link menu-title link-nav" href="../Dashboard/index.php"><i data-feather="command"></i><span>Dashboard</span></a></li>

                  <li class="sidebar-main-title">
                    <div>
                      <h6>Components</h6>
                    </div>
                  </li>

                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="home"></i><span>Houses</span></a>
                  <ul class="nav-submenu menu-content">
                      <li><a href="../Houses/addHouses.php">Add Houses</a></li>
                      <li><a href="../Houses/housesList.php">Houses List</a></li>
                    </ul>
                  </li>


                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="home"></i><span>Rooms</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="../Rooms/addRooms.php">Add Rooms</a></li>
                      <li><a href="../Rooms/roomsList.php">Rooms List</a></li>
                    </ul>
                  </li>


                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="home"></i><span>Plots</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="../Plots/addPlots.php">Add Plots</a></li>
                      <li><a href="../Plots/plotsList.php">Plots List</a></li>
                    </ul>
                  </li>


                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="home"></i><span>Flats</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="../Flats/addFlats.php">Add Flats</a></li>
                      <li><a href="../Flats/flatsList.php">Flats List</a></li>
                    </ul>
                  </li>



                  

                  <li class="sidebar-main-title">
                    <div>
                      <h6>Bookings</h6>
                    </div>
                  </li>


                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="list"></i><span>Bookings</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="../Bookings/bookingList.php">Rent Houses Booking</a></li>
                      <li><a href="../Bookings/sellHouse.php">Sell Houses Booking</a></li>
                      <li><a href="../Bookings/rentFlat.php">Rent Flats Booking</a></li>
                      <li><a href="../Bookings/flatSell.php">Sell Flats Booking</a></li>
                      <li><a href="../Bookings/plotsBookings.php">Plots Booking</a></li>
                      <li><a href="../Bookings/roomBooking.php">Rooms Booking</a></li>
                    </ul>
                  </li>

                  <?php
                  }             
                  ?>
                </div>
            </div>
          </nav>
        </header>