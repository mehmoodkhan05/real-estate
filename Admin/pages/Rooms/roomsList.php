<?php
    include '../../includes/header.php'
?>

<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Room</h3>
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
            <h5>Room List</h5>
            </div>
            <div class="card-body">
            <div class="table-responsive table">
                <table class="display" id="basic-1">
                <thead>
                    <tr>
                    <th>S. No.</th>
                    <th>Location</th>
                    <th>Room Area</th>
                    <th>Bed Size</th>
                    <th>Status</th>
                    <th>Rent Price</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tobody>
                    <?php
                    $iteration = 1;
                    $getRooms = mysqli_query($connect, "SELECT rooms.*, location.loc_name FROM `rooms`
                    INNER JOIN location ON location.loc_id = rooms.r_loc");
                    
                    while ($rowRooms = mysqli_fetch_assoc($getRooms)) {
                        echo '
                        <tr>
                            <td>'.$iteration++.'</td>
                            <td>'.$rowRooms['loc_name'].'</td>
                            <td>'.$rowRooms['r_area'].' Sqft</td>';

                            if ($rowRooms['r_bed_size'] === '1') {
                                echo '<td>Queen Size</td>';
                            }elseif ($rowRooms['r_bed_size'] === '2') {
                                echo '<td>King Size</td>';
                            }elseif ($rowRooms['r_bed_size'] === '3') {
                                echo '<td>Single Bed</td>';
                            }elseif ($rowRooms['r_bed_size'] === '4') {
                                echo '<td>Twin Bed</td>';
                            }

                            if ($rowRooms['r_status'] === '1') {
                                echo '<td>Available</td>';
                            }else {
                                echo '<td>Not Available</td>';
                            }
                            echo '
                            <td>'.$rowRooms['r_price'].'</td>
                            
                            <td>
                                <a href="addGallery.php?id='.$rowRooms['r_id'].'" class="btn btn-success"><i data-feather="image"></i></a>
                                <a href="editRoom.php?id='.$rowRooms['r_id'].'" class="btn btn-info"><i data-feather="edit"></i></a>
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