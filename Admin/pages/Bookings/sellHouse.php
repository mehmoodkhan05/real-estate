<?php
    include '../../../_stream/db_config.php';
    
    include '../../includes/header.php';

    $user = $_SESSION['user'];

    $selectQuery= mysqli_query($connect, "SELECT o_id from owner WHERE o_email = '$user'");
    $fetch_query = mysqli_fetch_assoc($selectQuery);

    $id = $fetch_query['o_id'];
?>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Bookings</h3>
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
                <h5>Bookings List (Houses Sell)</h5>
            </div>
            <div class="card-body">
            <div class="table-responsive table">
                <table class="display" id="basic-1">
                <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>Booked By</th>
                        <th>Quoted</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Contact</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tobody>
                    <?php
                        $iteration = 1;

                        $query = mysqli_query($connect, "SELECT house_buy.*,users.name AS user_name, users.contact, houses.h_price, houses.o_id FROM `house_buy`
                        INNER JOIN users ON users.email = house_buy.email
                        INNER JOIN houses ON houses.h_id = house_buy.h_id
                        WHERE houses.o_id = '$id'");
                        
                        while ($row = mysqli_fetch_assoc($query)) {
                            echo '
                            <tr>
                                <td>'.$iteration++.'</td>
                                <td>'.$row['user_name'].'</td>
                                <td>'.$row['quoted_price'].'</td>
                                <td>'.$row['h_price'].'</td>';

                                if ($row['b_status'] === '0') {
                                    echo '<td>Rejected</td>';
                                }elseif ($row['b_status'] === '1') {
                                    echo '<td>Accepted</td>';
                                }
                                elseif ($row['b_status'] === '2') {
                                    echo '<td>Pending</td>';
                                }
                                echo '
                                <td>0'.$row['contact'].'</td>
                                <td>
                                    <a href="changeHouseBookingSell.php?id='.$row['h_buy_id'].'" class="btn btn-primary">Change Status!</a>
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