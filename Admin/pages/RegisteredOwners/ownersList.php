<?php
    include '../../../_stream/db_config.php';

    include '../../includes/header.php';
?>

<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Owner</h3>
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
            <h5>Owner List</h5>
            </div>
            <div class="card-body">
            <div class="table-responsive table">
                <table class="display" id="basic-1">
                <thead>
                    <tr>
                        <th>S. No.</th>
                        <th>Name</th>
                        <th>CNIC</th>
                        <th>Cell</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Location</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tobody>
                    <?php
                        $retOwnerData = mysqli_query($connect, "SELECT owner.*, location.loc_name FROM `owner`
                        INNER JOIN location ON location.loc_id = owner.loc_id
                        WHERE owner.o_type = '2'");

                        $iteration = 1;
                        while ($rowData = mysqli_fetch_assoc($retOwnerData)) {
                            echo '
                            <tr>
                                <td>'.$iteration++.'</td>
                                <td>'.$rowData['o_name'].'</td>
                                <td>'.$rowData['o_cnic'].'</td>
                                <td>0'.$rowData['o_cell'].'</td>
                                <td>'.$rowData['o_email'].'</td>';

                                if ($rowData['o_status'] === '1') {
                                    echo '<td>Active</td>';
                                }else {
                                    echo '<td>In-Active</td>';
                                }
                                
                                echo '
                                <td>'.$rowData['loc_name'].'</td>

                                <td>
                                    <a href="editPropertyOwner.php?id='.$rowData['o_id'].'" class="btn btn-success">Edit</a>
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