<?php
    include '../../../_stream/db_config.php';

    $alert = '';

    $r_id = $_GET['id'];

    $getRoomDetails = mysqli_query($connect, "SELECT rooms.*, location.loc_name, owner.* FROM `rooms`
    INNER JOIN location ON location.loc_id = rooms.r_loc
    INNER JOIN owner ON owner.o_id = rooms.o_id
    WHERE rooms.r_id = '$r_id'");

    $fetch_getRoomDetails = mysqli_fetch_assoc($getRoomDetails);


    include '../../includes/header.php';

?>


<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Room Details</h3>
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
                                    <td class="px-5"><strong>Room Bed</strong></td>
                                    <td>
                                        <?php 
                                        if ($fetch_getRoomDetails['r_bed_size'] === '1') {
                                            echo 'Queen Size';
                                        }elseif ($fetch_getRoomDetails['r_bed_size'] === '2') {
                                            echo 'King Size';
                                        }elseif ($fetch_getRoomDetails['r_bed_size'] === '3') {
                                            echo 'Single Bed';
                                        }elseif ($fetch_getRoomDetails['r_bed_size'] === '4') {
                                            echo 'Twins Bed';
                                        } ?></td>
                                </tr>

                                <tr>
                                    <td class="px-5"><strong>Room Area</strong></td>
                                    <td><?php echo $fetch_getRoomDetails['r_area'] ?> SQFT</td>
                                </tr>

                                <tr>
                                    <td class="px-5"><strong>AC Facility</strong></td>
                                    <td class="px-5"><?php 
                                    if ($fetch_getRoomDetails['r_ac'] === '1') {
                                        echo '<i data-feather="check-circle"></i>';
                                    }else {
                                        echo '<i data-feather="x-circle"></i>';
                                    }
                                     ?></td>
                                </tr>

                                <tr>
                                    <td class="px-5"><strong>Gas Connection</strong></td>
                                    <td class="px-5"><?php 
                                    if ($fetch_getRoomDetails['r_gas'] === '1') {
                                        echo '<i data-feather="check-circle"></i>';
                                    }else {
                                        echo '<i data-feather="x-circle"></i>';
                                    }
                                     ?></td>
                                </tr>

                                <tr>
                                    <td class="px-5"><strong>Heater</strong></td>
                                    <td class="px-5"><?php 
                                    if ($fetch_getRoomDetails['r_heater'] === '1') {
                                        echo '<i data-feather="check-circle"></i>';
                                    }else {
                                        echo '<i data-feather="x-circle"></i>';
                                    }
                                     ?></td>
                                </tr>

                                <tr>
                                    <td class="px-5"><strong>Telephone Connection</strong></td>
                                    <td class="px-5"><?php 
                                    if ($fetch_getRoomDetails['r_t_phone'] === '1') {
                                        echo '<i data-feather="check-circle"></i>';
                                    }else {
                                        echo '<i data-feather="x-circle"></i>';
                                    }
                                     ?></td>
                                </tr>

                                <tr>
                                    <td class="px-5"><strong>Electricity Connection</strong></td>
                                    <td class="px-5"><?php 
                                    if ($fetch_getRoomDetails['r_electricity'] === '1') {
                                        echo '<i data-feather="check-circle"></i>';
                                    }else {
                                        echo '<i data-feather="x-circle"></i>';
                                    }
                                     ?></td>
                                </tr>

                                <tr>
                                    <td class="px-5"><strong>Room Location</strong></td>
                                    <td><?php echo $fetch_getRoomDetails['loc_name'] ?></td>
                                </tr>


                                <tr>
                                    <td class="px-5"><strong>Address</strong></td>
                                    <td><?php echo $fetch_getRoomDetails['r_address'] ?></td>
                                </tr>


                                <tr>
                                    <td class="px-5"><strong>Price</strong></td>
                                    <td><?php echo $fetch_getRoomDetails['r_price'] ?></td>
                                </tr>

                                <tr>
                                    <td class="px-5"><strong>Room Status</strong></td>
                                    <td><?php 
                                    if ($fetch_getRoomDetails['r_status'] === '1') {
                                        echo 'Booked';
                                    }else {
                                        echo 'Avail';
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
                        <h5>Room Gallery</h5>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <?php
                            
                            $getRoomGallery = mysqli_query($connect, "SELECT * FROM room_gallery WHERE r_id = '$r_id'");
                            
                            $count = mysqli_num_rows($getRoomGallery);

                            if ($count < 1) {
                                echo '
                                <div class="col-12">
                                    <h3 class="text-center">No image found!</h3>
                                </div>
                                ';
                            }else {
                                while ($rowGallery = mysqli_fetch_assoc($getRoomGallery)) {
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