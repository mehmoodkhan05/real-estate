<?php
    include '../../../_stream/db_config.php';

    $alert = '';

    $f_id = $_GET['id'];

    $getFlatDetails = mysqli_query($connect, "SELECT flats.*, location.loc_name, owner.* FROM `flats`
    INNER JOIN location ON location.loc_id = flats.f_location
    INNER JOIN owner ON owner.o_id = flats.o_id
    WHERE flats.f_id = '$f_id'");

    $fetch_getRoomDetails= mysqli_fetch_assoc($getFlatDetails);

    include '../../includes/header.php';

?>


<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Flat Details</h3>
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
                                    <td><?php echo $fetch_getRoomDetails['o_name'] ?></td>
                                </tr>

                                <tr>
                                    <td class="px-5"><strong>Owner Contact</strong></td>
                                    <td>0<?php echo $fetch_getRoomDetails['o_cell'] ?></td>
                                </tr>

                                <tr>
                                    <td class="px-5"><strong>Owner Address</strong></td>
                                    <td><?php echo $fetch_getRoomDetails['o_address'] ?></td>
                                </tr>

                                
                                <tr>
                                    <td class="px-5"><strong>Flat Area</strong></td>
                                    <td><?php echo $fetch_getRoomDetails['f_area'] ?> SQFT</td>
                                </tr>

                                <tr>
                                    <td class="px-5"><strong>Flat Rooms</strong></td>
                                    <td class="px-5"><?php echo $fetch_getRoomDetails['f_room'] ?></td>
                                </tr>

                                <tr>
                                    <td class="px-5"><strong>Flat Floor</strong></td>
                                    <td class="px-5"><?php echo $fetch_getRoomDetails['f_floor'] ?></td>
                                </tr>

                                <tr>
                                    <td class="px-5"><strong>Flat Bathrooms</strong></td>
                                    <td class="px-5"><?php echo $fetch_getRoomDetails['f_bathroom'] ?></td>
                                </tr>

                                <tr>
                                    <td class="px-5"><strong>Flat Type</strong></td>
                                    <td><?php 
                                    if ($fetch_getRoomDetails['f_type'] === '1') {
                                        echo 'Rent';
                                    }else {
                                        echo 'Sell';
                                    }
                                     ?></td>
                                </tr>

                                <tr>
                                    <td class="px-5"><strong>Flat Bathrooms</strong></td>
                                    <td class="px-5"><?php echo $fetch_getRoomDetails['f_bathroom'] ?></td>
                                </tr>


                                <tr>
                                    <td class="px-5"><strong>Electricity Connection</strong></td>
                                    <td class="px-5"><?php 
                                    if ($fetch_getRoomDetails['f_electricity'] === '1') {
                                        echo '<i data-feather="check-circle"></i>';
                                    }else {
                                        echo '<i data-feather="x-circle"></i>';
                                    }
                                     ?></td>
                                </tr>


                                <tr>
                                    <td class="px-5"><strong>Gas Connection</strong></td>
                                    <td class="px-5"><?php 
                                    if ($fetch_getRoomDetails['f_gas'] === '1') {
                                        echo '<i data-feather="check-circle"></i>';
                                    }else {
                                        echo '<i data-feather="x-circle"></i>';
                                    }
                                     ?></td>
                                </tr>


                                <tr>
                                    <td class="px-5"><strong>AC Facility</strong></td>
                                    <td class="px-5"><?php 
                                    if ($fetch_getRoomDetails['f_ac'] === '1') {
                                        echo '<i data-feather="check-circle"></i>';
                                    }else {
                                        echo '<i data-feather="x-circle"></i>';
                                    }
                                     ?></td>
                                </tr>


                                <tr>
                                    <td class="px-5"><strong>Car Parking</strong></td>
                                    <td class="px-5"><?php 
                                    if ($fetch_getRoomDetails['f_parking'] === '1') {
                                        echo '<i data-feather="check-circle"></i>';
                                    }else {
                                        echo '<i data-feather="x-circle"></i>';
                                    }
                                     ?></td>
                                </tr>


                                <tr>
                                    <td class="px-5"><strong>Telephone / Internet Connection</strong></td>
                                    <td class="px-5"><?php 
                                    if ($fetch_getRoomDetails['f_internet'] === '1') {
                                        echo '<i data-feather="check-circle"></i>';
                                    }else {
                                        echo '<i data-feather="x-circle"></i>';
                                    }
                                     ?></td>
                                </tr>


                                <tr>
                                    <td class="px-5"><strong>Kitchen</strong></td>
                                    <td class="px-5"><?php 
                                    if ($fetch_getRoomDetails['f_kitchen'] === '1') {
                                        echo '<i data-feather="check-circle"></i>';
                                    }else {
                                        echo '<i data-feather="x-circle"></i>';
                                    }
                                     ?></td>
                                </tr>

                                <tr>
                                    <td class="px-5"><strong>Flat Location</strong></td>
                                    <td><?php echo $fetch_getRoomDetails['loc_name'] ?></td>
                                </tr>

                                <tr>
                                    <td class="px-5"><strong>Flat Address</strong></td>
                                    <td><?php echo $fetch_getRoomDetails['f_address'] ?></td>
                                </tr>


                                <tr>
                                    <td class="px-5"><strong>Flat Status</strong></td>
                                    <td><?php 
                                    if ($fetch_getRoomDetails['f_status'] === '1') {
                                        echo 'Booked';
                                    }else {
                                        echo 'Avail';
                                    }
                                     ?></td>
                                </tr>

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
                        <h5>Flat Gallery</h5>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <?php
                            $getHouseGallery = mysqli_query($connect, "SELECT * FROM flat_gallery WHERE f_id = '$f_id'");
                            
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