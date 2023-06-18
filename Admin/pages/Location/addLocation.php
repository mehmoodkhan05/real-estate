<?php

    include '../../../_stream/db_config.php';
    

    $alert = '';

    if (isset($_POST['add_area'])) {
        $area_name = $_POST['area_name'];

        $countQuery = mysqli_query($connect, "SELECT COUNT(*) AS countedArea FROM `location` WHERE loc_name = '$area_name'");
        $fetch_countQuery = mysqli_fetch_assoc($countQuery);

        if ($fetch_countQuery['countedArea'] < 1) {
            $insertQuery = mysqli_query($connect, "INSERT INTO `location`(loc_name)VALUES('$area_name')");

            if ($insertQuery) {
                $alert = '
                <div class="alert alert-success text-center rounded-pill">
                    <strong>Area Added!</strong>
                </div>
                ';
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
            <h5>Add Location</h5>
            </div>
            <form class="form theme-form" method="POST">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                        <label class="form-label">Location Name</label>
                        <input class="form-control btn-pill"  type="text" name="area_name" placeholder="Example: Kalam" required>
                        </div>
                    </div>
                </div>

                <?php echo $alert; ?>
            </div>
            <div class="card-footer text-end">
                <button class="btn btn-primary" type="submit" name="add_area">Submit</button>
                <input class="btn btn-light" type="reset" value="Cancel">
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