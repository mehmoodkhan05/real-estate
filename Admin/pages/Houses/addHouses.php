<?php
    include '../../../_stream/db_config.php';

    $alert = '';

    if (isset($_POST["add_house"])) {
        $h_rooms = $_POST['h_rooms'];
        $h_area = $_POST['h_area'];
        $h_floors = $_POST['h_floors'];
        $h_balcony = $_POST['h_balcony'];
        $h_ac = $_POST['h_ac'];
        $h_gas = $_POST['h_gas'];
        $h_electricity = $_POST['h_electricity'];
        $h_water = $_POST['h_water'];
        $h_g_room = $_POST['h_g_room'];
        $h_type = $_POST['h_type'];
        $h_carparking = $_POST['h_carparking'];
        $h_telephone = $_POST['h_telephone'];
        $h_loc = $_POST['h_loc'];
        $h_price = $_POST['h_price'];
        $h_address = $_POST['h_address'];
        $h_allocate = $_POST['h_allocate'];
        $o_id = $_POST['o_id'];
        
        $addHouse = mysqli_query($connect, "INSERT INTO `houses`(
            `h_rooms`,
             `h_area`,
              `h_floors`,
               `h_balcony`,
                `h_ac`,
                 `h_gas`,
                  `h_electricity`,
                   `h_water`,
                    `h_g_room`,
                     `h_type`,
                      `h_car_park`,
                       `h_telephone`,
                        `h_location`,
                         `h_price`,
                          `h_address`,
                            `h_allocate`,
                             `o_id`
        )VALUES (
            '$h_rooms',
             '$h_area',
              '$h_floors',
               '$h_balcony',
                '$h_ac',
                 '$h_gas',
                  '$h_electricity',
                   '$h_water',
                    '$h_g_room',
                     '$h_type',
                      '$h_carparking',
                       '$h_telephone',
                        '$h_loc',
                         '$h_price',
                          '$h_address',
                           '$h_allocate',
                            '$o_id'
        )");
        

        if ($addHouse) {
            $cat_name = 'House';
            $activityQuery = mysqli_query($connect, "INSERT INTO activity_tbl(o_id, cat_name)VALUES('$o_id', '$cat_name')");
            header("LOCATION: housesList.php");
        }else {
            $alert = '
                <div class="alert alert-danger text-center rounded-pill">
                    <strong>House Not Added!</strong>
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
                    <h3>Houses</h3>
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
                        <h5>Add House Details</h5>
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

                                    echo '<select class="form-control inputClass" name="h_loc" required>';
                                    while ($rowLoc = mysqli_fetch_assoc($retLocQuery)) {
                                        echo '<option value="'.$rowLoc['loc_id'].'" >'.$rowLoc['loc_name'].'</option>';
                                    }

                                    echo '</select>';
                                    ?>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="mb-3">
                                        <label class="form-label">House Address</label>
                                        <input class="form-control btn-pill" type="text" name="h_address" placeholder="Mingora" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">House Rooms</label>
                                        <input class="form-control btn-pill" type="number" name="h_rooms" placeholder="Enter Rooms" required>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">House Floor</label>
                                        <input class="form-control btn-pill" type="text" name="h_floors" placeholder="Enter Floor" required>
                                    </div>
                                </div>
                                
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">House Balcony</label>
                                        <select class="form-control inputClass" name="h_balcony">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">House AC</label>
                                        <select class="form-control inputClass" name="h_ac">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">House Gas Facility</label>
                                        <select class="form-control inputClass"  name="h_gas">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">House Telephone Facility</label>
                                        <select class="form-control inputClass" name="h_telephone">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">House Electricity Facility</label>
                                        <select class="form-control inputClass"  name="h_electricity">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">House Water Facility</label>
                                        <select class="form-control inputClass"  name="h_water">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">House Guest Room</label>
                                        <select class="form-control inputClass"  name="h_g_room" required>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">House CarParking Facility</label>
                                        <select class="form-control inputClass"  name="h_carparking" required>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">House Location</label>
                                        <select class="form-control inputClass"  name="h_allocate" required>
                                            <option value="1">On Road</option>
                                            <option value="2">Away Road</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">House Area</label>
                                        <input class="form-control btn-pill" type="number" name="h_area" placeholder="Enter House Price" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">House Type</label>
                                        <select class="form-control inputClass"  name="h_type" required>
                                            <option value="1">Rent</option>
                                            <option value="2">Sell</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">Price</label>
                                        <input class="form-control btn-pill" type="number" name="h_price" placeholder="Enter House Rent" required>
                                    </div>
                                </div>
                            </div>
                                <div class="card-footer text-end">
                                    <button class="btn btn-primary" type="submit" name="add_house">Submit</button>
                                    <!-- <input class="btn btn-light" type="reset" value="Cancel"> -->
                                </div>
                            <?php echo  $alert; ?>
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