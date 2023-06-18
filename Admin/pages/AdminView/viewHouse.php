<?php
    include '../../../_stream/db_config.php';

    $alert = '';

    $h_id = $_GET['id'];

    $getHouseDetails = mysqli_query($connect, "SELECT houses.*, location.loc_name, owner.* FROM `houses`
    INNER JOIN location ON location.loc_id = houses.h_location
    INNER JOIN owner ON owner.o_id = houses.o_id
    WHERE houses.h_id = '$h_id'");

    $fetch_getHouseDetails = mysqli_fetch_assoc($getHouseDetails);

    include '../../includes/header.php';

?>


<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>House Details</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="table-responsive table">
                        <table class="display" id="basic-1">
                            <tbody style="font-family: calibri">
                                <tr>
                                    <td class="px-5"><strong>Owner Name</strong></td>
                                    <td><?php echo $fetch_getHouseDetails['o_name'] ?></td>
                                </tr>

                                <tr>
                                    <td class="px-5"><strong>Owner Contact</strong></td>
                                    <td>0<?php echo $fetch_getHouseDetails['o_cell'] ?></td>
                                </tr>

                                <tr>
                                    <td class="px-5"><strong>Owner Address</strong></td>
                                    <td><?php echo $fetch_getHouseDetails['o_address'] ?></td>
                                </tr>

                                <tr>
                                    <td class="px-5"><strong>Rooms</strong></td>
                                    <td class="px-5"><?php echo $fetch_getHouseDetails['h_rooms'] ?></td>
                                </tr>

                                <tr>
                                    <td class="px-5"><strong>House Floors</strong></td>
                                    <td class="px-5"><?php echo $fetch_getHouseDetails['h_floors'] ?></td>
                                </tr>

                                <tr>
                                    <td class="px-5"><strong>House Balcony</strong></td>
                                    <td class="px-5"><?php 
                                    if ($fetch_getHouseDetails['h_balcony'] === '1') {
                                        echo '<i data-feather="check-circle"></i>';
                                    }else {
                                        echo '<i data-feather="x-circle"></i>';
                                    }
                                     ?></td>
                                </tr>

                                <tr>
                                    <td class="px-5"><strong>AC Facility</strong></td>
                                    <td class="px-5"><?php 
                                    if ($fetch_getHouseDetails['h_ac'] === '1') {
                                        echo '<i data-feather="check-circle"></i>';
                                    }else {
                                        echo '<i data-feather="x-circle"></i>';
                                    }
                                     ?></td>
                                </tr>

                                <tr>
                                    <td class="px-5"><strong>Gas Connection</strong></td>
                                    <td class="px-5"><?php 
                                    if ($fetch_getHouseDetails['h_gas'] === '1') {
                                        echo '<i data-feather="check-circle"></i>';
                                    }else {
                                        echo '<i data-feather="x-circle"></i>';
                                    }
                                     ?></td>
                                </tr>

                                <tr>
                                    <td class="px-5"><strong>Electricity Connection</strong></td>
                                    <td class="px-5"><?php 
                                    if ($fetch_getHouseDetails['h_electricity'] === '1') {
                                        echo '<i data-feather="check-circle"></i>';
                                    }else {
                                        echo '<i data-feather="x-circle"></i>';
                                    }
                                     ?></td>
                                </tr>

                                <tr>
                                    <td class="px-5"><strong>Water Connection</strong></td>
                                    <td class="px-5"><?php 
                                    if ($fetch_getHouseDetails['h_water'] === '1') {
                                        echo '<i data-feather="check-circle"></i>';
                                    }else {
                                        echo '<i data-feather="x-circle"></i>';
                                    }
                                     ?></td>
                                </tr>

                                <tr>
                                    <td class="px-5"><strong>Guest Room</strong></td>
                                    <td class="px-5"><?php 
                                    if ($fetch_getHouseDetails['h_g_room'] === '1') {
                                        echo '<i data-feather="check-circle"></i>';
                                    }else {
                                        echo '<i data-feather="x-circle"></i>';
                                    }
                                     ?></td>
                                </tr>

                                <tr>
                                    <td class="px-5"><strong>House Type</strong></td>
                                    <td class="px-5"><?php 
                                    if ($fetch_getHouseDetails['h_type'] === '1') {
                                        echo '<i data-feather="check-circle"></i>';
                                    }else {
                                        echo '<i data-feather="x-circle"></i>';
                                    }
                                     ?></td>
                                </tr>


                                <tr>
                                    <td class="px-5"><strong>Car Porch</strong></td>
                                    <td class="px-5"><?php 
                                    if ($fetch_getHouseDetails['h_car_park'] === '1') {
                                        echo '<i data-feather="check-circle"></i>';
                                    }else {
                                        echo '<i data-feather="x-circle"></i>';
                                    }
                                     ?></td>
                                </tr>

                                <tr>
                                    <td class="px-5"><strong>Telephone Connection</strong></td>
                                    <td class="px-5"><?php 
                                    if ($fetch_getHouseDetails['h_telephone'] === '1') {
                                        echo '<i data-feather="check-circle"></i>';
                                    }else {
                                        echo '<i data-feather="x-circle"></i>';
                                    }
                                     ?></td>
                                </tr>

                                <tr>
                                    <td class="px-5"><strong>House Location</strong></td>
                                    <td><?php echo $fetch_getHouseDetails['loc_name'] ?></td>
                                </tr>


                                <tr>
                                    <td class="px-5"><strong>Address</strong></td>
                                    <td><?php echo $fetch_getHouseDetails['h_address'] ?></td>
                                </tr>


                                <tr>
                                    <td class="px-5"><strong>Price</strong></td>
                                    <td><?php echo $fetch_getHouseDetails['h_price'] ?></td>
                                </tr>

                                <tr>
                                    <td class="px-5"><strong>House Status</strong></td>
                                    <td><?php 
                                    if ($fetch_getHouseDetails['h_status'] === '1') {
                                        echo 'Rent';
                                    }else {
                                        echo 'Sell';
                                    }
                                     ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
                        <h5>House Gallery</h5>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <?php
                            $getHouseGallery = mysqli_query($connect, "SELECT * FROM house_gallery WHERE h_id = '$h_id'");
                            
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
                                    <div class="col-4 mt-2">
                                        <img src="../../../src/images/'.$rowGallery['g_img'].'" class="img-thumbnail" style="object-position: center center !important" width="100%">
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