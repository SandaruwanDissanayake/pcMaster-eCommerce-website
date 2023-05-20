<?php

require("connection.php");
session_start();


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" href="resouses/bacground_image/logo.png">



  


    <link rel="stylesheet" href="animations/animation.css">
 
 <link href="bootstrap/css/style.css" rel="stylesheet">
 <link rel="stylesheet" href="bootstrap.css">
 <link rel="stylesheet" href="style.css">
</head>

<body style="overflow-x: hidden;">
   

    <section>
        <div class="col-12">



            <div class="row">
                <h4 class="text-center mt-3">Watchlist</h4>
            </div>

            <?php

            if (isset($_SESSION["u"])) {

                $user = $_SESSION["u"];
                $email = $user["email"];
                $cart_rs = Database::search("SELECT * FROM `watchlist` WHERE `user_email_email`='" . $email . "'");
                $cart_num = $cart_rs->num_rows;

                if (!$cart_num == 0) {
            ?>
                    <div class="row justify-content-center ">
                        <div class="col-11 shadow-lg">
                           

                            <div class="row justify-content-center">
                                <div class="m-2 col-lg-8 col-12 border-end border-dark ">
                                    <?php

                                    for ($x = 0; $x < $cart_num; $x++) {

                                        $cart_data = $cart_rs->fetch_assoc();




                                        // echo($pid["$x"]);

                                        // $title=$pid[$x]["title"];

                                        // echo($title);


                                        // $pid = $cart_data["product_id"];

                                        $p_img_rs = Database::search("SELECT * FROM `product_image` WHERE `product_id`='" . $cart_data["product_id"] . "'");
                                        $p_img_data = $p_img_rs->fetch_assoc();

                                        $p_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $cart_data["product_id"] . "'");
                                        $p_data = $p_rs->fetch_assoc();
                                    ?>
                                        <div class="row">
                                            <!-- cart -->

                                            <div class="col-11 m-3 border-bottom border-dark border-top p-2 ">
                                                <div class="row">
                                                  
                                                    <div class="col-3 border-end border-dark">
                                                        <img src="<?php echo $p_img_data["path"]; ?>" style="max-width: 100px;" alt="">

                                                    </div>
                                                    <div class="col-4 border-end border-dark">
                                                        <h6 class="fw-bold"><?php echo $p_data["title"]; ?></h6>

                                                        <?php

                                                        $con_rs = Database::search("SELECT * FROM `condition` WHERE `id`='" . $p_data["condition_id"] . "'");
                                                        $con_data = $con_rs->fetch_assoc();

                                                        ?>
                                                        <div class="row">
                                                            <div class="col-5 fw-bold">Quntity:</div>
                                                        <input value="<?php echo $p_data["qty"]; ?> " id="availble_qty<?php echo $p_data["id"]; ?>" class="border border-white col-7" disabled />

                                                        </div>
                                                        <h6><?php echo $con_data["name"]; ?></h6>
                                                        <!-- <input type="number" value="<?php echo $cart_data["qty"]; ?>" min="1" onclick="cart_qty_update(<?php echo $p_data['id']; ?>);" onkeyup="cart_qty_update(<?php echo $p_data['id']; ?>);" id="qty_input<?php echo $p_data["id"]; ?>"> -->
                                                    </div>

                                                    <div class="col-3 ">

                                                        <?php

                                                        $p_price = $p_data["price"];
                                                        
                                                        $all_p_price = $p_price ;

                                                        ?>

                                                        <h6 class="fw-bold text-dark  text-end">LKR : <?php echo $all_p_price; ?>.00</h6>

                                                        <h6 style="font-size: 12px;" class="text-end">Delivery Cost</h6>
                                                        <h6 class="text-dark-50 text-end">+ LKR : <?php echo $p_data["delivery_cost"]; ?> . 00</h6>

                                                        <!-- <div class="row justify-content-center">
                                                            <div class="col-4">
                                                                <button class="btn btn-success rounded-5 " onclick="payNow(<?php echo $p_data['id']; ?>);" style="font-size: 12px; width:100%">Buy</button>
                                                            </div>
                                                            <div class="col-4">
                                                                <button class="btn btn-danger rounded-5 " style="font-size: 12px; width:100%" onclick="removeCartProduct(<?php echo $p_data['id']; ?>);">Add Cart</button>
                                                            </div>
                                                            <div class="col-4">
                                                                <button class="btn btn-danger rounded-5 " style="font-size: 12px; width:100%" onclick="removeCartProduct(<?php echo $p_data['id']; ?>);">Remove</button>
                                                            </div>
                                                        </div> -->
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <button class="btn btn-success rounded-5 mb-3" type="submit" id="payhere-payment" onclick="payNow(<?php echo $p_data['id']; ?>);" style="font-size: 12px; width:100%">Buy</button>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                                <button class="btn btn-secondary rounded-5 mb-3" style="font-size: 12px; width:100%" onclick="addCart('<?php echo $p_data['id']; ?>');">Add Cart</button>
                                                            </div>
                                                            <div class="col-12">
                                                                <button class="btn btn-danger rounded-5 " style="font-size: 12px; width:100%" onclick="removeWatchlist(<?php echo $p_data['id']; ?>);">Remove</button>
                                                            </div>
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
                    </div>
                <?php
                } else {
                ?>
                    <div class="col-12">
                        <div class="row justify-content-center">
                            <div class="col-10 shadow-lg mt-5 mb-5" style="height: 300px;">
                                <h3 class="text-center mt-5">Your Cart Is Empty</h3>
                                <h2 class="text-center mt-5 mb-5" style="font-size: 150px;"><i class="bi bi-cart-plus"></i></h2>
                            </div>
                        </div>
                    </div>
                <?php
                }

                ?>
<div class="col-12 ">
<?php

require "footer.php"
?>
</div>
               
            <?php
            } else {
            ?>
                <div class="row justify-content-center">
                    <div class="col-11 shadow-lg">
                        <div class="row justify-content-center">
                            <h5 class="text-center mt-5 mb-5" >Pleace Log In Frist</h5>
                            <button class="btn btn-success col-5 mt-5 mb-5" onclick="signIn(window.location='signIn.php');">Log In Or Sign Up</button>
                        </div>

                    </div>
                </div>
            <?php
            }

            ?>

        </div>
    </section>

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
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>



</body>

</html>