<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link rel="icon" href="resouses/bacground_image/logo.png">



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
<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-2" style="color: black;">
                    <div class="row justify-content-start">
                    <a href="#search">
                            <img src="resouses/bacground_image/tec_master_logo.png" style="width: 90px; margin-top: -30px;" alt="">

                        </a>
                    </div>
                      
                    </div>
                    <div class="col-10">
                        <div class="row justify-content-end">

                            <!-- cart -->
                            <div class="col-1">

                                <button class="position-absolute border-0 mt-2" style="background-color: transparent;">
                                    <h4 class="text-danger cart-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="cart();" ><i class="bi bi-cart-plus-fill"></i></h4>
                                    <?php
                                    if (isset($_SESSION["u"])) {
                                        $user = $_SESSION["u"];
                                        $cart_rs = Database::search("SELECT * FROM `cart` WHERE  `user_email`='" . $user["email"] . "'");
                                        $cart_num = $cart_rs->num_rows;
                                    ?>

                                        <h6 class="position-absolute top-0 start-100 mx-3 translate-middle badge rounded-pill bg-danger">
                                            <?php echo $cart_num; ?>
                                            <span class="visually-hidden">unread messages</span>
                                        </h6>
                                    <?php
                                    }


                                    ?>

                                </button>
                            </div>







                            <!-- cart -->

                            <!-- profile -->
                            <div class="col-lg-3 col-4 mx-lg-1 mx-5">
                                <div class="row">
                                    <?php
                                    if (isset($_SESSION["u"])) {
                                        $user = $_SESSION["u"];
                                        $profile_image_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $user["email"] . "'");
                                        $profile_image_num = $profile_image_rs->num_rows;
                                        if ($profile_image_num != 0) {
                                            $profile_image_data = $profile_image_rs->fetch_assoc();
                                    ?>
                                            <div class="col-3">
                                                <img src="<?php echo $profile_image_data["path"]; ?>" style="cursor: pointer; border-radius: 40%;" class="user-img-navbar d-none d-lg-block" alt="">

                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="col-3">
                                                <img src="resouses/user_data/profile-user.png" style="cursor: pointer;" class="user-img-navbar d-none d-lg-block" alt="">

                                            </div>

                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <div class="col-3">
                                            <img src="resouses/user_data/profile-user.png" style="cursor: pointer;" class="user-img-navbar d-none d-lg-block" alt="">

                                        </div>
                                    <?php
                                    }


                                    ?>

                                    <div class="col-lg-9 col-12">
                                        <div class="row">


                                            <div class="col-2 col-lg-6 dropdown">

                                                <?php

                                                if (isset($_SESSION["u"])) {
                                                    $user = $_SESSION["u"];
                                                ?>
                                                    <h6 style="font-size: 12px; text-decoration: underline; cursor: pointer;" data-bs-toggle="dropdown" aria-expanded="false" class="mt-2 dropdown-toggle"><?php echo $user["fname"] . " " . $user["lname"]; ?></h6>
                                                <?php
                                                } else {
                                                ?>

                                                    <h6 style="font-size: 12px; text-decoration: underline; cursor: pointer;" data-bs-toggle="dropdown" aria-expanded="false" class="mt-2 dropdown-toggle">TEC MASTER</h6>


                                                <?php
                                                }

                                                ?>



                                                <ul class=" dropdown-menu" data-aos="zoom-in" data-aos-delay="20">
                                                    <?php
                                                    if (isset($_SESSION["u"])) {
                                                    ?>
                                                        <li><a class="dropdown-item" href="myprofile.php">My profile</a></li>

                                                    <?php
                                                    } else {
                                                    ?>
                                                        <li><a class="dropdown-item" onclick="signInFrist();" style="cursor: pointer;">My profile</a></li>

                                                    <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($_SESSION["u"])) {
                                                    ?>
                                                        <li><a class="dropdown-item" href="purchaseHistory.php">Purchase History</a></li>

                                                    <?php
                                                    } else {
                                                    ?>
                                                        <li><a class="dropdown-item" style="cursor: pointer;" onclick="signInFrist();">Purchase History</a></li>

                                                    <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($_SESSION["u"])) {
                                                    ?>
                                                        <li><a class="dropdown-item" href="#">Watchlist</a></li>

                                                    <?php
                                                    } else {
                                                    ?>
                                                        <li><a class="dropdown-item" onclick="signInFrist();" style="cursor: pointer;">Watchlist</a></li>

                                                    <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($_SESSION["u"])) {
                                                    ?>
                                                        <li><a class="dropdown-item" href="#">Contact PC LAB</a></li>
                                                        <hr>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <li><a class="dropdown-item" onclick="signInFrist();" style="cursor: pointer;">Contact PC LAB</a></li>
                                                        <hr>
                                                    <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($_SESSION["u"])) {
                                                    ?>
                                                        <li><a class="dropdown-item" onclick="logOut();">Sign Out</a></li>

                                                    <?php
                                                    } else {
                                                    ?>
                                                        <li><a class="dropdown-item" href="signIn.php" style="cursor: pointer;">Sign In</a></li>
                                                        <li><a class="dropdown-item" href="register.php" style="cursor: pointer;">Rejister</a></li>


                                                    <?php
                                                    }
                                                    ?>



                                                </ul>
                                            </div>

                                        </div>
                                    </div>


                                </div>
                                <!-- profile -->

                            </div>






                        </div>
                    </div>
                </div>
            </div>
        </div>
</header>

<!-- cart -->






<script src="bootstrap/animation/purecounter/purecounter_vanilla.js"></script>
  <script src="bootstrap/animation/aos/aos.js"></script>
  <script src="bootstrap/animation/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="bootstrap/animation/glightbox/js/glightbox.min.js"></script>
  <script src="bootstrap/animation/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="bootstrap/animation/swiper/swiper-bundle.min.js"></script>
  <script src="bootstrap/animation/php-email-form/validate.js"></script>

 
  <!-- <script src="bootstrap/js/main.js"></script> -->
  <!-- <script src="bootstrap.js"></script> -->
  <script src="script.js"></script>

  <!-- <script src="bootstrap.bundle.js"></script> -->











</body>


</html>