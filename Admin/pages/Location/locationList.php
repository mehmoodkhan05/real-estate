<?php
    include '../../../_stream/db_config.php';
    
    include '../../includes/header.php';
?>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Location</h3>
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
            <h5>Locations List</h5>
            </div>
            <div class="card-body">
            <div class="table-responsive table">
                <table class="display" id="basic-1">
                <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>Location</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tobody>
                    <?php
                        $iteration = 1;

                        $locationQuery = mysqli_query($connect, "SELECT * FROM `location`");
                        
                        while ($rowLocation = mysqli_fetch_assoc($locationQuery)) {
                            echo '
                            <tr>
                                <td>'.$iteration++.'</td>
                                <td>'.$rowLocation['loc_name'].'</td>
                                <td>
                                    <a href="editLocation.php?loc_id='.$rowLocation['loc_id'].'" class="btn btn-primary">Edit!</a>
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