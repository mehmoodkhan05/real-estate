<?php
    include '../../../_stream/db_config.php';

    $alert = '';

    $p_id = $_GET['id'];

    $getPlotDetails = mysqli_query($connect, "SELECT plots.*, location.loc_name, owner.* FROM `plots`
    INNER JOIN location ON location.loc_id = plots.p_loc
    
    INNER JOIN owner ON owner.o_id = plots.o_id
    WHERE plots.p_id = '$p_id'");

    $fetch_getPlotDetails = mysqli_fetch_assoc($getPlotDetails);

    include '../../includes/header.php';
?>


<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Plot</h3>
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
                                    <td><?php echo $fetch_getPlotDetails['o_name'] ?></td>
                                </tr>

                                <tr>
                                    <td class="px-5"><strong>Owner Contact</strong></td>
                                    <td>0<?php echo $fetch_getPlotDetails['o_cell'] ?></td>
                                </tr>

                                <tr>
                                    <td class="px-5"><strong>Owner Address</strong></td>
                                    <td><?php echo $fetch_getPlotDetails['o_address'] ?></td>
                                </tr>


                                <tr>
                                    <td class="px-5"><strong>Plot Area</strong></td>
                                    <td><?php echo $fetch_getPlotDetails['p_area'] ?> SQFT</td>
                                </tr>

                                <tr>
                                    <td class="px-5"><strong>Plot Allocate</strong></td>
                                    <td>
                                    <?php 
                                    if ($fetch_getPlotDetails['p_allocate'] === '1') {
                                        echo 'On Road';
                                    }else {
                                        echo 'Away Road';
                                    }
                                     ?></td>
                                </tr>


                                <tr>
                                    <td class="px-5"><strong>Room Location</strong></td>
                                    <td><?php echo $fetch_getPlotDetails['loc_name'] ?></td>
                                </tr>


                                <tr>
                                    <td class="px-5"><strong>Address</strong></td>
                                    <td><?php echo $fetch_getPlotDetails['p_address'] ?></td>
                                </tr>


                                <tr>
                                    <td class="px-5"><strong>Plot Price</strong></td>
                                    <td><?php echo $fetch_getPlotDetails['p_price'] ?></td>
                                </tr>

                                <tr>
                                    <td class="px-5"><strong>Plot Status</strong></td>
                                    <td><?php 
                                    if ($fetch_getPlotDetails['p_status'] === '1') {
                                        echo 'Sold';
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
                        <h5>Plot Gallery</h5>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <?php
                            $getPlotGallery = mysqli_query($connect, "SELECT * FROM plot_gallery WHERE p_id = '$p_id'");
                            
                            $count = mysqli_num_rows($getPlotGallery);

                            if ($count < 1) {
                                echo '
                                <div class="col-12">
                                    <h3 class="text-center">No image found!</h3>
                                </div>
                                ';
                            }else {
                                while ($rowGallery = mysqli_fetch_assoc($getPlotGallery)) {
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