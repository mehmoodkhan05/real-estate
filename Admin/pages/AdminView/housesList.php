<?php
    include '../../../_stream/db_config.php';
    
    include '../../includes/header.php';
?>
<div class="page-body">
    <!-- Container-fluid starts-->
    <div class="container-fluid">
    <div class="row">
        <h5>House List</h5>
        <!-- Zero Configuration  Starts-->
        <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
            <div class="table-responsive table">
                <table class="display" id="basic-1">
                <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>Owner</th>
                        <th>Location</th>
                        <th>Rooms</th>
                        <th>Floors</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tobody>
                    <?php
                    $getHouses = mysqli_query($connect, "SELECT houses.*, location.loc_name, owner.* FROM `houses`
                    INNER JOIN location ON location.loc_id = houses.h_location
                    INNER JOIN owner ON owner.o_id = houses.o_id");
                    
                    $iteration = 1;

                    while ($rowHouses = mysqli_fetch_assoc($getHouses)) {
                        echo '
                        <tr>
                            <td>'.$iteration++.'</td>
                            <td>'.$rowHouses['o_name'].'</td>
                            <td>'.$rowHouses['loc_name'].'</td>
                            <td>'.$rowHouses['h_rooms'].'</td>
                            <td>'.$rowHouses['h_floors'].'</td>';
                            
                            if ($rowHouses['h_type'] === '1') {
                                echo '<td>Rent</td>';
                            }else {
                                echo '<td>Sell</td>';
                            }
                        echo '
                            <td>'.$rowHouses['h_price'].'</td>';
                            
                            if ($rowHouses['h_status'] === '1') {
                                echo '<td>Available</td>';
                            }else {
                                echo '<td>Not Available</td>';
                            }

                        echo '
                            <td>
                                <a href="viewHouse.php?id='.$rowHouses['h_id'].'" class="btn btn-info"><i data-feather="eye"></i></a>
                            </td>
                        </tr>';
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