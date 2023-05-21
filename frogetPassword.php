
<?php
require "connection.php";
?>
<!DOCTYPE html>
<html lang="en">

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

<body class="bacground">
    <div class="container-fluid">
        <div class="row">

            <!-- header  -->

            <header>
                <div class="col-12 hedaer1">
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-3 offset-1 col-5">
                            <div class="row align-content-center">
                                <!-- <h3 class="logo  col-12">LOGO</h3> -->
                                <img src="resouses/bacground_image/logo.png" style="width: 70px;" alt="">
                            </div>
                        </div>
                        <div class="col-6 d-lg-none d-block">
                            <div class="col-4 d-block d-md-block offset-4 d-lg-none">
                                <div class="row">
                                    <div class="offset-6 col-6 justify-content-end">
                                        <div class="row">
                                            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="bi bi-list"></i></button>

                                            <div class="offcanvas offcanvas-end main-body" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                                                <div class="offcanvas-header">
                                                    <!-- <h5 class="offcanvas-title" id="offcanvasRightLabel">Offcanvas right</h5> -->
                                                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                                </div>
                                                <div class="offcanvas-body" style="background-color:#000 ;">



                                                    <div class="col-12 mb-1">
                                                        <button class="btn1 btn2" style="width:90% ;">Home</button>
                                                    </div>
                                                    <div class="col-12 mb-1 ">
                                                        <button class="btn1 btn2" style="width:90% ;">About Us</button>
                                                    </div>
                                                    <div class="col-12 mb-1">
                                                        <button class="btn1 btn2" style="width:90% ;">Contact</button>
                                                    </div>
                                                    <div class="col-12  mb-1">
                                                        <button class="btn1 btn2" style="width:90% ;">Become a seller</button>
                                                    </div>
                                                    <div class="col-12  mb-1">
                                                        <button class="btn1 btn2" style="width:90% ;" onclick="signInWindow();">Sign In</button>
                                                    </div>
                                                    <div class="col-12  mb-1">
                                                        <button class="btn1 btn2" style="width:90% ;" onclick="signUpWindow();">Rejister</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12 d-lg-block d-none">
                            <div class="row justify-content-end">
                                <div class="col-2">
                                    <button class="btn1" onclick="(window.location='index.php');">HOME</button>
                                </div>
                                <div class="col-2">
                                    <button class="btn1">ABOUT US</button>

                                </div>
                                <!-- <div class="col-2">
                                    <button class="btn1">SIGN IN</button>

                                </div> -->
                                <div class="col-3 ">
                                    <button class="btn1" onclick="(window.location='register.php');">REGISTER NOW</button>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- header -->
            <div class="col-12 mt-5">
                <div class="row justify-content-center">
                  
                    <div class="col-12 sign-inBox mt-5 m-5 rounded-3 col-lg-7" data-aos="zoom-in">
                        <div class="row">
                            <div class="col-12">
                                <div class="row justify-content-center">
                                    <div class="col-11 rounded-3  mt-3 mb-3">
                                        <h3 class="text-center text-white mt-5" data-aos="zoom-in" data-aos-delay="200">Create New Password</h3>
                                        <hr>
                                        <div class="row">
                                            <!-- SignIn -->

                                            <div class="col-12" id="signInBox">
                                                <div class="row">

                                                    <div class="col-12" data-aos="zoom-in" data-aos-delay="400">
                                                        <div class="row">
                                                            <div class="form-floating mb-3">
                                                                <input type="email" class="form-control" id="e" placeholder="name@example.com">
                                                                <label for="floatingInput">Email Address</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12" data-aos="zoom-in" data-aos-delay="600">
                                                        <div class="row">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" id="vcode" placeholder="name@example.com">
                                                                <label for="floatingInput">Verification Code</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12" data-aos="zoom-in" data-aos-delay="800">
                                                        <div class="row">
                                                            <div class="form-floating mb-3">
                                                                <input type="password" class="form-control" id="np1" placeholder="">
                                                                <label for="floatingInput">New password</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12" data-aos="zoom-in" data-aos-delay="1000">
                                                        <div class="row">
                                                            <div class="form-floating mb-3">
                                                                <input type="password" class="form-control" id="np2" placeholder="">
                                                                <label for="floatingInput">Comfriam New Password</label>
                                                            </div>
                                                        </div>
                                                    </div>




                                                </div>
                                                <div class="col-12" data-aos="zoom-in" data-aos-delay="1200">
                                                    <div class="row justify-content-center">
                                                        <button class="btn2 col-6 mt-4 mb-4"  style="color:#000 ; border:2px solid #000 ;" onclick="submitVerification();">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- SignIn -->






                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <script type="text/javascript">
        window.addEventListener("scroll", function() {
            var header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0)
        })
    </script>
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