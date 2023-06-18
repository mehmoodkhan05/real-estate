<?php
    include '../../../_stream/db_config.php';

    $id = $_GET['id'];
    
    $query = mysqli_query($connect, "SELECT * FROM bookinh_room WHERE b_r_id = '$id'");
    $fetch = mysqli_fetch_assoc($query);
    $iid = $fetch['r_id'];

    if ($fetch['b_status'] === '1') {
        $ChangeQuery = mysqli_query($connect, "UPDATE bookinh_room SET b_status = '0' WHERE  b_r_id = '$id'");  
        $status = mysqli_query($connect, "UPDATE rooms SET r_status = '1' WHERE r_id = '$iid'");

    }elseif ($fetch['b_status'] === '2') {
        $ChangeQuery = mysqli_query($connect, "UPDATE bookinh_room SET b_status = '1' WHERE  b_r_id = '$id'");    
        $status = mysqli_query($connect, "UPDATE rooms SET r_status = '0' WHERE r_id = '$iid'");
    }elseif ($fetch['b_status'] === '0') {
        $ChangeQuery = mysqli_query($connect, "UPDATE bookinh_room SET b_status = '2' WHERE  b_r_id = '$id'");   
        $status = mysqli_query($connect, "UPDATE rooms SET r_status = '1' WHERE r_id = '$iid'");

    }

    if ($ChangeQuery) {
        header("LOCATION: roomBooking.php");
    }
?>