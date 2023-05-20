<!DOCTYPE html>

<?php
require "connection.php";
session_start();

?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" href="resouses/bacground_image/logo.png">

    <title>SHOP NOW | ADMIN PANEL</title>




    <link rel="stylesheet" href="animations/animation.css">
    <link href="bootstrap/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">

</head>
<?php

if (isset($_SESSION["au"])) {
    $admin = $_SESSION["au"];
?>

    <body style=" overflow-x: hidden;  ">



        <?php

        require "adminHeader.php";

        ?>

        <!-- panel -->

        <div class="col-12"  >
            <div class="row " >


                <?php

                require "panel.php";

                ?>








                <div class="col-lg-9 col-12">

                    <!-- dashbord -->

                    <section id="dashboard">

                        <div class="row justify-content-center">
                            <div class="col-11">
                                <div class="row shadow-lg rounded-4">
                                    <div class="col-12 m-3">
                                        <div class="row">
                                            <div class="col-6">

                                                <div class="row">
                                                    <h3 class="admin_welcome_note">Well Come To Pc Master</h3>
                                                    <h6>Admin/<?php echo $admin["admin_reg_num"]; ?></h6>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="row justify-content-end">
                                                    <?php

                                                    $sum_money_rs = Database::search("SELECT SUM(price) AS tp FROM `invoice` ");
                                                    $sum_money_data = $sum_money_rs->fetch_assoc();

                                                    ?>
                                                    <h3 class="text-end fs-6 fw-bold m-4"><i class="bi bi-coin"></i> &nbsp; LKR : <?php echo $sum_money_data["tp"]; ?>.00</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5 justify-content-center">
                            <div class="col-11">
                                <div class="row justify-content-center">
                                    <div class="col-lg-3 col-6 z-in">


                                        <div class="row justify-content-center">
                                            <div class="col-11">
                                                <div class="row shadow-lg justify-content-center">
                                                    <div class="col-12">
                                                        <div class="col-12 mt-3">
                                                            <h5 class="text-center fs-1" style="color: rgb(157, 85, 85);"> <i class="bi bi-coin "></i></h5>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 mt-3">
                                                                <h3 class="text-center fs-6 fw-bold " style="color: rgb(157, 85, 85);">&nbsp; LKR : <?php echo $sum_money_data["tp"]; ?>.00</h3>

                                                            </div>

                                                        </div>
                                                        <div class="row" style="background-color:   #78127d;">
                                                            <div class="col-12">
                                                                <h4 class="text-center text-white mt-1">Total Income</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    </div>


                                    <div class="col-lg-3 col-6 z-in">


                                        <div class="row justify-content-center">
                                            <div class="col-11">
                                                <div class="row shadow-lg justify-content-center">
                                                    <div class="col-12">
                                                        <div class="col-12 mt-3">
                                                            <h5 class="text-center fs-1" style="color: rgb(157, 85, 85);"> <i class="bi bi-people-fill"></i></h5>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 ">

                                                                <?php

                                                                $user_rs = Database::search("SELECT * FROM `user` WHERE `user_type_user_type_id`='1'");


                                                                ?>

                                                                <h2 class="text-center mb-1 fw-bold " style="color: rgb(157, 85, 85);">&nbsp; <?php echo $user_rs->num_rows; ?></h2>

                                                            </div>

                                                        </div>
                                                        <div class="row" style="background-color: rgb(157, 85, 85);">
                                                            <div class="col-12">
                                                                <h4 class="text-center text-white mt-1">Registered Users</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-lg-3 col-6 z-in">


                                        <div class="row justify-content-center">
                                            <div class="col-11">
                                                <div class="row shadow-lg justify-content-center">
                                                    <div class="col-12">
                                                        <div class="col-12 mt-3">
                                                            <h5 class="text-center fs-1" style="color: rgb(157, 85, 85);"> <i class="bi bi-display"></i></h5>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 ">

                                                                <?php

                                                                $product = Database::search("SELECT * FROM `product`");

                                                                ?>

                                                                <h2 class="text-center  fw-bold " style="color: rgb(157, 85, 85);">&nbsp; <?php echo $product->num_rows; ?></h2>

                                                            </div>

                                                        </div>
                                                        <div class="row" style="background-color: rgb(157, 85, 85);">
                                                            <div class="col-12">
                                                                <h4 class="text-center text-white mt-1">Product Modal</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>




                                    </div>
                                    <div class="col-lg-3 col-6 z-in">


                                        <div class="row justify-content-center">
                                            <div class="col-11">
                                                <div class="row shadow-lg justify-content-center">
                                                    <div class="col-12">
                                                        <div class="col-12 mt-3">
                                                            <h5 class="text-center fs-1" style="color: rgb(157, 85, 85);"> <i class="bi bi-check-circle"></i></i></h5>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">

                                                                <?php

                                                                $sold = Database::search("SELECT * FROM `invoice`");

                                                                ?>

                                                                <h2 class="text-center fw-bold " style="color: rgb(157, 85, 85);">&nbsp; <?php echo $sold->num_rows; ?></h2>

                                                            </div>

                                                        </div>
                                                        <div class="row" style="background-color: rgb(157, 85, 85);">
                                                            <div class="col-12">
                                                                <h4 class="text-center text-white mt-1">Quantity Sold</h4>
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


                    </section>

                    <!-- dashbord -->






                </div>
            </div>
        </div>

        <!-- panel -->
        <?php

        require "footer.php";

        ?>





        <script src="animations/animation.js"></script>


        <script src="bootstrap/js/main.js"></script>
        <script src="bootstrap.js"></script>
        <script src="script.js"></script>

        <script src="bootstrap.bundle.js"></script>
    </body>

<?php
} else {
?>
    <h6>Pleace sign in</h6>
<?php
}

?>

</html>