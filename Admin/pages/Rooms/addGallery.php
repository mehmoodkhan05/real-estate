<?php
    include '../../../_stream/db_config.php';

    $alert = '';

    $r_id = $_GET['id'];

    if (isset($_POST["add_gallery"])) {
        $o_id = $_POST['o_id'];
        $r_id = $_POST['r_id'];

        $file = $_FILES['fileUpload'];
        $file_name = $file['name'];
        $file_name = preg_replace("/\s+/", "", $file_name);
        $temp = $file['tmp_name'];

        $file_ext  = pathinfo($file_name,PATHINFO_EXTENSION);
        $file_name = pathinfo($file_name,PATHINFO_FILENAME);

        $newName = $file_name.date("miYis").'.'.$file_ext;

        $saveto = "../../../src/images/".$newName;

        if (move_uploaded_file($temp, $saveto)) {
            // echo "Done";
        }else{
            echo "Error File Uploading";
        }

        $addGalleryQuery = mysqli_query($connect, "INSERT INTO room_gallery(g_img, o_id, r_id)VALUES('$newName', '$o_id', '$r_id')");
        if ($addGalleryQuery) {
            echo '<script>window.location.href = addGallery.php?id='.$r_id.'</script>';
        }
    }

    include '../../includes/header.php';

?>


<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Rooms</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Add Room Gallery</h5>
                    </div>
                    <form class="form theme-form" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <input type="hidden" name="o_id" value="<?php echo $fetch_query['o_id'] ?>">
                            <input type="hidden" name="r_id" value="<?php echo $r_id ?>">
                            
                            <div class="row">
                                <div class="col-12">
                                    <input type="file" name="fileUpload" required="" class="btn btn-default">
                                </div>
                            </div>

                            <div class="card-footer text-end">
                                <button class="btn btn-primary" type="submit" name="add_gallery">Submit</button>
                                <a href="roomsList.php" class="btn btn-light">Cancel</a>
                            </div>

                            <?php echo  $alert; ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->


    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Room Gallery</h5>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <?php
                            $o_id = $fetch_query['o_id'];
                            $getHouseGallery = mysqli_query($connect, "SELECT * FROM room_gallery WHERE o_id = '$o_id' AND r_id = '$r_id'");
                            
                            $count = mysqli_num_rows($getHouseGallery);

                            if ($count < 1) {
                                echo '
                                <div class="col-12">
                                    <h3 class="text-center">No image found!</h3>
                                </div>
                                ';
                            }else {
                                while ($rowGallery = mysqli_fetch_assoc($getHouseGallery)) {
                                    echo '
                                    <div class="col-4">
                                        <img src="../../../src/images/'.$rowGallery['g_img'].'" class="img-thumbnail" style="object-position: center center !important" width="100%">
                                        <hr>
                                        <a href="deleteImage.php?id='.$rowGallery['gallery_id'].'&r_id='.$r_id.'" style="width: 100%" class="btn btn-danger" >Delete</a>
                                    </div>
                                    ';
                                }
                            }

                            
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>

<?php
    include '../../includes/footer.php'
?>

<script>
    $(document).ready(function() {
        $('.inputClass').select2();
    });
</script>