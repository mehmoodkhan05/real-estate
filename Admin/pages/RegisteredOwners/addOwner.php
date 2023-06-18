<?php
    include '../../../_stream/db_config.php';
    

    $alert = '';

    if (isset($_POST["add_owner"])) {
        $o_name = $_POST['o_name'];
        $o_cnic = $_POST['o_cnic'];
        $o_gender = $_POST['o_gender'];
        $o_phone = $_POST['o_phone'];
        $o_email = $_POST['o_email'];
        $o_password = $_POST['o_password'];
        $o_loc = $_POST['o_loc'];
        $o_address = $_POST['o_address'];
        $o_type = $_POST['o_type'];

        $countEmail = mysqli_query($connect, "SELECT COUNT(*) AS countedEmails FROM `owner` WHERE o_email = '$o_email' OR o_cell = '$o_phone'");
        $fetch_countEmail = mysqli_fetch_assoc($countEmail);

        if ($fetch_countEmail['countedEmails'] < 1) {
            $insertQuery = mysqli_query($connect, "INSERT INTO `owner`
            (`o_name`, `o_cnic`, `o_gender`, `o_cell`, `o_email`, `o_password`, `o_address`, `loc_id`, `o_type`)
            VALUES
            ('$o_name', '$o_cnic', '$o_gender', '$o_phone', '$o_email', '$o_password', '$o_address', '$o_loc',  '$o_type')
            ");

            if ($insertQuery) {
                $alert = '
                <div class="alert alert-success text-center rounded-pill">
                    <strong>Owner Added!</strong>
                </div>
                ';
            }else {
                $alert = '
                <div class="alert alert-danger text-center rounded-pill">
                    <strong>Owner Not Added!</strong>
                </div>
                ';
            }
        }else {
            $alert = '
                <div class="alert alert-warning text-center rounded-pill">
                    <strong>Email or Cell already added!</strong>
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
                    <h3>Owners</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
        <div class="card">
            <div class="card-header pb-0">
            <h5>Add Owners</h5>
            </div>
            <form class="form theme-form" method="POST">
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <div class="mb-3">
                        <label class="form-label">Owner Name</label>
                        <input class="form-control btn-pill" type="text" name="o_name" placeholder="Example: Khan" required>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                        <label class="form-label">Owner CNIC</label>
                        <input class="form-control btn-pill" type="number" name="o_cnic" placeholder="15xxxxxxxxxxx" required>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                        <label class="form-label">Gender</label>
                        <select class="form-control inputClass" name="o_gender" required>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                            <option value="3">Other</option>
                        </select>
                        </div>
                    </div>
                </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                            <label class="form-label">Owner Phone No</label>
                            <input class="form-control btn-pill" type="number" name="o_phone" placeholder="03xxxxxxxxx" required>
                            </div>
                        </div>

                    <div class="col-4">
                        <div class="mb-3">
                        <label class="form-label">Owner Email</label>
                        <input class="form-control btn-pill" type="email" name="o_email" placeholder="example@example.com" required>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mb-3">
                        <label class="form-label">Owner Password</label>
                        <input class="form-control btn-pill" type="password" name="o_password" placeholder="Enter Your Password Here..." required>
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
                            echo '<option value="'.$rowLoc['loc_id'].'" >'.$rowLoc['loc_name'].'</option>';
                        }

                        echo '</select>';
                        ?>
                        
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="mb-9">
                            <label class="form-label">Owner Address</label>
                            <input class="form-control btn-pill"  name="o_address" type="text" placeholder="Enter owner address here..." required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <div class="mb-3">
                        <label class="form-label">Owner Type</label>
                        <select class="form-control inputClass" name="o_type" required>
                            <option value="1">Admin</option>
                            <option value="2">Property Owner</option>
                        </select>
                        </div>
                    </div>
                </div>

                <?php echo $alert; ?>
            </div>
            <div class="card-footer text-end">
                <button class="btn btn-primary" name="add_owner" type="submit">Submit</button>
                <!-- <input class="btn btn-light" type="reset" value="Cancel"> -->
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