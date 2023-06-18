<?php
    include '../../../_stream/db_config.php';

    $id = $_GET['id'];
    $f_id = $_GET['f_id'];

    $deleteQuery = mysqli_query($connect, "DELETE FROM `flat_gallery` WHERE gallery_id = '$id'");

    if ($deleteQuery) {
        header("LOCATION: addGallery.php?id=".$f_id."");
    }
?>