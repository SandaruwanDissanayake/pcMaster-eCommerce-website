<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" href="resouses/bacground_image/logo.png">

    <title>TEC MASTER | FROGET PASSWORD</title>


    <meta content="" name="description">
    <meta content="" name="keywords">



    <link href="bootstrap/img/apple-touch-icon.png" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


    <link href="bootstrap/animation/aos/aos.css" rel="stylesheet">
    <link href="bootstrap/animation/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/animation/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="bootstrap/animation/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="bootstrap/animation/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="bootstrap/animation/remixicon/remixicon.css" rel="stylesheet">
    <link href="bootstrap/animation/swiper/swiper-bundle.min.css" rel="stylesheet">


    <link href="bootstrap/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <?php

    require("connection.php");
    session_start();
    if (isset($_SESSION["au"])) {
        $admin = $_SESSION["au"];

    ?>


        <section style="margin-top: -60px; ">
            <?php

            require "adminHeader.php";

            ?>


            <div class="col-12" style="margin-top: -60px;">
                <div class="row">
                    <?php

                    require "panel.php";

                    ?>

                    <div class="col-lg-9 col-12">





                        <section id="addproduct" class="m-4">
                            <div class="col-12">
                                <div class="row justify-content-center">
                                    <div class="col-12">
                                        <div class="row justify-content-center" data-aos="zoom-in">
                                            <h4 class="text-center mt-4">MANAGE COUSTOMER</h4>
                                            <div class="col-6">
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-11">
                                                <div class="row">
                                                    <div class="col-4 border-bottom">
                                                        <h4>Upload Category</h4>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-11">
                                                        <div class="row m-3 shadow-lg">
                                                            <div class="col-lg-4 col-12 mt-2 mb-2">
                                                                <h6>Category Name</h6>

                                                                <input type="text" class="form-control " id="newcategory" style="margin-top: 30px;" placeholder="Enter New Category">
                                                            </div>
                                                            <div class="col-lg-4 col-12">
                                                                <h6>Category Image</h6>
                                                                <input type="file" class="d-none" id="profileimg" iaccept="image/*">

                                                                <label for="profileimg" class=" col-6 mt-5" onclick="changeImage();"> <img src="resouses/product/empty.svg" id="viweImage" style="width: 100px; cursor: pointer; margin-top:-40px" alt="">
                                                                </label>
                                                            </div>
                                                            <div class="col-lg-4 col-12">
                                                                <button class="btn selling-btn mt-5" onclick="addNewCategory();">Upload</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-11">
                                                <div class="row">
                                                    <div class="col-4 border-bottom">
                                                        <h4>Upload Brand</h4>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-11">
                                                        <div class="row m-3 shadow-lg">
                                                            <div class="col-lg-4 col-12 mt-2 mb-2">
                                                                <h6>Select Category</h6>
                                                                <select class="form-select" name="" id="" style="margin-top: 23px;">
                                                                    <option value="">--Select Category--</option>

                                                                    <?php

                                                                    $category_rs = Database::search("SELECT * FROM `catogory`");
                                                                    $category_num = $category_rs->num_rows;
                                                                    for ($x = 0; $x < $category_num; $x++) {
                                                                        $category_data = $category_rs->fetch_assoc();
                                                                    ?>
                                                                        <option id="brand_c_id" value="<?php echo $category_data["id"]; ?>" style="font-size: 12px;"><?php echo $category_data["name"]; ?></option>
                                                                    <?php
                                                                    }

                                                                    ?>

                                                                </select>
                                                            </div>
                                                            <div class="col-lg-4 col-12">
                                                                <h6>Brand Name</h6>
                                                                <input type="text" class="form-control " id="new_brand" style="margin-top: 30px;" placeholder="Enter New Brand">

                                                            </div>
                                                            <div class="col-lg-4 col-12">
                                                                <button class="btn selling-btn mt-5" onclick="uploadNewBrand();" >Upload</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>




                                            </div>
                                        </div>




                                        <div class="row">
                                            <div class="col-11">
                                                <div class="row">
                                                    <div class="col-4 border-bottom">
                                                        <h4>Upload Model</h4>
                                                    </div>

                                                </div>



                                                <div class="row">
                                                    <div class="col-11">
                                                        <div class="row m-3 shadow-lg">
                                                            

                                                            <div class="col-lg-4 col-12 mt-2 mb-2">
                                                                <h6>Select Brand</h6>
                                                                <select class="form-select" name="" id="model_brand_id" style="margin-top: 23px;">
                                                                    <option value="" style="font-size: 12px;">--Select--</option>

                                                                    <?php

                                                                    $brand_rs = Database::search("SELECT * FROM `brand`");
                                                                    $brand_num = $brand_rs->num_rows;
                                                                    for ($x = 0; $x < $brand_num; $x++) {
                                                                        $brand_data = $brand_rs->fetch_assoc();
                                                                    ?>
                                                                        <option style="font-size: 12px;"  value="<?php echo $brand_data["id"]; ?>"><?php echo $brand_data["name"]; ?></option>
                                                                    <?php
                                                                    }

                                                                    ?>

                                                                </select>
                                                            </div>

                                                            <div class="col-lg-4 col-12">
                                                                <h6>Model Name</h6>
                                                                <input type="text" class="form-control " id="new_model" style="margin-top: 30px;" placeholder="Enter New Model">

                                                            </div>
                                                            <div class="col-lg-3 col-12">
                                                                <button class="btn selling-btn mt-5" onclick="upload_new_model();">Upload</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>



                                        <div class="row">
                                            <div class="col-11">
                                                <div class="row">
                                                    <div class="col-4 border-bottom">
                                                        <h4>Upload Colour</h4>
                                                    </div>

                                                </div>



                                                <div class="row ">
                                                    <div class="col-11 ">
                                                        <div class="row m-3 shadow-lg ">
                                                            <div class="col-lg-5 col-12 mb-3">
                                                                <h6>Colour</h6>
                                                                <input type="text" class="form-control " style="margin-top: 30px;" id="colour" placeholder="Enter New Colour">

                                                            </div>
                                                            <div class="col-lg-3 col-12 mb-3">
                                                                <button class="btn selling-btn mt-5" onclick="uploadColour();" >Upload</button>
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






                    </div>

                </div>
            </div>

            <?php

            require "footer.php";

            ?>
        </section>

    <?php
    } else {
    ?>

        <h1 class="text-center">Pleace Log In Frist</h1>

    <?php
    }


    ?>


    <script src="bootstrap/animation/purecounter/purecounter_vanilla.js"></script>
    <script src="bootstrap/animation/aos/aos.js"></script>
    <script src="bootstrap/animation/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap/animation/glightbox/js/glightbox.min.js"></script>
    <script src="bootstrap/animation/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="bootstrap/animation/swiper/swiper-bundle.min.js"></script>
    <script src="bootstrap/animation/php-email-form/validate.js"></script>


    <script src="bootstrap/js/main.js"></script>
    <script src="bootstrap.js"></script>
    <script src="script.js"></script>

    <script src="bootstrap.bundle.js"></script>

</body>

</html>