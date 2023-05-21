<?php
require "connection.php";

session_start();
if (isset($_SESSION["u"])) {

?>
    <h1>Somthing went wrong</h1>
<?php

} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
    <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link rel="icon" href="resouses/bacground_image/logo.png">

  <title>SHOP NOW | ADMIN SIGN IN</title>


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

    <body style="height: 100vh; background-color: #9999;" class="admin-body">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12 admin-body-img">
                    <div class="row">
                        <div class="col-6 d-lg-block d-none" data-aos="fade-right">
                            <div class="row justify-content-center">
                                <img src="resouses/bacground_image/lap-rocket.png" class="lap-rocket col-5" alt="">
                                <h1 class="text-center">Pleace enter your email addres and verification code</h1>

                            </div>
                        </div>
                        <div class="col-lg-6 col-12" data-aos="fade-left">
                            <div class="row justify-content-center">
                                <div class="col-8  admin-login-panel">
                                    <div class="row">
                                        <div class="col-12 admin-login-panel-1">
                                            <div class="row">
                                                <h2 class="text-center text-white mt-5">Admin Log In</h2>
                                                <div class="col-12 mt-3">
                                                    <hr>
                                                </div>


                                                <p class="alert alert-danger d-none" id="adminSignInNote"></p>

                                                <!-- admindetails -->
                                                <div class="" id="a">
                                                    <p class="text-white fw-bold fs-5">*Enter Your Email Address</p>

                                                    <input type="text" class="form-control mb-2" id="email">

                                                    <p class="text-white fw-bold fs-5">*Enter Your Admin ID Number</p>
                                                    <input type="text" class="form-control" id="Id">


                                                    <div class="col-12">
                                                        <div class="row justify-content-center">

                                                            <button class="btn btn-success col-6 mt-5" onclick="adminRejister();">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- admindetails -->
                                                <div class="d-none" id="b">
                                                    <p class="text-white fw-bold fs-5 ">*Enter Your Verification Code</p>
                                                    <input type="text" class="form-control" id="verificationCode">


                                                    <div class="col-12">
                                                        <div class="row justify-content-center">

                                                            <button class="btn btn-success col-6 mt-5 mb-5" onclick="admimVerification();">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
<?php
}


?>