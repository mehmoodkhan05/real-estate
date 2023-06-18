<?php
    include '../../../_stream/db_config.php';
    
    include '../../includes/header.php';
?>

<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
    <div class="row">
        <h5>Flats List</h5>
        <!-- Zero Configuration  Starts-->
        <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
            <div class="table-responsive table">
                <table class="display" id="basic-1">
                <thead>
                    <tr>
                    <th>S.No. </th>
                    <th>Owner</th>
                    <th>Location</th>
                    <th>Rooms</th>
                    <th>Floor</th>
                    <th>Area</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Price</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tobody>
                    <?php
                    $iteration = 1;

                    $getFlats = mysqli_query($connect, "SELECT flats.*, location.loc_name, owner.* FROM `flats`
                    INNER JOIN location ON location.loc_id = flats.f_location
                    INNER JOIN owner ON owner.o_id = flats.o_id");

                    while ($rowFlats = mysqli_fetch_assoc($getFlats)) {
                        echo '
                            <tr>
                                <td>'.$iteration++.'</td>
                                <td>'.$rowFlats['o_name'].'</td>
                                <td>'.$rowFlats['loc_name'].'</td>
                                <td>'.$rowFlats['f_room'].'</td>
                                <td>'.$rowFlats['f_floor'].'</td>
                                <td>'.$rowFlats['f_area'].' Sqft</td>';

                                if ($rowFlats['f_type'] === '1') {
                                    echo '<td>Rent</td>';
                                }else {
                                    echo '<td>Sell</td>';
                                }


                                if ($rowFlats['f_status'] === '1') {
                                    echo '<td>Available</td>';
                                }else {
                                    echo '<td>Not Available</td>';
                                }

                                echo '
                                <td>'.$rowFlats['f_price'].'</td>
                                <td>
                                    <a href="viewFlat.php?id='.$rowFlats['f_id'].'" class="btn btn-success"><i data-feather="image"></i></a>
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