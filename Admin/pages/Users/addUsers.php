<?php
    include '../../includes/header.php'
?>


<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Users</h3>
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
                        <h5>Add User</h5>
                    </div>
                    <form class="form theme-form">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">User Contact</label>
                                    <input class="form-control btn-pill" type="number" placeholder="User Phone Number">
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">User Area</label>
                                    <select class="form-control btn-pill">
                                        <option value="">Mingora</option>
                                        <option value="">Saidu</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">User Location</label>
                                    <input class="form-control btn-pill" type="text" placeholder="Enter User Location">
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">User Gender</label>
                                    <select class="form-control btn-pill">
                                        <option value="">Male</option>
                                        <option value="">Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">User Email</label>
                                    <input class="form-control btn-pill" type="text" placeholder="Enter User Email">
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">User Password</label>
                                    <input class="form-control btn-pill" type="text" placeholder="Enter Password">
                                </div>
                            </div>


                        </div>
                    </div>
                    
                    <div class="card-footer text-end">
                        <button class="btn btn-primary" type="submit">Submit</button>
                        <input class="btn btn-light" type="reset" value="Cancel">
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