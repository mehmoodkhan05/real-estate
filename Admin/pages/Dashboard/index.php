<?php
    include '../../includes/header.php';
    include '../../../_stream/config.php';
  $user = $_SESSION['user'];

  $selectQuery= mysqli_query($connect, "SELECT o_id from owner WHERE o_email = '$user'");
  $fetch_query = mysqli_fetch_assoc($selectQuery);

  $id = $fetch_query['o_id'];

  $plot = mysqli_query($connect, "SELECT COUNT(*)AS plots FROM `plots` WHERE o_id = '$id'");
  $fetchPlot = mysqli_fetch_assoc($plot);


  $flat = mysqli_query($connect, "SELECT COUNT(*)AS flats FROM `flats` WHERE o_id = '$id'");
  $fetchFlat = mysqli_fetch_assoc($flat);


  $house = mysqli_query($connect, "SELECT COUNT(*)AS houses FROM `houses` WHERE o_id = '$id'");
  $fetchHouse = mysqli_fetch_assoc($house);


  $room = mysqli_query($connect, "SELECT COUNT(*)AS rooms FROM `rooms` WHERE o_id = '$id'");
  $fetchRoom = mysqli_fetch_assoc($room);
?>
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <!-- Container-fluid starts-->
          <div class="container-fluid dashboard-default-sec">
            <div class="row">
              <div class="col-xl-12 box-col-12 des-xl-100"> 
                <div class="row">

                  <div class="col-md-3  rate-sec">
                    <div class="card income-card card-primary">                                 
                      <div class="card-body text-center">                                  
                        <div class="round-box">
                          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 448.057 448.057" style="enable-background:new 0 0 448.057 448.057;" xml:space="preserve">
                            <g>
                              <g>
                                <path d="M404.562,7.468c-0.021-0.017-0.041-0.034-0.062-0.051c-13.577-11.314-33.755-9.479-45.069,4.099                                            c-0.017,0.02-0.034,0.041-0.051,0.062l-135.36,162.56L88.66,11.577C77.35-2.031,57.149-3.894,43.54,7.417                                            c-13.608,11.311-15.471,31.512-4.16,45.12l129.6,155.52h-40.96c-17.673,0-32,14.327-32,32s14.327,32,32,32h64v144                                            c0,17.673,14.327,32,32,32c17.673,0,32-14.327,32-32v-180.48l152.64-183.04C419.974,38.96,418.139,18.782,404.562,7.468z"></path>
                              </g>
                            </g>
                            <g>
                              <g>
                                <path d="M320.02,208.057h-16c-17.673,0-32,14.327-32,32s14.327,32,32,32h16c17.673,0,32-14.327,32-32                                            S337.694,208.057,320.02,208.057z"></path>
                              </g>
                            </g>
                          </svg>
                        </div>
                        <h5><?php echo $fetchHouse['houses'] ?></h5>
                        <p>Houses</p>
                        <div class="parrten">
                          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 448.057 448.057" style="enable-background:new 0 0 448.057 448.057;" xml:space="preserve">
                            <g>
                              <g>
                                <path d="M404.562,7.468c-0.021-0.017-0.041-0.034-0.062-0.051c-13.577-11.314-33.755-9.479-45.069,4.099                                            c-0.017,0.02-0.034,0.041-0.051,0.062l-135.36,162.56L88.66,11.577C77.35-2.031,57.149-3.894,43.54,7.417                                            c-13.608,11.311-15.471,31.512-4.16,45.12l129.6,155.52h-40.96c-17.673,0-32,14.327-32,32s14.327,32,32,32h64v144                                            c0,17.673,14.327,32,32,32c17.673,0,32-14.327,32-32v-180.48l152.64-183.04C419.974,38.96,418.139,18.782,404.562,7.468z"></path>
                              </g>
                            </g>
                            <g>
                              <g>
                                <path d="M320.02,208.057h-16c-17.673,0-32,14.327-32,32s14.327,32,32,32h16c17.673,0,32-14.327,32-32                                            S337.694,208.057,320.02,208.057z">                                  </path>
                              </g>
                            </g>
                          </svg>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3 rate-sec">
                    <div class="card income-card card-primary">                                 
                      <div class="card-body text-center">                                  
                        <div class="round-box">
                          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 448.057 448.057" style="enable-background:new 0 0 448.057 448.057;" xml:space="preserve">
                            <g>
                              <g>
                                <path d="M404.562,7.468c-0.021-0.017-0.041-0.034-0.062-0.051c-13.577-11.314-33.755-9.479-45.069,4.099                                            c-0.017,0.02-0.034,0.041-0.051,0.062l-135.36,162.56L88.66,11.577C77.35-2.031,57.149-3.894,43.54,7.417                                            c-13.608,11.311-15.471,31.512-4.16,45.12l129.6,155.52h-40.96c-17.673,0-32,14.327-32,32s14.327,32,32,32h64v144                                            c0,17.673,14.327,32,32,32c17.673,0,32-14.327,32-32v-180.48l152.64-183.04C419.974,38.96,418.139,18.782,404.562,7.468z"></path>
                              </g>
                            </g>
                            <g>
                              <g>
                                <path d="M320.02,208.057h-16c-17.673,0-32,14.327-32,32s14.327,32,32,32h16c17.673,0,32-14.327,32-32                                            S337.694,208.057,320.02,208.057z"></path>
                              </g>
                            </g>
                          </svg>
                        </div>
                        <h5><?php echo $fetchPlot['plots'] ?></h5>
                        <p>Plots</p>
                        <div class="parrten">
                          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 448.057 448.057" style="enable-background:new 0 0 448.057 448.057;" xml:space="preserve">
                            <g>
                              <g>
                                <path d="M404.562,7.468c-0.021-0.017-0.041-0.034-0.062-0.051c-13.577-11.314-33.755-9.479-45.069,4.099                                            c-0.017,0.02-0.034,0.041-0.051,0.062l-135.36,162.56L88.66,11.577C77.35-2.031,57.149-3.894,43.54,7.417                                            c-13.608,11.311-15.471,31.512-4.16,45.12l129.6,155.52h-40.96c-17.673,0-32,14.327-32,32s14.327,32,32,32h64v144                                            c0,17.673,14.327,32,32,32c17.673,0,32-14.327,32-32v-180.48l152.64-183.04C419.974,38.96,418.139,18.782,404.562,7.468z"></path>
                              </g>
                            </g>
                            <g>
                              <g>
                                <path d="M320.02,208.057h-16c-17.673,0-32,14.327-32,32s14.327,32,32,32h16c17.673,0,32-14.327,32-32                                            S337.694,208.057,320.02,208.057z">                                  </path>
                              </g>
                            </g>
                          </svg>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3 rate-sec">
                    <div class="card income-card card-primary">                                 
                      <div class="card-body text-center">                                  
                        <div class="round-box">
                          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 448.057 448.057" style="enable-background:new 0 0 448.057 448.057;" xml:space="preserve">
                            <g>
                              <g>
                                <path d="M404.562,7.468c-0.021-0.017-0.041-0.034-0.062-0.051c-13.577-11.314-33.755-9.479-45.069,4.099                                            c-0.017,0.02-0.034,0.041-0.051,0.062l-135.36,162.56L88.66,11.577C77.35-2.031,57.149-3.894,43.54,7.417                                            c-13.608,11.311-15.471,31.512-4.16,45.12l129.6,155.52h-40.96c-17.673,0-32,14.327-32,32s14.327,32,32,32h64v144                                            c0,17.673,14.327,32,32,32c17.673,0,32-14.327,32-32v-180.48l152.64-183.04C419.974,38.96,418.139,18.782,404.562,7.468z"></path>
                              </g>
                            </g>
                            <g>
                              <g>
                                <path d="M320.02,208.057h-16c-17.673,0-32,14.327-32,32s14.327,32,32,32h16c17.673,0,32-14.327,32-32                                            S337.694,208.057,320.02,208.057z"></path>
                              </g>
                            </g>
                          </svg>
                        </div>
                        <h5><?php echo  $fetchFlat['flats'] ?></h5>
                        <p>Flats</p>
                        <div class="parrten">
                          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 448.057 448.057" style="enable-background:new 0 0 448.057 448.057;" xml:space="preserve">
                            <g>
                              <g>
                                <path d="M404.562,7.468c-0.021-0.017-0.041-0.034-0.062-0.051c-13.577-11.314-33.755-9.479-45.069,4.099                                            c-0.017,0.02-0.034,0.041-0.051,0.062l-135.36,162.56L88.66,11.577C77.35-2.031,57.149-3.894,43.54,7.417                                            c-13.608,11.311-15.471,31.512-4.16,45.12l129.6,155.52h-40.96c-17.673,0-32,14.327-32,32s14.327,32,32,32h64v144                                            c0,17.673,14.327,32,32,32c17.673,0,32-14.327,32-32v-180.48l152.64-183.04C419.974,38.96,418.139,18.782,404.562,7.468z"></path>
                              </g>
                            </g>
                            <g>
                              <g>
                                <path d="M320.02,208.057h-16c-17.673,0-32,14.327-32,32s14.327,32,32,32h16c17.673,0,32-14.327,32-32                                            S337.694,208.057,320.02,208.057z">                                  </path>
                              </g>
                            </g>
                          </svg>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3 rate-sec">
                    <div class="card income-card card-primary">                                 
                      <div class="card-body text-center">                                  
                        <div class="round-box">
                          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 448.057 448.057" style="enable-background:new 0 0 448.057 448.057;" xml:space="preserve">
                            <g>
                              <g>
                                <path d="M404.562,7.468c-0.021-0.017-0.041-0.034-0.062-0.051c-13.577-11.314-33.755-9.479-45.069,4.099                                            c-0.017,0.02-0.034,0.041-0.051,0.062l-135.36,162.56L88.66,11.577C77.35-2.031,57.149-3.894,43.54,7.417                                            c-13.608,11.311-15.471,31.512-4.16,45.12l129.6,155.52h-40.96c-17.673,0-32,14.327-32,32s14.327,32,32,32h64v144                                            c0,17.673,14.327,32,32,32c17.673,0,32-14.327,32-32v-180.48l152.64-183.04C419.974,38.96,418.139,18.782,404.562,7.468z"></path>
                              </g>
                            </g>
                            <g>
                              <g>
                                <path d="M320.02,208.057h-16c-17.673,0-32,14.327-32,32s14.327,32,32,32h16c17.673,0,32-14.327,32-32                                            S337.694,208.057,320.02,208.057z"></path>
                              </g>
                            </g>
                          </svg>
                        </div>
                        <h5><?php echo  $fetchRoom['rooms'] ?></h5>
                        <p>Rooms</p><div class="parrten">
                          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 448.057 448.057" style="enable-background:new 0 0 448.057 448.057;" xml:space="preserve">
                            <g>
                              <g>
                                <path d="M404.562,7.468c-0.021-0.017-0.041-0.034-0.062-0.051c-13.577-11.314-33.755-9.479-45.069,4.099                                            c-0.017,0.02-0.034,0.041-0.051,0.062l-135.36,162.56L88.66,11.577C77.35-2.031,57.149-3.894,43.54,7.417                                            c-13.608,11.311-15.471,31.512-4.16,45.12l129.6,155.52h-40.96c-17.673,0-32,14.327-32,32s14.327,32,32,32h64v144                                            c0,17.673,14.327,32,32,32c17.673,0,32-14.327,32-32v-180.48l152.64-183.04C419.974,38.96,418.139,18.782,404.562,7.468z"></path>
                              </g>
                            </g>
                            <g>
                              <g>
                                <path d="M320.02,208.057h-16c-17.673,0-32,14.327-32,32s14.327,32,32,32h16c17.673,0,32-14.327,32-32                                            S337.694,208.057,320.02,208.057z">                                  </path>
                              </g>
                            </g>
                          </svg>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
<?php
    include '../../includes/footer.php';
?>