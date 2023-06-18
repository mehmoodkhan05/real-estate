<?php
    include '../../../_stream/db_config.php';

    $id = $_GET['id'];
    $getOwnerQuery = mysqli_query($connect, "SELECT * FROM `owner` WHERE o_id = '$id'");
    $fetch_getOwnerQuery = mysqli_fetch_assoc($getOwnerQuery);

    $alert = '';

    if (isset($_POST["edit_owner"])) {
        $o_name = $_POST['o_name'];
        $o_cnic = $_POST['o_cnic'];
        $o_gender = $_POST['o_gender'];
        $o_phone = $_POST['o_phone'];
        $o_loc = $_POST['o_loc'];
        $o_address = $_POST['o_address'];
        $o_type = $_POST['o_type'];
        $o_status = $_POST['o_status'];
        $id = $_POST['id'];

        $countEmail = mysqli_query($connect, "SELECT COUNT(*) AS countedEmails FROM `owner` WHERE o_email = '$o_email'");
        $fetch_countEmail = mysqli_fetch_assoc($countEmail);

        if ($fetch_countEmail['countedEmails'] < 1) {
            $updateQuery = mysqli_query($connect, "UPDATE `owner` SET 
            `o_name` = '$o_name',
             `o_cnic` = '$o_cnic',
              `o_gender` = '$o_gender',
               `o_cell` = '$o_phone',
                  `o_address` = '$o_address',
                   `loc_id` = '$o_loc',
                    `o_type` = '$o_type',
                     `o_status` = '$o_status'
                      WHERE o_id = '$id'");

            if ($updateQuery) {
                header("LOCATION: adminList.php");
            }else {
                $alert = '
                <div class="alert alert-danger text-center rounded-pill">
                    <strong>Admin Not Added!</strong>
                </div>
                ';
            }
        }else {
            $alert = '
                <div class="alert alert-warning text-center rounded-pill">
                    <strong>Email already added!</strong>
                </div>
            ';
        }
    }


    include '../../includes/header.php';
?>

<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Edit Admin</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
        <div class="card">
            <!-- <div class="card-header pb-0">
            <h5>Add Owners</h5>
            </div> -->
            <form class="form theme-form" method="POST">
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <div class="mb-3">
                        <label class="form-label">Owner Name</label>
                        <input class="form-control btn-pill" type="text" value="<?php echo $fetch_getOwnerQuery['o_name'] ?>" name="o_name" placeholder="Example: Khan" required>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                        <label class="form-label">Owner CNIC</label>
                        <input class="form-control btn-pill" type="number" value="<?php echo $fetch_getOwnerQuery['o_cnic'] ?>" name="o_cnic" placeholder="15xxxxxxxxxxx" required>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                        <label class="form-label">Gender</label>
                        <select class="form-control inputClass" name="o_gender" required>
                            <?php
                            if ($fetch_getOwnerQuery['o_gender'] === '1') {
                                echo '
                                    <option value="1" selected>Male</option>
                                    <option value="2">Female</option>
                                    <option value="3">Other</option>
                                ';
                            }elseif ($fetch_getOwnerQuery['o_gender'] === '2') {
                                echo '
                                    <option value="1">Male</option>
                                    <option value="2" selected>Female</option>
                                    <option value="3">Other</option>
                                ';
                            }elseif ($fetch_getOwnerQuery['o_gender'] === '3') {
                                echo '
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                    <option value="3" selected>Other</option>
                                ';
                            }
                            ?>
                            
                        </select>
                        </div>
                    </div>
                </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                            <label class="form-label">Owner Phone No</label>
                            <input class="form-control btn-pill" value="0<?php echo $fetch_getOwnerQuery['o_cell'] ?>" type="number" name="o_phone" placeholder="03xxxxxxxxx" required>
                            </div>
                        </div>

                    <div class="col-4">
                        <div class="mb-3">
                        <label class="form-label">Owner Email</label>
                        <input class="form-control btn-pill" disabled type="email" value="<?php echo $fetch_getOwnerQuery['o_email'] ?>" name="o_email" placeholder="example@example.com" required>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                        <label class="form-label">Owner Password</label>
                        <input class="form-control btn-pill" disabled type="text" value="<?php echo $fetch_getOwnerQuery['o_password'] ?>" name="o_password" placeholder="Enter Your Password Here..." required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <div class="mb-3">
                            <label class="form-label">Location</label>
                            <?php
                            $retLocQuery = mysqli_query($connect, "SELECT * FROM `location`");

                            echo '<select class="form-control inputClass" name="o_loc" required>';
                            while ($rowLoc = mysqli_fetch_assoc($retLocQuery)) {
                                if ($rowLoc['loc_id'] === $fetch_getOwnerQuery['loc_id']) {
                                    echo '<option value="'.$rowLoc['loc_id'].'" selected>'.$rowLoc['loc_name'].'</option>';
                                }else {
                                    echo '<option value="'.$rowLoc['loc_id'].'" >'.$rowLoc['loc_name'].'</option>';
                                }
                            }
                            echo '</select>';
                            ?>
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="mb-9">
                            <label class="form-label">Owner Address</label>
                            <input class="form-control btn-pill" value="<?php echo $fetch_getOwnerQuery['o_address'] ?>"  name="o_address" type="text" placeholder="Enter owner address here..." required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <div class="mb-3">
                        <label class="form-label">Owner Type</label>
                        <select class="form-control inputClass" name="o_type" required>
                            <?php
                                if ($fetch_getOwnerQuery['o_type'] === '1') {
                                    echo '
                                        <option value="1" selected>Admin</option>
                                        <option value="2">Property Owner</option>
                                    ';
                                }elseif ($fetch_getOwnerQuery['o_type'] === '2') {
                                    echo '
                                        <option value="1">Admin</option>
                                        <option value="2" selected>Property Owner</option>
                                    ';
                                }
                            ?>
                        </select>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-control inputClass" name="o_status" required>
                            <?php
                                if ($fetch_getOwnerQuery['o_status'] === '1') {
                                    echo '
                                        <option value="1" selected>Active</option>
                                        <option value="2">In-Active</option>
                                    ';
                                }elseif ($fetch_getOwnerQuery['o_status'] === '0') {
                                    echo '
                                        <option value="1">Active</option>
                                        <option value="2" selected>In-Active</option>
                                    ';
                                }
                            ?>
                        </select>
                        </div>
                    </div>
                </div>

                <input type="hidden" value="<?php echo $id ?>" name="id">

                <?php echo $alert; ?>
            </div>
            <div class="card-footer text-end">
                <button class="btn btn-primary" name="edit_owner" type="submit">Update</button>
                <a href="adminList.php" class="btn btn-light">Cancel</a>
            </div>
            </form>
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