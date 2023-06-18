<?php
    include '../../../_stream/db_config.php';

    $alert = '';

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

        $addRoom = mysqli_query($connect, "INSERT INTO `rooms`(
            `r_loc`,
             `r_address`,
              `r_bed_size`,
               `r_area`,
                `r_ac`,
                 `r_gas`,
                  `r_heater`,
                   `r_t_phone`,
                    `r_electricity`,
                     `r_price`,
                      `o_id`,
                       `r_bath_room`) VALUES (
                        '$r_loc',
                         '$r_address',
                          '$r_bed_size',
                           '$r_area',
                            '$r_ac',
                             '$r_gas',
                              '$r_heater',
                               '$r_t_phone',
                                '$r_electricity',
                                 '$r_price',
                                  '$o_id',
                                  '$r_bath_room'
                        )");

        if ($addRoom) {
            $cat_name = 'Room';
            $activityQuery = mysqli_query($connect, "INSERT INTO activity_tbl(o_id, cat_name)VALUES('$o_id', '$cat_name')");
            header("LOCATION: roomsList.php");
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
                        <h5>Add Rooms</h5>
                    </div>
                    <form class="form theme-form" method="POST">
                        <input type="hidden" name="o_id" value="<?php echo $fetch_query['o_id'] ?>">
                        <div class="card-body">
                        <div class="row">
                                <div class="col-4">
                                    <div class="mb-6">
                                    <label class="form-label">Location</label>
                                    <?php
                                    $retLocQuery = mysqli_query($connect, "SELECT * FROM `location`");

                                    echo '<select class="form-control inputClass" name="r_loc" required>';
                                    while ($rowLoc = mysqli_fetch_assoc($retLocQuery)) {
                                        echo '<option value="'.$rowLoc['loc_id'].'" >'.$rowLoc['loc_name'].'</option>';
                                    }

                                    echo '</select>';
                                    ?>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="mb-3">
                                        <label class="form-label">Room Address</label>
                                        <input class="form-control btn-pill" type="text" name="r_address" placeholder="Mingora" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">Room Area</label>
                                        <input class="form-control btn-pill" type="Number"  placeholder="Enter Sq/fts" name="r_area" required>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">Room Gas Facility</label>
                                        <select class="form-control inputClass"  name="r_gas" required>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">Room AC Facility</label>
                                        <select class="form-control inputClass"  name="r_ac" required>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">Room Heater Facility</label>
                                        <select class="form-control inputClass"  name="r_heater" required>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">Room Telephone/Internet Facility</label>
                                        <select class="form-control inputClass"  name="r_t_phone" required>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">Room Electricity Facility</label>
                                        <select class="form-control inputClass"  name="r_electricity" required>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">Room Attached Bathroom</label>
                                        <select class="form-control inputClass"  name="r_bath_room" required>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">Rooms Bed</label>
                                        <select class="form-control inputClass"  name="r_bed_size" required>
                                            <option value="1">Queen Size</option>
                                            <option value="2">King Size</option>
                                            <option value="3">Single Bed</option>
                                            <option value="4">Twin Bed</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">Room Price</label>
                                        <input class="form-control btn-pill" type="Number" placeholder="Enter Price"  name="r_price" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <button class="btn btn-primary" type="submit" name="add_room">Submit</button>
                            <!-- <input class="btn btn-light" type="reset" value="Cancel"> -->
                        </div>
                    </form>

                    <?php echo $alert ?>
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