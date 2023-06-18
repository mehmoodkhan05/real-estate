<?php
    include '../../../_stream/db_config.php';

    $id = $_GET['id'];
    
    $query = mysqli_query($connect, "SELECT * FROM buy_flat WHERE f_buy_id = '$id'");
    $fetch = mysqli_fetch_assoc($query);
    $iid = $fetch['f_id'];

    if ($fetch['b_status'] === '1') {
        $ChangeQuery = mysqli_query($connect, "UPDATE buy_flat SET b_status = '0' WHERE f_buy_id = '$id'");    
        $status = mysqli_query($connect, "UPDATE flats SET f_status = '1' WHERE f_id = '$iid'");

    }elseif ($fetch['b_status'] === '2') {
        $ChangeQuery = mysqli_query($connect, "UPDATE buy_flat SET b_status = '1' WHERE f_buy_id = '$id'");
        $status = mysqli_query($connect, "UPDATE flats SET f_status = '0' WHERE f_id = '$iid'");

    }elseif ($fetch['b_status'] === '0') {
        $ChangeQuery = mysqli_query($connect, "UPDATE buy_flat SET b_status = '2' WHERE f_buy_id = '$id'");    
        $status = mysqli_query($connect, "UPDATE flats SET f_status = '1' WHERE f_id = '$iid'");

    }

    if ($ChangeQuery) {
        header("LOCATION: flatSell.php");
    }
?>