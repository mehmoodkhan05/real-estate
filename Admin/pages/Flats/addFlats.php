<?php
    include '../../../_stream/db_config.php';

    $alert = '';
    
    if (isset($_POST['add_flat'])) {
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
        $o_id = $_POST['o_id'];


        $addFlat = mysqli_query($connect, "INSERT INTO `flats`(
            `f_bathroom`,
             `f_floor`,
              `f_room`,
               `f_location`,
                `f_area`,
                 `f_type`,
                  `f_address`,
                   `f_electricity`,
                    `f_gas`,
                     `f_ac`,
                      `f_parking`,
                       `f_internet`,
                        `f_kitchen`,
                         `f_price`,
                          `o_id`)
            VALUES(
            '$f_bathroom',
             '$f_floor',
              '$f_room',
               '$f_location',
                '$f_area',
                 '$f_type',
                  '$f_address',
                   '$f_electricity',
                    '$f_gas',
                     '$f_ac',
                      '$f_parking',
                       '$f_internet',
                        '$f_kitchen',
                         '$f_price',
                          '$o_id'
                          )");

        if ($addFlat) {
            $cat_name = 'Flat';
            $activityQuery = mysqli_query($connect, "INSERT INTO activity_tbl(o_id, cat_name)VALUES('$o_id', '$cat_name')");
            header("LOCATION: flatsList.php");
        }else {
            $alert = '
                <div class="alert alert-danger text-center rounded-pill">
                    <strong>Flat Not Added!</strong>
                </div>
            ';
        }
        
    }
    
    include '../../includes/header.php'
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

                <div class="row">
                    <div class="col-4">
                        <div class="mb-6">
                        <label class="form-label">Location</label>
                        <?php
                        $retLocQuery = mysqli_query($connect, "SELECT * FROM `location`");

                        echo '<select class="form-control inputClass" name="f_location" required>';
                        while ($rowLoc = mysqli_fetch_assoc($retLocQuery)) {
                            echo '<option value="'.$rowLoc['loc_id'].'" >'.$rowLoc['loc_name'].'</option>';
                        }

                        echo '</select>';
                        ?>
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="mb-3">
                            <label class="form-label">Flat Address</label>
                            <input class="form-control btn-pill" type="text" name="f_address" placeholder="Example: Kalam" required>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                            <label class="form-label">Flat Rooms</label>
                            <input class="form-control btn-pill" type="Number" name="f_rooms" placeholder="Enter Floor Number" required>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                            <label class="form-label">Flat Floor</label>
                            <input class="form-control btn-pill" type="Number" name="f_floor" placeholder="Enter Floor Number" required>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                            <label class="form-label">Bathrooms</label>
                            <input class="form-control btn-pill" type="Number" name="f_bathroom" placeholder="Flat Rooms Number" required>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                            <label class="form-label">Flat Area</label>
                            <input class="form-control btn-pill" type="Number" name="f_area" placeholder="Enter Sq/fts" required>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                            <label class="form-label">Flat Electricity Facility</label>
                            <select class="form-control inputClass" name="f_electricity">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                            <label class="form-label">Flat Gas Facility</label>
                            <select class="form-control inputClass" name="f_gas">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                            <label class="form-label">Flat Heater Facility</label>
                            <select class="form-control inputClass" name="f_heater">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                            <label class="form-label">Flat AC Facility</label>
                            <select class="form-control inputClass" name="f_ac">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                            <label class="form-label">Flat Internet Facility</label>
                            <select class="form-control inputClass" name="f_internet">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                            <label class="form-label">Flat Kitchen Facility</label>
                            <select class="form-control inputClass" name="f_kitchen">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                            <label class="form-label">Flat Parking Facility</label>
                            <select class="form-control inputClass" name="f_parking">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                            <label class="form-label">Flat Price</label>
                            <input class="form-control btn-pill" type="Number" name="f_price" placeholder="Enter Price" required>
                        </div>
                    </div>


                    <div class="col-4">
                        <div class="mb-3">
                            <label class="form-label">Flat Type</label>
                            <select class="form-control inputClass" name="f_type">
                            <option value="1">Rent</option>
                            <option value="2">Sell</option>
                            </select>
                        </div>
                    </div>
                </div>
                <?php echo $alert; ?>
            </div>
            <div class="card-footer text-end">
                <button class="btn btn-primary" type="submit" name="add_flat">Submit</button>
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