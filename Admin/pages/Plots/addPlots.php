<?php

    include '../../../_stream/db_config.php';

    $alert = '';
    
    if (isset($_POST['add_plot'])) {
        $o_id = $_POST['o_id'];
        $p_loc = $_POST['p_loc'];
        $p_address = $_POST['p_address'];
        $p_area = $_POST['p_area'];
        $p_allocate = $_POST['p_allocate'];
        $p_price = $_POST['p_price'];
    
        $addPlot = mysqli_query($connect, "INSERT INTO `plots`(
            `p_loc`,
             `p_address`,
              `p_area`,
               `p_allocate`,
                `p_price`,
                  `o_id`)
                  VALUES(
                    '$p_loc',
                     '$p_address',
                      '$p_area',
                       '$p_allocate',
                        '$p_price',
                          '$o_id'
                  )");

        if ($addPlot) {
            $cat_name = 'Plot';
            $activityQuery = mysqli_query($connect, "INSERT INTO activity_tbl(o_id, cat_name)VALUES('$o_id', '$cat_name')");
            header("LOCATION: plotsList.php");
        }else {
            $alert = '
                <div class="alert alert-danger text-center rounded-pill">
                    <strong>Room Not Added!</strong>
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
                    <h3>Plots</h3>
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
            <h5>Add Plots</h5>
            </div>
            <form class="form theme-form" method="POST">
                    <div class="card-body">
                    <input type="hidden" name="o_id" value="<?php echo $fetch_query['o_id'] ?>">

                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                <label class="form-label">Plot Location</label>
                                    <?php
                                    $retLocQuery = mysqli_query($connect, "SELECT * FROM `location`");

                                    echo '<select class="form-control inputClass" name="p_loc" required>';
                                    while ($rowLoc = mysqli_fetch_assoc($retLocQuery)) {
                                        echo '<option value="'.$rowLoc['loc_id'].'" >'.$rowLoc['loc_name'].'</option>';
                                    }

                                    echo '</select>';
                                    ?>
                                </div>
                            </div>


                            <div class="col-8">
                                <div class="mb-3">
                                    <label class="form-label">Plot Address</label>
                                    <input class="form-control btn-pill" type="text" placeholder="Example: Kalam" name="p_address" required>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Plot Total Area</label>
                                    <input class="form-control btn-pill" type="Number" placeholder="Enter Sq/fts" name="p_area" required>
                                </div>
                            </div>

                            <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">Plot Allocate Area</label>
                                        <select class="form-control inputClass" name="p_allocate" required>
                                            <option value="1">On Road</option>
                                            <option value="2">Away Road</option>
                                        </select>
                                    </div>
                                </div>

                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Plot Price</label>
                                    <input class="form-control btn-pill" type="Number" placeholder="Price" name="p_price" required>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="card-footer text-end">
                <button class="btn btn-primary" type="submit" name="add_plot">Submit</button>
                <!-- <input class="btn btn-light" type="reset" value="Cancel"> -->
            </div>
                </form>
            </div>
            <?php echo $alert ?>
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