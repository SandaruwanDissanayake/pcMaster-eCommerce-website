<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" href="resouses/bacground_image/logo.png">

    <title>TEC MASTER | PURCHASE HISTORY</title>


    <link rel="stylesheet" href="animations/animation.css">


    <!-- <link href="bootstrap/css/style.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <?php

    require("connection.php");
    session_start();

    if (isset($_SESSION["u"])) {

        $email = $_SESSION["u"]["email"];

        $pur_rs = Database::search("SELECT * FROM `invoice`  WHERE `user_email`='" . $email . "' ORDER BY `date_time` DESC");


        require("header2.php");
    ?>

        <section>

            <div class="col-12 mt-5">
                <div class="row">
                    <div class="col-12 mt-5">
                        <div class="row">
                            <h1 class="text-center">Purcase History</h1>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-4">
                    <div class="row justify-content-center">
                        <div class="col-10 shadow-lg rounded-4">

                            <div class="row">
                                <h4 class="m-4">You <?php echo $pur_rs->num_rows; ?> item Purchase</h4>
                            </div>
                        </div>

                        <?php

                        for ($x = 0; $x < $pur_rs->num_rows; $x++) {
                            $pur_data = $pur_rs->fetch_assoc();

                        ?>

                            <!-- cart -->

                            <div class="col-10 shadow-lg mt-3" data-aos="zoom-in">
                                <div class="row justify-content-center p-2">
                                    <div class="col-3">
                                        <?php

                                        $img_rs = Database::search("SELECT * FROM `product_image` WHERE `product_id`='" . $pur_data["product_id"] . "' ");
                                        $img_data = $img_rs->fetch_assoc();
                                        ?>
                                        <img src="<?php echo $img_data["path"]; ?>" style="width: 100%;" alt="">
                                    </div>
                                    <div class="col-4">
                                        <?php

                                        $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $pur_data["product_id"] . "'");
                                        $product_data = $product_rs->fetch_assoc();

                                        ?>
                                        <div class="row">
                                            <h6><?php echo $product_data["title"]; ?></h6>
                                            <h6>Quntity : <?php echo $pur_data["qty"]; ?></h6>
                                            <?php

                                            $con_rs = Database::search("SELECT * FROM `condition` WHERE `id`='" . $product_data["condition_id"] . "'");
                                            $con_data = $con_rs->fetch_assoc();
                                            ?>
                                            <h6>Condition : <?php echo $con_data["name"]; ?></h6>

                                            <div class="row border-top">
                                                <div class="col-6">
                                                    <div class="row ">
                                                        <h6>Delivery fee :</h6>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <h6>LKR : 3000.00</h6>

                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="row ">
                                                        <h6>Subtotal :</h6>
                                                    </div>
                                                </div>
                                                <?php

                                                $subtotal = $pur_data["price"] + 3000;

                                                ?>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <h6 class="text-danger fw-bold">LKR : <?php echo $subtotal; ?>.00</h6>

                                                    </div>
                                                </div>
                                                <hr>
                                                <h6>Date Of Order : <?php echo $pur_data["date_time"]; ?></h6>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="row">
                                            <h5 class="fw-bold">Delivery Details</h5>


                                            <h6><?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"]; ?></h6>
                                            <?php

                                            $addres_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $email . "'");
                                            $addres_data = $addres_rs->fetch_assoc();
                                            ?>
                                            <h6><?php echo $addres_data["address_line_1"]; ?></h6>
                                            <h6><?php echo $addres_data["postal_code"]; ?></h6>

                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <div class="row justify-content-center">
                                            <?php
                                            
                                            if($pur_data["status"]==0 ){
?>
                                            <span class="badge text-bg-info" style="margin-top: 60px; ">Pakking</span>


<?php
                                            } else if($pur_data["status"]==1 ){
                                                ?>
                                                <span class="badge text-bg-info" style="margin-top: 60px; ">Pakking</span>
                                                <?php
                                            } else if($pur_data["status"]==2 ){
                                                ?>
                                                <span class="badge text-bg-secondary" style="margin-top: 60px; ">Shipping</span>
                                                <?php
                                            } else if($pur_data["status"]==3 ){
                                                ?>
                                                <span class="badge text-bg-success" style="margin-top: 60px; ">Order Compleate</span>
                                                <?php
                                            }
                                            
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- cart -->

                        <?php
                        }

                        ?>

                    </div>
                </div>
            </div>

        </section>

    <?php
    } else {
    ?>
        <h1>Pleace Log In Frist</h1>
    <?php
    }

    ?>




    <script type="text/javascript">
        window.addEventListener("scroll", function() {
            var header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0)
        })
    </script>
    <script src="animations/animation.js"></script>

    <script src="bootstrap/js/main.js"></script>
    <script src="bootstrap.js"></script>
    <script src="script.js"></script>

    <script src="bootstrap.bundle.js"></script>
</body>

</html>