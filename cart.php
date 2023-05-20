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
    <header>


    </header>

    <section>
        <div class="col-12">



            <div class="row">
                <h4 class="text-center mt-3">Cart</h4>
            </div>

            <?php

            if (isset($_SESSION["u"])) {

                $user = $_SESSION["u"];
                $email = $user["email"];
                $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $email . "'");
                $cart_num = $cart_rs->num_rows;

                if (!$cart_num == 0) {
            ?>
                    <div class="row justify-content-center ">
                        <div class="col-11 shadow-lg">
                            <div class="row m-5 justify-content-start border-bottom border-top border-dark">
                                <div class="mt-3 mb-3">
                                    <div class="row">
                                        <div class="col-8">

                                            <?php

                                            $selected_cart_rs = Database::search("SELECT * FROM `cart` WHERE `status`='1' AND `user_email`='" . $email . "'");
                                            $selected_cart_num = $selected_cart_rs->num_rows;




                                            if ($selected_cart_num == $cart_num) {
                                            ?>
                                                <input class="form-check-input" type="checkbox" id="select_all" onclick="cartSelectAll();" checked>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <label class="fw-bold" for="select_all">: &nbsp;&nbsp;&nbsp;Select All Product</label>

                                            <?php
                                            } else {
                                            ?>
                                                <input class="form-check-input" type="checkbox" id="select_all" onclick="cartSelectAll();">&nbsp;&nbsp;&nbsp;&nbsp;
                                                <label class="fw-bold" for="select_all">: &nbsp;&nbsp;&nbsp;Select All Product</label>

                                            <?php
                                            }

                                            ?>





                                        </div>
                                        <div class="col-4">
                                            <label class="text-end" for="">(<?php echo $cart_num; ?>) Item</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
                                                    <div class="col-1">
                                                        <?php

                                                        if ($cart_data["status"] == 1) {
                                                        ?>
                                                            <input class="form-check-input" type="checkbox" id="select" id="" onclick="cartingleProduct(<?php echo $p_data['id']; ?>)" checked>&nbsp;&nbsp;&nbsp;&nbsp;

                                                        <?php
                                                        } else {
                                                        ?>
                                                            <input class="form-check-input" type="checkbox" id="select" onclick="cartingleProduct(<?php echo $p_data['id']; ?>)">&nbsp;&nbsp;&nbsp;&nbsp;


                                                        <?php
                                                        }

                                                        ?>

                                                    </div>
                                                    <div class="col-3 border-end border-dark">
                                                        <img src="<?php echo $p_img_data["path"]; ?>" style="max-width: 100px;" alt="">

                                                    </div>
                                                    <div class="col-5 border-end border-dark">
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
                                                        <input type="number" value="<?php echo $cart_data["qty"]; ?>" min="1" onclick="cart_qty_update(<?php echo $p_data['id']; ?>);" onkeyup="cart_qty_update(<?php echo $p_data['id']; ?>);" id="qty_input<?php echo $p_data["id"]; ?>">
                                                    </div>

                                                    <div class="col-3 ">

                                                        <?php

                                                        $p_price = $p_data["price"];
                                                        $qty = $cart_data["qty"];
                                                        $all_p_price = $p_price * $qty;

                                                        ?>

                                                        <h6 class="fw-bold text-dark  text-end">LKR : <?php echo $all_p_price; ?>.00</h6>

                                                        <h6 style="font-size: 12px;" class="text-end">Delivery Cost</h6>
                                                        <h6 class="text-dark-50 text-end">+ LKR : <?php echo $p_data["delivery_cost"]; ?> . 00</h6>

                                                        <div class="row justify-content-center">
                                                            <div class="col-6">
                                                                <button class="btn btn-success rounded-5 " onclick="payNow(<?php echo $p_data['id']; ?>);" style="font-size: 12px; width:100%">Buy</button>
                                                            </div>
                                                            <div class="col-6">
                                                                <button class="btn btn-danger rounded-5 " style="font-size: 12px; width:100%" onclick="removeCartProduct(<?php echo $p_data['id']; ?>);">Remove</button>
                                                            </div>
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

                                <div class="col-lg-3 col-10 ">
                                    <div class="row justify-content-center">
                                        <div class="col-11 border p-2">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row">

                                                        <?php

                                                        $cart_sum_rs = Database::search("SELECT SUM(product.price*cart.qty) AS tp FROM `product` 
                                            INNER JOIN `cart` ON product.id=cart.product_id WHERE cart.status='1'");
                                                        $cart_sum_data = $cart_sum_rs->fetch_assoc();
                                                        ?>

                                                        <h6 class="text-start col-5">Item(<?php echo $selected_cart_num; ?>)</h6>
                                                        <?php
                                                        
                                                        if($selected_cart_num==0){
                                                            ?>
                                                            
                                                        <h6 class="text-end col-7">LKR : _ _ _ _  .00 </h6>
                                                            
                                                            <?php
                                                        }else{
                                                            ?>
                                                        <h6 class="text-end col-7">LKR : <?php echo $cart_sum_data["tp"]; ?>.00 </h6>
                                                            
                                                            <?php
                                                        }
                                                        
                                                        ?>

                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row">
                                                        <h6 class="text-start col-5">Delivery Fee</h6>
                                                        
                                                        <?php
                                                        
                                                        if($selected_cart_num==0){
                                                            ?>
                                                            
                                                        <h6 class="text-end col-7">LKR : _ _ _ _  .00 </h6>
                                                            
                                                            <?php
                                                        }else{
                                                            ?>
                                                       <h6 class="text-end col-7">LKR : 3000.00 </h6>
                                                            <?php
                                                        }
                                                        
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-12 border-top border-dark">
                                                    <div class="row">

                                                        <?php

                                                        $subTotal = $cart_sum_data["tp"] + 3000;

                                                        ?>
                                                        <h5 class="text-start col-4 fw-bold">SubTotal</h5>

                                                        <?php
                                                        
                                                        if($selected_cart_num==0){
                                                            ?>
                                                            
                                                        <h6 class="text-end col-7">LKR : _ _ _ _  .00 </h6>
                                                            
                                                            <?php
                                                        }else{
                                                            ?>
                                                       <h6 class="text-end col-8 fw-bold">LKR : <?php echo $subTotal; ?>.00 </h6>
                                                            <?php
                                                        }
                                                        
                                                        ?>

                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row justify-content-center mt-5">
                                                <div class="col-7">
                                                    <button class="btn btn-success rounded-5" onclick="payNow(0);">Check Out All</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

                <?php

                require "footer.php"
                ?>
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