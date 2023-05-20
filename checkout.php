<?php

require "connection.php";
session_start();
if (isset($_SESSION["u"])) {



    if (isset($_GET)) {

        $pid = $_GET["id"];
        $qty = $_GET["qty"];

?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1.0" name="viewport">
            <link rel="icon" href="resouses/bacground_image/logo.png">
            <title>Pay Now</title>


       
            <link rel="stylesheet" href="animations/animation.css">
            <link rel="stylesheet" href="bootstrap.css">
            <link rel="stylesheet" href="style.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        </head>

        <body class="" style="overflow: hidden;">
            <!-- <button type="button" onclick="goback()" class="back">Go Back</button> -->

            <?php

            $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "'");
            $product_data = $product_rs->fetch_assoc();



            ?>
            <div class="col-12" style="margin-top: 100px;">
                <div class="row justify-content-center">
                    <div class="col-11">
                        <div class="row justify-content-center">

                            <?php

                            if (!$pid == 0) {
                            ?>

                                <!-- cart area -->

                                <div class="col-lg-12 col-12">
                                    <div class="row justify-content-center">
                                        <div class="col-10 shadow-lg rounded-5">
                                            <div class="row mt-5">
                                                <?php

                                                $product_img_rs = Database::search("SELECT * FROM `product_image` WHERE `product_id`='" . $pid . "'");
                                                $product_img_data = $product_img_rs->fetch_assoc();

                                                ?>
                                                <div class="col-4 border-end">
                                                    <div class="row">
                                                        <img src="<?php echo $product_img_data["path"]; ?>" style="width: 100%;" alt="" srcset="">
                                                    </div>
                                                </div>


                                                <div class="col-8">
                                                    <div class="row">
                                                        <h3 class="fw-bold"><?php echo $product_data["title"]; ?></h3>


                                                        <?php

                                                        $p_price = $product_data["price"];
                                                        $d_cost = $product_data["delivery_cost"];
                                                        $all_product_price = $p_price * $qty;
                                                        $total_price = ($p_price * $qty) + $d_cost;

                                                        ?>


                                                    </div>
                                                    <div class="row justify-content-center">
                                                        <div class="col-9">
                                                            <div class="row">
                                                                <h6 class="text-start col-6">Product Price &nbsp; &nbsp; LKR:</h6>
                                                                <h6 class="text-end col-6"><?php echo $p_price; ?>.00</h6>

                                                            </div>
                                                            <div class="row border-bottom border-dark">
                                                                <h6 class="text-start col-6">Quntity &nbsp; &nbsp;:</h6>
                                                                <h6 class="text-end col-6"><i class="bi bi-x"></i> &nbsp;&nbsp; <?php echo $qty; ?></h6>

                                                            </div>
                                                            <div class="row  border-bottom border-dark">
                                                                <h6 class="text-end">LKR:<?php echo $all_product_price; ?>.00</h6>


                                                            </div>
                                                            <div class="row border-bottom border-dark">
                                                                <h6 class="text-start col-6">Delivery Cost &nbsp; &nbsp;:</h6>
                                                                <h6 class="text-end col-6"> <?php echo $d_cost; ?></h6>

                                                            </div>
                                                            <div class="row border-bottom border-dark mb-4">
                                                                <h5 class="text-start col-6 fw-bold">Total &nbsp; &nbsp;:</h5>
                                                                <h5 class="text-end col-6 fw-bold">LKR <?php echo $total_price;  ?> .00</h5>

                                                            </div>
                                                        </div>


                                                    </div>
                                                    <div class="alert alert-danger" role="alert">
                                                        <h6>You will not be reimbursed for shipping charges if you make this delivery</h6>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <!-- cart area -->
                    <?php
                            } else {



                    ?>
                        <div class="col-11">
                            <div class="row">
                                <div class="col-8 shadow-lg">
                                    <div class="row">
                                        <div class="col-12">
                                            <h3>Ship To:</h3>
                                        </div>
                                        <?php

                                        $user = $_SESSION["u"];
                                        $email = $user["email"];

                                        $addres_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $email . "'");
                                        $addres_data = $addres_rs->fetch_assoc();

                                        ?>
                                        <h6><?php echo $user["fname"] . " " . $user["lname"]; ?></h6>
                                        <h6><?php echo $user["mobile"]; ?></h6>
                                        <h6><?php echo $user["email"]; ?></h6>
                                        <br>
                                        <h6><?php echo $addres_data["address_line_1"]; ?></h6>
                                        <h6><?php echo $addres_data["address_line_2"]; ?></h6>
                                        <h6><?php echo $addres_data["postal_code"]; ?></h6>

                                        <div class="alert alert-danger" role="alert">
                                            <h6>You will not be reimbursed for shipping charges if you make this delivery</h6>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-10 shadow-lg">
                                    <div class="row justify-content-center">
                                        <div class="col-11 border p-2">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row">

                                                        <?php

                                                        $user = $_SESSION["u"];
                                                        $email = $user["email"];

                                                        $cart_product = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $email . "' AND `status`='1'");
                                                        $cart_product_num = $cart_product->num_rows;


                                                        $cart_sum_rs = Database::search("SELECT SUM(product.price*cart.qty) AS tp FROM `product` 
                                            INNER JOIN `cart` ON product.id=cart.product_id WHERE cart.status='1'");
                                                        $cart_sum_data = $cart_sum_rs->fetch_assoc();
                                                        ?>

                                                        <h6 class="text-start col-5">Item(<?php echo $cart_product_num; ?>)</h6>
                                                        <h6 class="text-end col-7">LKR : <?php echo $cart_sum_data["tp"]; ?>.00 </h6>

                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row">
                                                        <h6 class="text-start col-5">Delivery Fee</h6>
                                                        <h6 class="text-end col-7">LKR : 3000.00 </h6>
                                                    </div>
                                                </div>
                                                <div class="col-12 border-top border-dark">
                                                    <div class="row">
                                                        <?php

                                                        $subTotal = $cart_sum_data["tp"] + 3000;

                                                        ?>
                                                        <h5 class="text-start col-4 fw-bold">SubTotal</h5>
                                                        <h5 class="text-end col-8 fw-bold">LKR : <?php echo $subTotal; ?>.00 </h5>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row justify-content-center mt-4">
                            <div class="col-md-6">
                                <div class="form-container">
                                    <form autocomplete="off" action="checkout-charge.php" method="POST">
                                        <div style="display:none;" class="col-12">
                                            <div>
                                                <input type="text" name="pid" value="<?php echo $pid; ?>" required />
                                                <label>Customer Name</label>
                                            </div>



                                            <div>
                                                <input type="text" name="qty" value="0" required />
                                                <label>Address</label>
                                            </div>
                                            <div>
                                                <input type="number" id="ph" name="phone" pattern="\d{10}" maxlength="10" required />
                                                <label>Contact number</label>
                                            </div>

                                            <?php





                                            ?>

                                            <div>
                                                <input type="text" name="product_name" value="selectet product" disabled required />
                                                <label>Product name</label>
                                            </div>
                                            <div>
                                                <input type="text" name="price" value="<?php echo $cart_sum_data["tp"]; ?>" disabled required />
                                                <label>Price</label>
                                            </div>



                                            <input type="hidden" name="amount" value="<?php echo $cart_sum_data["tp"]; ?>">
                                            <input type="hidden" name="product_name" value="0">
                                        </div>


                                        <div class="col-12">
                                            <div class="row justify-content-center">
                                                <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="pk_test_51MWaKNG8Zy6AeY5bNlZ1gFbcP9HMhKYPJEZQXMHul5QGLYqv5TpH3Hmqhm49Edeiz1Xi12FlaMQO5LeNUAAnWzUc00TSKkud82" data-amount=<?php echo str_replace(",", "", $cart_sum_data["tp"]+3000) * 100 ?> data-name="select product" data-description="select product" data-image="resouses/bacground_image/logo.png" data-currency="inr" data-locale="auto">
                                                </script>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="col-md-6" style="display: none;">
                                <div class="checkout-container">
                                    <h4>Product Name&nbsp;:&nbsp;select product</h4>
                                    <!-- <img src="<?php echo $product_img_data["path"] ?>" /> -->
                                    <span>Price &nbsp;:&nbsp;<?php echo $cart_sum_data["tp"]; ?></span>
                                </div>
                            </div>
                        </div>


                    <?php



                            }

                    ?>




                    </div>
                </div>
            </div>
            </div>






            <div class="row justify-content-center mt-4">
                <div class="col-md-6">
                    <div class="form-container">
                        <form autocomplete="off" action="checkout-charge.php" method="POST">
                            <div style="display: none;" class="col-12">
                                <div>
                                    <input type="text" name="pid" value="<?php echo $pid; ?>" required />
                                    <label>Customer Name</label>
                                </div>



                                <div>
                                    <input type="text" name="qty" value="<?php echo $qty; ?>" required />
                                    <label>Address</label>
                                </div>
                                <div>
                                    <input type="number" id="ph" name="phone" pattern="\d{10}" maxlength="10" required />
                                    <label>Contact number</label>
                                </div>

                                <?php

                                $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "'");
                                // $product_num = $product_rs->num_rows;
                                $product_data = $product_rs->fetch_assoc();



                                ?>

                                <div>
                                    <input type="text" name="product_name" value="<?php echo $product_data["title"]; ?>" disabled required />
                                    <label>Product name</label>
                                </div>
                                <div>
                                    <input type="text" name="price" value="<?php echo $product_data["price"]; ?>" disabled required />
                                    <label>Price</label>
                                </div>

                                <?php

                                $product_img_rs = Database::search("SELECT * FROM `product_image` WHERE `product_id`='" . $pid . "'");
                                $product_img_data = $product_img_rs->fetch_assoc();

                                ?>

                                <input type="hidden" name="amount" value="<?php echo $product_data["price"] ?>">
                                <input type="hidden" name="product_name" value="<?php echo $product_data["id"] ?>">
                            </div>


                            <div class="col-12">
                                <div class="row justify-content-center">
                                    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="pk_test_51MWaKNG8Zy6AeY5bNlZ1gFbcP9HMhKYPJEZQXMHul5QGLYqv5TpH3Hmqhm49Edeiz1Xi12FlaMQO5LeNUAAnWzUc00TSKkud82" data-amount=<?php echo str_replace(",", "", $product_data["price"]) * 100 ?> data-name="<?php echo $product_data["title"] ?>" data-description="<?php echo $product_data["title"] ?>" data-image="<?php echo $product_img_data["path"]; ?>" data-currency="inr" data-locale="auto">
                                    </script>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-6" style="display: none;">
                    <div class="checkout-container">
                        <h4>Product Name&nbsp;:&nbsp;<?php echo  $product_data["title"] ?></h4>
                        <img src="<?php echo $product_img_data["path"] ?>" />
                        <span>Price &nbsp;:&nbsp;<?php echo $product_data["price"] ?></span>
                    </div>
                </div>
            </div>

        <?php
    }
        ?>
        <script>
            function goback() {
                window.history.go(-1);
            }

            $('#ph').on('keypress', function() {
                var text = $(this).val().length;
                if (text > 9) {
                    return false;
                } else {
                    $('#ph').text($(this).val());
                }

            });
        </script>





<script src="animations/animation.js"></script>
        <script src="assets/js/main.js"></script>
        <script src="bootstrap.js"></script>
        <script src="script.js"></script>

        <script src="bootstrap.bundle.js"></script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

        </body>

        </html>
    <?php
} else {
    echo ("log in Frist");
}
    ?>