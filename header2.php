<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" href="resouses/bacground_image/logo.png">


    <link href="bootstrap/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">


</head>

<body >
    

<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-2 col-12" style="color: black;">
                        <div class="row justify-content-start">
                            <a href="#search">
                                <img src="resouses/bacground_image/tec_master_logo.png" style="width: 90px; margin-top: -30px;" alt="">

                            </a>
                        </div>

                    </div>
                    <div class="col-lg-10 col-12">
                        <div class="row  justify-content-lg-end justify-content-center">
                            <div class="col-lg-1 col-4">

                                <button class="position-absolute border-0 mt-2" style="background-color: transparent;">
                                    <h4 class="text-danger cart-btn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-bell"></i></i></h4>
                                    <?php
                                    if (isset($_SESSION["u"])) {
                                        $user = $_SESSION["u"];
                                        $notifi_rs = Database::search("SELECT * FROM `notification`");
                                        $notifi_num = $notifi_rs->num_rows;
                                    ?>

                                        <h6 class="position-absolute top-0 start-100 mx-3 translate-middle badge rounded-pill bg-danger">
                                            <?php echo $notifi_num; ?>
                                            <span class="visually-hidden">unread messages</span>
                                        </h6>
                                    <?php
                                    }


                                    ?>

                                </button>
                            </div>

                            <!-- cart -->
                            <div class="col-lg-1 col-4">

                                <button class="position-absolute border-0 mt-2" style="background-color: transparent;">
                                    <h4 class="text-danger cart-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="cart();"><i class="bi bi-cart-plus-fill"></i></h4>
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
                            <div class="col-lg-3  col-4 mx-lg-1 ">
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



                                                <ul class=" dropdown-menu">
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
                                                        <li><a class="dropdown-item" href="watchlist.php">Watchlist</a></li>

                                                    <?php
                                                    } else {
                                                    ?>
                                                        <li><a class="dropdown-item" onclick="signInFrist();" style="cursor: pointer;">Watchlist</a></li>

                                                    <?php
                                                    }
                                                    ?>
                                                    <!-- <?php
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
                                                    ?> -->
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



<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fade-down" id="exampleModalLabel">Notifications <i class="bi bi-bell"></i></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


            <?php
            
            $notification_rs=Database::search("SELECT * FROM `notification`");
            $notification_num=$notification_rs->num_rows;

            for($x=0;$x<$notification_num;$x++){
                $notification_data=$notification_rs->fetch_assoc();
                ?>
                
                <div class="col-12 border-1 mt-1 mb-1 rounded-2" style="background-color:#1F4068;">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-8">
                        <h6 style="font-size: 10px;" class="m-2 text-white"><?php echo $notification_data["head"]; ?></h6>

                                </div>
                                <div class="col-4">
                        <h6 style="font-size: 10px;" class="m-2 text-white"><?php echo $notification_data["date_time"]; ?></h6>

                                </div>

                            </div>
                        </div>
                        <h4 style="font-size: 15px;" class="m-2 text-white"><?php echo $notification_data["body"]; ?></h4>
                    </div>
                </div>
                <?php
            }
            
            ?>

                
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<!-- cart -->

</body>







<!-- <script src="bootstrap/js/main.js"></script> -->
<!-- <script src="bootstrap.js"></script> -->
<script src="script.js"></script>

<!-- <script src="bootstrap.bundle.js"></script> -->











</body>


</html>