<?php
    include '../../../_stream/db_config.php';

    $alert = '';

    $id = $_GET['id'];
    $getRoom = mysqli_query($connect, "SELECT * FROM `rooms` WHERE r_id = '$id'");
    $fetch_getRoom = mysqli_fetch_assoc($getRoom);

    if (isset($_POST['add_room'])) {
        $o_id = $_POST['o_id'];
        $r_loc = $_POST['r_loc'];
        $r_address = $_POST['r_address'];
        $r_area = $_POST['r_area'];
        $r_gas = $_POST['r_gas'];
        $r_ac = $_POST['r_ac'];
        $r_heater = $_POST['r_heater'];
        $r_t_phone = $_POST['r_t_phone'];
        $r_electricity = $_POST['r_electricity'];
        $r_bath_room = $_POST['r_bath_room'];
        $r_bed_size = $_POST['r_bed_size'];
        $r_price = $_POST['r_price'];
        $r_status = $_POST['r_status'];
        $r_id = $_POST['r_id'];

        $addRoom = mysqli_query($connect, "UPDATE `rooms` SET 
            `r_loc` = '$r_loc',
             `r_address` = '$r_address',
              `r_bed_size` = '$r_bed_size',
               `r_area` = '$r_area',
                `r_ac` = '$r_ac',
                 `r_gas` = '$r_gas',
                  `r_heater` = '$r_heater',
                   `r_t_phone` = '$r_t_phone',
                    `r_electricity` = '$r_electricity',
                     `r_price` = '$r_price',
                      `r_status` = '$r_status',
                       `r_bath_room` = '$r_bath_room'
                        
                        WHERE r_id = '$r_id'");

        if ($addRoom) {
            header("LOCATION: roomsList.php");
        }else {
            $alert = '
                <div class="alert alert-danger text-center rounded-pill">
                    <strong>Room Not Updated!</strong>
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
                    <h3>Edit Room</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    
                    <form class="form theme-form" method="POST">
                        <input type="hidden" name="o_id" value="<?php echo $fetch_query['o_id'] ?>">
                        <input type="hidden" name="r_id" value="<?php echo $id ?>">
                        <div class="card-body">
                        <div class="row">
                                <div class="col-4">
                                    <div class="mb-6">
                                    <label class="form-label">Location</label>
                                    <?php
                                    $retLocQuery = mysqli_query($connect, "SELECT * FROM `location`");

                                    echo '<select class="form-control inputClass" name="r_loc" required>';
                                    while ($rowLoc = mysqli_fetch_assoc($retLocQuery)) {
                                        if ($rowLoc['loc_id'] === $fetch_getRoom['r_loc']) {
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
                                        <label class="form-label">Room Address</label>
                                        <input class="form-control btn-pill" type="text" value="<?php echo $fetch_getRoom['r_address'] ?>" name="r_address" placeholder="Mingora" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">Room Area</label>
                                        <input class="form-control btn-pill" type="Number"  value="<?php echo $fetch_getRoom['r_area'] ?>" placeholder="Enter Sq/fts" name="r_area" required>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">Room Gas Facility</label>
                                        <select class="form-control inputClass"  name="r_gas" required>
                                            <?php
                                            if ($fetch_getRoom['r_gas'] === '1') {
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
                                        <label class="form-label">Room AC Facility</label>
                                        <select class="form-control inputClass"  name="r_ac" required>
                                            <?php
                                            if ($fetch_getRoom['r_ac'] === '1') {
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
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">Room Heater Facility</label>
                                        <select class="form-control inputClass"  name="r_heater" required>
                                            <?php
                                            if ($fetch_getRoom['r_heater'] === '1') {
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
                                        <label class="form-label">Room Telephone/Internet Facility</label>
                                        <select class="form-control inputClass"  name="r_t_phone" required>
                                            <?php
                                            if ($fetch_getRoom['r_t_phone'] === '1') {
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
                                        <label class="form-label">Room Electricity Facility</label>
                                        <select class="form-control inputClass"  name="r_electricity" required>
                                            <?php
                                            if ($fetch_getRoom['r_electricity'] === '1') {
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
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">Room Attached Bathroom</label>
                                        <select class="form-control inputClass"  name="r_bath_room" required>
                                            <?php
                                            if ($fetch_getRoom['r_bath_room'] === '1') {
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
                                        <label class="form-label">Rooms Bed</label>
                                        <select class="form-control inputClass"  name="r_bed_size" required>
                                            <?php
                                            if ($fetch_getRoom['r_bed_size'] === '1') {
                                                echo '
                                                <option value="1" selected>Queen Size</option>
                                                <option value="2">King Size</option>
                                                <option value="3">Single Bed</option>
                                                <option value="4">Twin Bed</option>
                                                ';
                                            }elseif ($fetch_getRoom['r_bed_size'] === '2') {
                                                echo '
                                                <option value="1">Queen Size</option>
                                                <option value="2" selected>King Size</option>
                                                <option value="3">Single Bed</option>
                                                <option value="4">Twin Bed</option>
                                                ';
                                            }elseif ($fetch_getRoom['r_bed_size'] === '3') {
                                                echo '
                                                <option value="1">Queen Size</option>
                                                <option value="2">King Size</option>
                                                <option value="3" selected>Single Bed</option>
                                                <option value="4">Twin Bed</option>
                                                ';
                                            }elseif ($fetch_getRoom['r_bed_size'] === '4') {
                                                echo '
                                                <option value="1">Queen Size</option>
                                                <option value="2">King Size</option>
                                                <option value="3">Single Bed</option>
                                                <option value="4" selected>Twin Bed</option>
                                                ';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">Room Price</label>
                                        <input class="form-control btn-pill" type="Number"  value="<?php echo $fetch_getRoom['r_price'] ?>" placeholder="Enter Price"  name="r_price" required>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">Room Status</label>
                                        <select class="form-control inputClass"  name="r_status" required>
                                            <?php
                                            if ($fetch_getRoom['r_status'] === '1') {
                                                echo '
                                                    <option value="1" selected>Available</option>
                                                    <option value="0">Booked</option>
                                                ';
                                            }else {
                                                echo '
                                                    <option value="1">Available</option>
                                                    <option value="0" selected>Booked</option>
                                                ';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <button class="btn btn-primary" type="submit" name="add_room">Submit</button>
                            <a class="btn btn-light" href="roomsList.php">Cancel</a>
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
    include '../../includes/footer.php';
?>

<script>
    $(document).ready(function() {
        $('.inputClass').select2();
    });
</script>