<?php
    include '../../../_stream/db_config.php';

    $id = $_GET['id'];
    $p_id = $_GET['p_id'];

    $deleteQuery = mysqli_query($connect, "DELETE FROM `plot_gallery` WHERE gallery_id = '$id'");

    if ($deleteQuery) {
        header("LOCATION: addGallery.php?id=".$p_id."");
    }
?>