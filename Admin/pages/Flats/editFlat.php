<?php
    include '../../../_stream/db_config.php';

    $alert = '';

    $id = $_GET['id'];
    $getFlat = mysqli_query($connect, "SELECT * FROM flats WHERE f_id = '$id'");
    $fetch_getFlat = mysqli_fetch_assoc($getFlat);
    
    if (isset($_POST['update_flat'])) {
        $f_location = $_POST['f_location'];
        $f_address = $_POST['f_address'];
        $f_floor = $_POST['f_floor'];
        $f_bathroom = $_POST['f_bathroom'];
        $f_area = $_POST['f_area'];
        $f_electricity = $_POST['f_electricity'];
        $f_gas = $_POST['f_gas'];
        $f_heater = $_POST['f_heater'];
        $f_ac = $_POST['f_ac'];
        $f_internet = $_POST['f_internet'];
        $f_kitchen = $_POST['f_kitchen'];
        $f_price = $_POST['f_price'];
        $f_room = $_POST['f_rooms'];
        $f_type = $_POST['f_type'];
        $f_parking = $_POST['f_parking'];
        $f_status = $_POST['f_status'];
        $id = $_POST['f_id'];


        $updateFlat = mysqli_query($connect, "UPDATE `flats` SET
            `f_bathroom` = '$f_bathroom',
             `f_floor` = '$f_floor',
              `f_room` = '$f_room',
               `f_location` = '$f_location',
                `f_area` = '$f_area',
                 `f_type` = '$f_type',
                  `f_address` = '$f_address',
                   `f_electricity` = '$f_electricity',
                    `f_gas` = '$f_gas',
                     `f_ac` = '$f_ac',
                      `f_parking` = '$f_parking',
                       `f_internet` = '$f_internet',
                        `f_kitchen` = '$f_kitchen',
                         `f_price` = '$f_price',
                          `o_id` = '$o_id',
                          `f_status` = '$f_status'

                          WHERE f_id = '$id'");


        if ($updateFlat) {
            header("LOCATION: flatsList.php");
        }else {
            $alert = '
                <div class="alert alert-danger text-center rounded-pill">
                    <strong>Flat Not Added!</strong>
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
                    <h3>Flats</h3>
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
                <h5>Add Flats</h5>
            </div>
            <form class="form theme-form" method="POST">
            <div class="card-body">
                <input type="hidden" name="o_id" value="<?php echo $fetch_query['o_id'] ?>">
                <input type="hidden" name="f_id" value="<?php echo $id ?>">

                <div class="row">
                    <div class="col-4">
                        <div class="mb-6">
                        <label class="form-label">Location</label>
                        <?php
                        $retLocQuery = mysqli_query($connect, "SELECT * FROM `location`");

                        echo '<select class="form-control inputClass" name="f_location" required>';
                        while ($rowLoc = mysqli_fetch_assoc($retLocQuery)) {
                            if ($rowLoc['loc_id'] === $fetch_getFlat['f_location']) {
                                echo '<option value="'.$rowLoc['loc_id'].'" selected>'.$rowLoc['loc_name'].'</option>';                                
                            }else {
                                echo '<option value="'.$rowLoc['loc_id'].'" >'.$rowLoc['loc_name'].'</option>';
                            }
                        }

                        echo '</select>';
                        ?>
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="mb-3">
                            <label class="form-label">Flat Address</label>
                            <input class="form-control btn-pill" type="text" value="<?php echo $fetch_getFlat['f_address']; ?>" name="f_address" placeholder="Example: Kalam" required>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                            <label class="form-label">Flat Rooms</label>
                            <input class="form-control btn-pill" type="Number" value="<?php echo $fetch_getFlat['f_room']; ?>" name="f_rooms" placeholder="Enter Floor Number" required>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                            <label class="form-label">Flat Floor</label>
                            <input class="form-control btn-pill" type="Number" value="<?php echo $fetch_getFlat['f_floor']; ?>" name="f_floor" placeholder="Enter Floor Number" required>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                            <label class="form-label">Bathrooms</label>
                            <input class="form-control btn-pill" type="Number" value="<?php echo $fetch_getFlat['f_bathroom']; ?>" name="f_bathroom" placeholder="Flat Rooms Number" required>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                            <label class="form-label">Flat Area</label>
                            <input class="form-control btn-pill" type="Number" value="<?php echo $fetch_getFlat['f_area']; ?>" name="f_area" placeholder="Enter Sq/fts" required>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                            <label class="form-label">Flat Electricity Facility</label>
                            <select class="form-control inputClass" name="f_electricity">
                                <?php
                                if ($fetch_getFlat['f_electricity']) {
                                    echo '
                                    <option value="1" selected>Yes</option>
                                    <option value="0">No</option>
                                    ';
                                }else {
                                    echo '
                                    <option value="1">Yes</option>
                                    <option value="0" selected>No</option>
                                    ';
                                }
                                ?>
                                
                            </select>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                            <label class="form-label">Flat Gas Facility</label>
                            <select class="form-control inputClass" name="f_gas">
                                <?php
                                if ($fetch_getFlat['f_gas']) {
                                    echo '
                                    <option value="1" selected>Yes</option>
                                    <option value="0">No</option>
                                    ';
                                }else {
                                    echo '
                                    <option value="1">Yes</option>
                                    <option value="0" selected>No</option>
                                    ';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                            <label class="form-label">Flat Heater Facility</label>
                            <select class="form-control inputClass" name="f_heater">
                                <?php
                                if ($fetch_getFlat['f_heater']) {
                                    echo '
                                    <option value="1" selected>Yes</option>
                                    <option value="0">No</option>
                                    ';
                                }else {
                                    echo '
                                    <option value="1">Yes</option>
                                    <option value="0" selected>No</option>
                                    ';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                            <label class="form-label">Flat AC Facility</label>
                            <select class="form-control inputClass" name="f_ac">
                                <?php
                                if ($fetch_getFlat['f_ac']) {
                                    echo '
                                    <option value="1" selected>Yes</option>
                                    <option value="0">No</option>
                                    ';
                                }else {
                                    echo '
                                    <option value="1">Yes</option>
                                    <option value="0" selected>No</option>
                                    ';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                            <label class="form-label">Flat Internet Facility</label>
                            <select class="form-control inputClass" name="f_internet">
                                <?php
                                if ($fetch_getFlat['f_internet']) {
                                    echo '
                                    <option value="1" selected>Yes</option>
                                    <option value="0">No</option>
                                    ';
                                }else {
                                    echo '
                                    <option value="1">Yes</option>
                                    <option value="0" selected>No</option>
                                    ';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                            <label class="form-label">Flat Kitchen Facility</label>
                            <select class="form-control inputClass" name="f_kitchen">
                                <?php
                                if ($fetch_getFlat['f_kitchen']) {
                                    echo '
                                    <option value="1" selected>Yes</option>
                                    <option value="0">No</option>
                                    ';
                                }else {
                                    echo '
                                    <option value="1">Yes</option>
                                    <option value="0" selected>No</option>
                                    ';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                            <label class="form-label">Flat Parking Facility</label>
                            <select class="form-control inputClass" name="f_parking">
                                <?php
                                if ($fetch_getFlat['f_parking']) {
                                    echo '
                                    <option value="1" selected>Yes</option>
                                    <option value="0">No</option>
                                    ';
                                }else {
                                    echo '
                                    <option value="1">Yes</option>
                                    <option value="0" selected>No</option>
                                    ';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                            <label class="form-label">Flat Price</label>
                            <input class="form-control btn-pill" type="Number" value="<?php echo $fetch_getFlat['f_area']; ?>" name="f_price" placeholder="Enter Price" required>
                        </div>
                    </div>


                    <div class="col-4">
                        <div class="mb-3">
                            <label class="form-label">Flat Type</label>
                            <select class="form-control inputClass" name="f_type">
                                <?php
                                if ($fetch_getFlat['f_parking']) {
                                    echo '
                                    <option value="1" selected>Rent</option>
                                    <option value="2">Sell</option>
                                    ';
                                }else {
                                    echo '
                                    <option value="1">Rent</option>
                                    <option value="2" selected>Sell</option>
                                    ';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                            <label class="form-label">Flat Status</label>
                            <select class="form-control inputClass" name="f_status">
                                <?php
                                if ($fetch_getFlat['f_status'] === '1') {
                                    echo '
                                    <option value="1" selected>Available</option>
                                    <option value="2">Not Available</option>
                                    ';
                                }else {
                                    echo '
                                    <option value="1">Available</option>
                                    <option value="2" selected>Not Available</option>
                                    ';
                                }
                                ?>
                            </select>
                        </div>
                        
                    </div>
                </div>
                <?php echo $alert; ?>
            </div>
            <div class="card-footer text-end">
                <button class="btn btn-primary" type="submit" name="update_flat">Submit</button>
                <a href="flatsList.php" class="btn btn-light">Cancel</a>
                <!-- <input class="btn btn-light" type="reset" value="Cancel"> -->
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
<script>
    $(document).ready(function() {
        $('.inputClass').select2();
    });
</script>