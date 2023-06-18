<?php

    include '../../../_stream/db_config.php';
    

    $alert = '';

    $loc_id = $_GET['loc_id'];

    $getLocation = mysqli_query($connect, "SELECT * FROM `location` WHERE loc_id = '$loc_id'");
    $fetch_getLocation = mysqli_fetch_assoc($getLocation);

    if (isset($_POST['edit_area'])) {
        $area_name = $_POST['area_name'];
        $id = $_POST['id'];

        $countQuery = mysqli_query($connect, "SELECT COUNT(*) AS countedArea FROM `location` WHERE loc_name = '$area_name'");
        $fetch_countQuery = mysqli_fetch_assoc($countQuery);

        if ($fetch_countQuery['countedArea'] < 1) {
            $updateQuery = mysqli_query($connect, "UPDATE `location` SET loc_name = '$area_name' WHERE loc_id = '$id'");

            if ($updateQuery) {
                header("LOCATION: locationList.php");
            }else {
                $alert = '
                <div class="alert alert-danger text-center rounded-pill">
                    <strong>Area Not Added!</strong>
                </div>
                ';
            }
        }else {
            $alert = '
            <div class="alert alert-warning text-center rounded-pill">
                <strong>Area Already Added!</strong>
            </div>
            ';
        }
    }




    include '../../includes/header.php';
?>


<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Location</h3>
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
            <h5>Edit Location</h5>
            </div>
            <form class="form theme-form" method="POST">
            <div class="card-body">
                <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label class="form-label">Location Name</label>
                        <input class="form-control btn-pill" value="<?php echo $fetch_getLocation['loc_name'] ?>"  type="text" name="area_name" placeholder="Example: Kalam" required>
                    </div>
                    <input type="hidden" value="<?php echo $loc_id ?>" name="id">
                </div>
                </div>

                <?php echo $alert; ?>
            </div>
            <div class="card-footer text-end">
                <button class="btn btn-primary" type="submit" name="edit_area">Update</button>
                <a href="locationList.php" class="btn btn-light">Cancel</a>
            </div>
            
            </form>
        </div>
        </div>
    </div>
    </div>
    <!-- Container-fluid Ends-->
</div>

<?php
    include '../../includes/footer.php'
?>