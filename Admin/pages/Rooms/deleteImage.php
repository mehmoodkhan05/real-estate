<?php
    include '../../../_stream/db_config.php';

    $id = $_GET['id'];
    $r_id = $_GET['r_id'];

    $deleteQuery = mysqli_query($connect, "DELETE FROM `room_gallery` WHERE gallery_id = '$id'");

    if ($deleteQuery) {
        header("LOCATION: addGallery.php?id=".$r_id."");
    }
?>