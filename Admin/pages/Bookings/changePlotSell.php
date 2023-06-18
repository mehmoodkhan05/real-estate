<?php
    include '../../../_stream/db_config.php';

    $id = $_GET['id'];
    
    $query = mysqli_query($connect, "SELECT * FROM buy_plot WHERE b_p_id = '$id'");
    $fetch = mysqli_fetch_assoc($query);
    $iid = $fetch['p_id'];


    if ($fetch['b_status'] === '1') {
        $ChangeQuery = mysqli_query($connect, "UPDATE buy_plot SET b_status = '0' WHERE b_p_id = '$id'");    
        $status = mysqli_query($connect, "UPDATE plots SET p_status = '1' WHERE p_id = '$iid'");

    }elseif ($fetch['b_status'] === '2') {
        $ChangeQuery = mysqli_query($connect, "UPDATE buy_plot SET b_status = '1' WHERE b_p_id = '$id'"); 
        $status = mysqli_query($connect, "UPDATE plots SET p_status = '0' WHERE p_id = '$iid'");
    }elseif ($fetch['b_status'] === '0') {
        $ChangeQuery = mysqli_query($connect, "UPDATE buy_plot SET b_status = '2' WHERE b_p_id = '$id'");    
        $status = mysqli_query($connect, "UPDATE plots SET p_status = '1' WHERE p_id = '$iid'");

    }

    

    if ($ChangeQuery) {
        header("LOCATION: flatSell.php");
    }
?>