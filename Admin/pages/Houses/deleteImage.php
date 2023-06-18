<?php
    include '../../../_stream/db_config.php';

    $id = $_GET['id'];
    $h_id = $_GET['h_id'];

    $deleteQuery = mysqli_query($connect, "DELETE FROM `house_gallery` WHERE gallery_id = '$id'");

    if ($deleteQuery) {
        header("LOCATION: addGallery.php?id=".$h_id."");
    }
?>