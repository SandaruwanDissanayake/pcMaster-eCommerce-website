<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>TEC MASTER</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- <link rel="stylesheet" href="bootstrap.css"> -->


</head>

<body>



    <!-- header -->
    <section>
        <div class="admin-header"> 
            <div class="col-12">
                <div class="row justify-content-center">
                    <div class="col-11 mt-3 mb-3">
                        <div class="row">
                            <div class="col-lg-2 col-6 ">
                                <!-- <h3 class="text-white">LOGO</h3> -->
                                <img src="resouses/bacground_image/tec_master_logo.png" style="width: 90px; margin-top: -30px;" alt="">

                            </div>
                            <div class="col-lg-10 col-6">
                                <div class="justify-content-end">
                                    <div class="col-12">
                                        <div class="row justify-content-end">
                                            <img class="col-lg-3 col-5" src="resouses/user_data/profile-user.png" style="width: 60px;" alt="">
                                            <h5 class=" text-end fs-6 col-lg-3 col-6"><?php echo $admin["fname"] . " " . $admin["lname"]; ?></h5>
                                            <!-- <button class="d-lg-none d-block col-1">d</button> -->

                                            <button class="col-1 selling-btn d-lg-block d-none" onclick="adminLog_out();" style="border: none; background: transparent; font-size: 20px;"><i class="bi bi-box-arrow-in-right"></i></button>

                                            <button class="d-lg-none d-block col-1 offcanvs-btn " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                                                <i class="bi bi-list fs-1"></i>
                                            </button>



                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- header -->
    <!-- offcanvas -->

    <div class="offcanvas offcanvas-start d-block admin-canvas" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">LOGO</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="row ">
                        <div class="col-12 mt-3">
                            <div class="row">
                                <button class="admin-contral-btn" onclick="(window.location='addProduct.php');">Add Product</button>
                            </div>
                        </div>

                        <div class="col-12 mt-3">
                            <div class="row">
                                <button class="admin-contral-btn" onclick="(window.location='manageProduct.php');">Manage Product</button>
                            </div>
                        </div>

                        <div class="col-12 mt-3">
                            <div class="row">
                                <button class="admin-contral-btn">Manage Coustomer</button>
                            </div>
                        </div>


                        <div class="col-12 mt-3">
                            <div class="row">
                                <button class="admin-contral-btn">Customer Massage</button>
                            </div>
                        </div>


                        <div class="col-12 mt-3">
                            <div class="row">
                                <button class="admin-contral-btn">My Profile</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- offcanvas -->


    <script src="bootstrap.bundle.js"></script>
    <!-- <script src="script.js"></script> -->
</body>


</html>