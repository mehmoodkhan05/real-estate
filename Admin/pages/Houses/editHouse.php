<?php
    include '../../../_stream/db_config.php';

    $alert = '';

    $id = $_GET['id'];
    $getHouseData = mysqli_query($connect, "SELECT * FROM `houses` WHERE h_id = '$id'");
    $fetch_getHouseData = mysqli_fetch_assoc($getHouseData);

    if (isset($_POST["update_house"])) {
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
        $h_status = $_POST['h_status'];
        $o_id = $_POST['o_id'];
        $id = $_POST['h_id'];
        
        $updateHouse = mysqli_query($connect, "UPDATE `houses` SET
            `h_rooms` = '$h_rooms',
             `h_area` = '$h_area',
              `h_floors` = '$h_floors',
               `h_balcony` = '$h_balcony',
                `h_ac` = '$h_ac',
                 `h_gas` = '$h_gas',
                  `h_electricity` = '$h_electricity',
                   `h_water` = '$h_water',
                    `h_g_room` = '$h_g_room',
                     `h_type` = '$h_type',
                      `h_car_park` = '$h_carparking',
                       `h_telephone` = '$h_telephone',
                        `h_location` = '$h_loc',
                         `h_price` = '$h_price',
                          `h_address` = '$h_address',
                            `h_allocate` = '$h_allocate',
                             `h_status` = '$h_status'
                               WHERE h_id = '$id'");
        

        if ($updateHouse) {
            header("LOCATION: housesList.php");
        }else {
            $alert = '
                <div class="alert alert-danger text-center rounded-pill">
                    <strong>House Not Updated!'.mysqli_error($connect).'</strong>
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
                    <h3>Edit House</h3>
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
                        <div class="card-body">
                            <input type="hidden" name="o_id" value="<?php echo $fetch_query['o_id'] ?>">
                            <input type="hidden" name="h_id" value="<?php echo $id ?>">
                            
                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-6">
                                    <label class="form-label">Location</label>
                                    <?php
                                    $retLocQuery = mysqli_query($connect, "SELECT * FROM `location`");

                                    echo '<select class="form-control inputClass" name="h_loc" required>';
                                    while ($rowLoc = mysqli_fetch_assoc($retLocQuery)) {
                                        if($fetch_getHouseData['h_location'] === $rowLoc['loc_id']) {
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
                                        <label class="form-label">House Address</label>
                                        <input class="form-control btn-pill" value="<?php echo $fetch_getHouseData['h_address'] ?>" type="text" name="h_address" placeholder="Mingora" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">House Rooms</label>
                                        <input class="form-control btn-pill" type="number" value="<?php echo $fetch_getHouseData['h_rooms'] ?>" name="h_rooms" placeholder="Enter Rooms" required>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">House Floor</label>
                                        <input class="form-control btn-pill" type="text" name="h_floors" value="<?php echo $fetch_getHouseData['h_floors'] ?>" placeholder="Enter Floor" required>
                                    </div>
                                </div>
                                
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">House Balcony</label>
                                        <select class="form-control inputClass" name="h_balcony">
                                            <?php
                                            if ($fetch_getHouseData['h_balcony'] === '1') {
                                            echo '
                                                <option value="1" selected>Yes</option>
                                                <option value="0">No</option>';    
                                            }else {
                                            echo '
                                                <option value="1">Yes</option>
                                                <option value="0" selected>No</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">House AC</label>
                                        <select class="form-control inputClass" name="h_ac">
                                            <?php
                                            if ($fetch_getHouseData['h_ac'] === '1') {
                                            echo '
                                                <option value="1" selected>Yes</option>
                                                <option value="0">No</option>';    
                                            }else {
                                            echo '
                                                <option value="1">Yes</option>
                                                <option value="0" selected>No</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">House Gas Facility</label>
                                        <select class="form-control inputClass"  name="h_gas">
                                            <?php
                                            if ($fetch_getHouseData['h_gas'] === '1') {
                                            echo '
                                                <option value="1" selected>Yes</option>
                                                <option value="0">No</option>';    
                                            }else {
                                            echo '
                                                <option value="1">Yes</option>
                                                <option value="0" selected>No</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">House Telephone Facility</label>
                                        <select class="form-control inputClass" name="h_telephone">
                                            <?php
                                            if ($fetch_getHouseData['h_telephone'] === '1') {
                                            echo '
                                                <option value="1" selected>Yes</option>
                                                <option value="0">No</option>';    
                                            }else {
                                            echo '
                                                <option value="1">Yes</option>
                                                <option value="0" selected>No</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">House Electricity Facility</label>
                                        <select class="form-control inputClass"  name="h_electricity">
                                        <?php
                                            if ($fetch_getHouseData['h_electricity'] === '1') {
                                            echo '
                                                <option value="1" selected>Yes</option>
                                                <option value="0">No</option>';    
                                            }else {
                                            echo '
                                                <option value="1">Yes</option>
                                                <option value="0" selected>No</option>';
                                            }
                                            ?>     
                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">House Water Facility</label>
                                        <select class="form-control inputClass"  name="h_water">
                                            <?php
                                            if ($fetch_getHouseData['h_water'] === '1') {
                                            echo '
                                                <option value="1" selected>Yes</option>
                                                <option value="0">No</option>';    
                                            }else {
                                            echo '
                                                <option value="1">Yes</option>
                                                <option value="0" selected>No</option>';
                                            }
                                            ?> 
                                            
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">House Guest Room</label>
                                        <select class="form-control inputClass"  name="h_g_room" required>
                                            <?php
                                            if ($fetch_getHouseData['h_g_room'] === '1') {
                                            echo '
                                                <option value="1" selected>Yes</option>
                                                <option value="0">No</option>';    
                                            }else {
                                            echo '
                                                <option value="1">Yes</option>
                                                <option value="0" selected>No</option>';
                                            }
                                            ?>    
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">House CarParking Facility</label>
                                        <select class="form-control inputClass"  name="h_carparking" required>
                                            <?php
                                            if ($fetch_getHouseData['h_car_park'] === '1') {
                                            echo '
                                                <option value="1" selected>Yes</option>
                                                <option value="0">No</option>';    
                                            }else {
                                            echo '
                                                <option value="1">Yes</option>
                                                <option value="0" selected>No</option>';
                                            }
                                            ?>
                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">House Location</label>
                                        <select class="form-control inputClass"  name="h_allocate" required>
                                            <?php
                                            if ($fetch_getHouseData['h_allocate'] === '1') {
                                            echo '
                                                <option value="1" selected>On Road</option>
                                                <option value="2">Away Road</option>';    
                                            }else {
                                            echo '
                                                <option value="1">On Road</option>
                                                <option value="2" selected>Away Road</option>';
                                            }
                                            ?>
                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">House Area</label>
                                        <input class="form-control btn-pill" value="<?php echo $fetch_getHouseData['h_area'] ?>" type="number" name="h_area" placeholder="Enter House Price" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">House Type</label>
                                        <select class="form-control inputClass"  name="h_type" required>
                                            <?php
                                            if ($fetch_getHouseData['h_type'] === '1') {
                                            echo '
                                                <option value="1" selected>Rent</option>
                                                <option value="2">Sell</option>';    
                                            }else {
                                            echo '
                                                <option value="1">Rent</option>
                                                <option value="2" selected>Sell</option>';
                                            }
                                            ?>
                                            
                                        </select>
                                    </div>
                                </div>
                                

                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">Price</label>
                                        <input class="form-control btn-pill" value="<?php echo $fetch_getHouseData['h_price'] ?>" type="number" name="h_price" placeholder="Enter House Rent" required>
                                    </div>
                                </div>


                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">House Status</label>
                                        <select class="form-control inputClass"  name="h_status" required>
                                            <?php
                                            if ($fetch_getHouseData['h_status'] === '1') {
                                            echo '
                                                <option value="1" selected>Available</option>
                                                <option value="2">Booked</option>';    
                                            }else {
                                            echo '
                                                <option value="1">Available</option>
                                                <option value="2" selected>Booked</option>';
                                            }
                                            ?>
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                                <div class="card-footer text-end">
                                    <button class="btn btn-primary" type="submit" name="update_house">Submit</button>
                                    <a href="housesList.php" class="btn btn-light">Cancel</a>
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