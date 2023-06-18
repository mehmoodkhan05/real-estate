<?php
    include '../../../_stream/db_config.php';

    $id = $_GET['id'];
    
    $query = mysqli_query($connect, "SELECT * FROM house_buy WHERE h_buy_id = '$id'");
    $fetch = mysqli_fetch_assoc($query);
    $iid = $fetch['h_id'];

    if ($fetch['b_status'] === '1') {
        $ChangeQuery = mysqli_query($connect, "UPDATE house_buy SET b_status = '0' WHERE h_buy_id = '$id'");    
        $status = mysqli_query($connect, "UPDATE houses SET h_status = '1' WHERE h_id = '$iid'");

    }elseif ($fetch['b_status'] === '2') {
        $ChangeQuery = mysqli_query($connect, "UPDATE house_buy SET b_status = '1' WHERE h_buy_id = '$id'");    
        $status = mysqli_query($connect, "UPDATE houses SET h_status = '0' WHERE h_id = '$iid'");

    }elseif ($fetch['b_status'] === '0') {
        $ChangeQuery = mysqli_query($connect, "UPDATE house_buy SET b_status = '2' WHERE h_buy_id = '$id'");   
        $status = mysqli_query($connect, "UPDATE houses SET h_status = '1' WHERE h_id = '$iid'");

    }

    

    if ($ChangeQuery) {
        header("LOCATION: sellHouse.php");
    }
?>