<?php
    include '../../../_stream/db_config.php';
    
    include '../../includes/header.php';
?>

<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Plots</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
    <div class="row">
        <!-- Zero Configuration  Starts-->
        <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
            <h5>Plots List</h5>
            </div>
            <div class="card-body">
            <div class="table-responsive table">
                <table class="display" id="basic-1">
                <thead>
                    <tr>
                        <th>S. No.</th>
                        <th>Plot Location</th>
                        <th>Plot Area</th>
                        <th>Plot Price</th>
                        <th>Plot Allocate</th>
                        <th>Plot Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tobody>
                    <?php
                    $iteration = 1;
                    $getPlots = mysqli_query($connect, "SELECT plots.*, location.loc_name FROM `plots`
                    INNER JOIN location ON location.loc_id = plots.p_loc");

                    while ($rowPlots = mysqli_fetch_assoc($getPlots)) {
                        echo ' 
                        <tr>
                            <td>'.$iteration++.'</td>
                            <td>'.$rowPlots['loc_name'].'</td>
                            <td>'.$rowPlots['p_area'].'</td>
                            <td>'.$rowPlots['p_price'].'</td>';

                            if ($rowPlots['p_allocate'] === '1') {
                                echo '<td>On Road</td>';
                            }else {
                                echo '<td>Away Road</td>';
                            }

                            if ($rowPlots['p_status'] === '1') {
                                echo '<td>Avalaible</td>';
                            }else {
                                echo '<td>Not Available</td>';
                            }

                            echo '
                            <td>
                                <a href="addGallery.php?id='.$rowPlots['p_id'].'" class="btn btn-success"><i data-feather="image"></i></a>
                                <a href="editRoom.php?id='.$rowPlots['p_id'].'" class="btn btn-info"><i data-feather="edit"></i></a>
                            </td>
                        </tr>
                        ';
                    }
                    ?>
                </tobody>
                </table>
            </div>
            </div>
        </div>
        </div>
        <!-- Zero Configuration  Ends-->
        
    </div>
    </div>
    <!-- Container-fluid Ends-->
</div>


<?php
    include '../../includes/footer.php'
?>