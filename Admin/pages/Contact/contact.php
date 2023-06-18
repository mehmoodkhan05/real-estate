<?php
    include '../../../_stream/db_config.php';
    
    include '../../includes/header.php';
?>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Contact</h3>
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
            <h5>Contact List</h5>
            </div>
            <div class="card-body">
            <div class="table-responsive table">
                <table class="display" id="basic-1">
                <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tobody>
                    <?php
                        $iteration = 1;

                        $FeedBack = mysqli_query($connect, "SELECT * FROM `feedback_table`");
                        
                        while ($Row = mysqli_fetch_assoc($FeedBack)) {
                            echo '
                            <tr>
                                <td>'.$iteration++.'</td>
                                <td>'.$Row['name'].'</td>
                                <td>'.$Row['email'].'</td>
                                <td>'.$Row['message'].'</td>
                                
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