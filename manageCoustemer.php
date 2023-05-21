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
                                        <div class="col-11">
                                            <div class="row justify-content-center shadow-lg">
                                                <div class="col-11">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <input type="text" class=" form-control mt-3" placeholder="Coustomer Name" id="text">
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="row border-bottom">
                                                                <h6 class="fw-bold">Purchase Of Good</h6>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="p_H">
                                                                    <label class="form-check-label" for="p_H">
                                                                        High To Low
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="p_L">
                                                                    <label class="form-check-label" for="p_L">
                                                                        Low To Heigh
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-3">
                                                            <div class="row border-bottom">
                                                                <h6 class="fw-bold">Block/Unblock</h6>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="block">
                                                                    <label class="form-check-label" for="block">
                                                                        Block
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="unblock">
                                                                    <label class="form-check-label" for="unblock">
                                                                        Unblock
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-2">
                                                            <button class="btn btn-success mt-3" onclick="coustomerSearch();">Search</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="row mt-4 shadow-lg">
                                                <div class="col-11" style="background-color: #ccc;">
                                                    <div class="row mt-3">
                                                        <h6 class="text-center col-1 border-end border-dark">#</h6>
                                                        <h6 class="col-3 border-end text-center border-dark">Profile Image</h6>
                                                        <h6 class="col-4 border-end text-center border-dark">Name</h6>
                                                        <h6 class="col-2 border-end text-center border-dark">Count Of Purchase</h6>
                                                        <h6 class="col-2 text-center">Status</h6>
                                                    </div>
                                                </div>
                                            </div>

                                            <section>
                                                <div class="row ">
                                                    <div class="col-11 " style="height: 800px; overflow-y: scroll;">

                                                        <section id="result_area" style="margin-top: -70px;">
                                                            <?php

                                                            $user_rs = Database::search("SELECT * FROM `user` WHERE `user_type_user_type_id`='1'");
                                                            $user_num = $user_rs->num_rows;

                                                            for ($x = 0; $x < $user_num; $x++) {
                                                                $user_data = $user_rs->fetch_assoc();
                                                            ?>
                                                                <div class="row border p-2" >
                                                                    <h6 class="text-center col-1 border-end border-dark"><?php echo $x + 1; ?></h6>
                                                                    <?php

                                                                    $user_img_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $user_data["email"] . "'");
                                                                    $user_img_data = $user_img_rs->fetch_assoc();

                                                                    ?>
                                                                    <div class="col-3 border-end text-center border-dark">
                                                                        <div class="row justify-content-center">
                                                                            <img src="<?php echo $user_img_data["path"]; ?>" style="width: 100px;" alt="">

                                                                        </div>

                                                                    </div>
                                                                    <h6 class="col-4 border-end text-center border-dark"><?php echo $user_data["fname"] . " " . $user_data["lname"]; ?></h6>
                                                                    <?php

                                                                    $purchase_rs = Database::search("SELECT * FROM `invoice` WHERE `user_email`='" . $user_data["email"] . "'");
                                                                    // $purchase_data=$purchase_rs->fetch_assoc();

                                                                    ?>
                                                                    <h6 class="col-2 "><?php echo $purchase_rs->num_rows; ?></h6>
                                                                    <?php

                                                                    if ($user_data["status"] == 1) {
                                                                    ?>
                                                                        <button class="col-2 btn btn-danger" onclick="coustomerBlockUnblock('<?php echo $user_data['email']; ?>');">Block</button>

                                                                    <?php
                                                                    } else if ($user_data["status"] == 2) {
                                                                    ?>
                                                                        <button class="col-2 btn btn-success" onclick="coustomerBlockUnblock('<?php echo $user_data['email']; ?>');">Unblock</button>
                                                                    <?php
                                                                    }

                                                                    ?>

                                                                </div>
                                                            <?php
                                                            }
                                                            ?>
                                                        </section>


                                                    </div>
                                                </div>
                                            </section>





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