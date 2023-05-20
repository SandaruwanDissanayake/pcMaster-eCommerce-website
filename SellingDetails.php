<?php

require "connection.php";
session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" href="resouses/bacground_image/logo.png">

    <title>TEC MASTER | SELLING DETAILS</title>



    <link rel="stylesheet" href="animations/animation.css">

    <link href="bootstrap/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>

<?php

if (isset($_SESSION["au"])) {
    $admin = $_SESSION["au"];
?>

    <body style=" overflow-x: hidden; ">



        <?php

        require "adminHeader.php";

        ?>

        <!-- panel -->

        <div class="col-12" >
            <div class="row justify-content-center">


                <div class="col-11">
                    <div class="row justify-content-center">
                        <div class="col-lg-2 col-2 d-lg-block d-none">
                            <div class="row mt-2">

                                <div class="col-12 rounded shadow-lg  ">
                                    <div class="row p-3 d-lg-inline-flex">
                                        <button class="btn selling-btn mt-4" onclick="Dashboard();"><i class="bi bi-speedometer"></i>&nbsp;Dashboard</button>

                                        <button class="btn selling-btn mt-4" onclick="NewOrder();"><i class="bi bi-card-checklist"></i> &nbsp;New Order</button>
                                        <button class="btn selling-btn mt-4" onclick="Packing();"><i class="bi bi-box2"></i> &nbsp;Packing</button>
                                        <button class="btn selling-btn mt-4" onclick="Shipping();"><i class="bi bi-send"></i> &nbsp;Shipping</button>
                                        <button class="btn selling-btn mt-4" onclick="Dileverd();"><i class="bi bi-check2-square"></i>&nbsp;Dileverd</button>

                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="col-12 d-lg-none d-block">
                            <div class="row mt-2">

                                <div class="col-12 rounded shadow-lg  ">
                                    <div class="row p-3 d-lg-inline-flex">
                                        <button class="btn selling-btn mt-4" onclick="Dashboard();"><i class="bi bi-speedometer"></i>&nbsp;Dashboard</button>

                                        <button class="btn selling-btn mt-4" onclick="NewOrder();"><i class="bi bi-card-checklist"></i> &nbsp;New Order</button>
                                        <button class="btn selling-btn mt-4" onclick="Packing();"><i class="bi bi-box2"></i> &nbsp;Packing</button>
                                        <button class="btn selling-btn mt-4" onclick="Shipping();"><i class="bi bi-send"></i> &nbsp;Shipping</button>
                                        <button class="btn selling-btn mt-4" onclick="Dileverd();"><i class="bi bi-check2-square"></i>&nbsp;Dileverd</button>

                                    </div>

                                </div>

                            </div>
                        </div>










                        <div class="col-lg-10 col-10">

                            <div class="row justify-content-center">
                                <div class="col-11">
                                    <div class="row justify-content-center">
                                        
                                            <h2 class="text-center  mt-3" style="font-weight:bolder;">SELLING DETAILS</h2>
                                        
                                    </div>
                                    <!-- Dashboard -->
                                    <section id="Dashboard" class="d-block">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-4 col-6 mt-4">
                                                <div class="row justify-content-center">
                                                    <div class="col-11 shadow-lg rounded-3" style="height: 200px;">
                                                        <div class="row justify-content-center">
                                                            <h1 class="text-center text-danger mt-4" style="font-size: 50px;"><i class="bi bi-check2-circle"></i></h1>
                                                            <?php

                                                            $invoice_rs = Database::search("SELECT * FROM `invoice`");


                                                            ?>
                                                            <h1 class="text-center fw-bold"><?php echo $invoice_rs->num_rows; ?></h1>
                                                            <h5 class="text-center">All Sell Item</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 mt-4 col-6">
                                                <div class="row justify-content-center">
                                                    <div class="col-11 shadow-lg rounded-3" style="height: 200px;">
                                                        <div class="row justify-content-center">
                                                            <h1 class="text-center text-danger mt-4" style="font-size: 50px;"><i class="bi bi-card-checklist"></i></h1>
                                                            <?php

                                                            $invoice_new_rs = Database::search("SELECT * FROM `invoice` WHERE `status`='0'");


                                                            ?>
                                                            <h1 class="text-center fw-bold"><?php echo $invoice_new_rs->num_rows; ?></h1>
                                                            <h5 class="text-center">New Order</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 mt-4 col-6">
                                                <div class="row justify-content-center">
                                                    <div class="col-11 shadow-lg rounded-3" style="height: 200px;">
                                                        <div class="row justify-content-center">
                                                            <h1 class="text-center text-danger mt-4" style="font-size: 50px;"><i class="bi bi-box-seam"></i></i></h1>
                                                            <?php

                                                            $invoice_p_rs = Database::search("SELECT * FROM `invoice` WHERE `status`='1'");


                                                            ?>
                                                            <h1 class="text-center fw-bold"><?php echo $invoice_p_rs->num_rows; ?></h1>
                                                            <h5 class="text-center">Pakking</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 mt-4 mb-4 col-6">
                                                <div class="row justify-content-center">
                                                    <div class="col-11 shadow-lg rounded-3" style="height: 200px;">
                                                        <div class="row justify-content-center">
                                                            <h1 class="text-center text-danger mt-4" style="font-size: 50px;"><i class="bi bi-truck"></i></i></h1>
                                                            <?php

                                                            $invoice_s_rs = Database::search("SELECT * FROM `invoice` WHERE `status`='2'");


                                                            ?>
                                                            <h1 class="text-center fw-bold"><?php echo $invoice_s_rs->num_rows; ?></h1>
                                                            <h5 class="text-center">Shipping</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 mt-4 mb-4 col-6">
                                                <div class="row justify-content-center">
                                                    <div class="col-11 shadow-lg rounded-3" style="height: 200px;">
                                                        <div class="row justify-content-center">
                                                            <h1 class="text-center text-success mt-4" style="font-size: 50px;"><i class="bi bi-check2-circle"></i></h1>
                                                            <?php

                                                            $invoice_d_rs = Database::search("SELECT * FROM `invoice` WHERE `status`='3'");


                                                            ?>
                                                            <h1 class="text-center fw-bold"><?php echo $invoice_d_rs->num_rows; ?></h1>
                                                            <h5 class="text-center">Deliverd</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                           

                                        </div>
                                    </section>

                                    <!-- Dashboard -->


                                    <!-- New Order -->

                                    <section id="NewOrder" class="d-none">

                                        <div class="row">
                                            <div class="col-12 shadow-lg">
                                                <div class="row">
                                                            
                                                    <h4 class="text-center">New Order(<?php echo $invoice_new_rs->num_rows; ?>)</h4>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-12">
                                                <div class="row g-2" style="background-color: #9999; border-radius: 20px;">
                                                    <div class="col-2 border-end border-dark">
                                                        <h6 class="fw-bold">Invoice Id</h6>
                                                    </div>
                                                    <div class="col-2 border-end border-dark">
                                                        <h6 class="fw-bold">Product Image</h6>
                                                    </div>
                                                    <div class="col-3 border-end border-dark">
                                                        <h6 class="fw-bold">Product </h6>
                                                    </div>
                                                    <div class="col-3 border-end border-dark">
                                                        <h6 class="fw-bold">Coustomer Data</h6>
                                                    </div>
                                                    <div class="col-2 border-end border-dark">
                                                        <h6 class="fw-bold">Status</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-12" style="height: 800px; overflow-y: scroll;">
                                                <!-- cart -->

                                                <?php

                                                $new_O_rs = Database::search("SELECT * FROM `invoice` WHERE `status`='0' ORDER BY `date_time` DESC");
                                                $new_o_num = $new_O_rs->num_rows;


                                                for ($y = 0; $y < $new_o_num; $y++) {
                                                    $new_o_data = $new_O_rs->fetch_assoc();
                                                    $invoice_id = $new_o_data["order_id"];

                                                ?>

                                                    <div class="row mt-2 mb-2 shadow">
                                                        <div class="col-2 border-end border-dark">
                                                            <h6 class="fw-bold mt-4"><?php echo $new_o_data["order_id"]; ?></h6>


                                                        </div>
                                                        <?php

                                                        $img_new_o_rs = Database::search("SELECT * FROM `product_image` WHERE `product_id`='" . $new_o_data["product_id"] . "'");
                                                        $img_new_o_data = $img_new_o_rs->fetch_assoc();

                                                        ?>
                                                        <div class="col-2 border-end border-dark">
                                                            <img src="<?php echo $img_new_o_data["path"]; ?>" style="width: 100px;" class="mt-1 mb-1" alt="">
                                                        </div>
                                                        <?php

                                                        $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $new_o_data["product_id"] . "'");
                                                        $product_data = $product_rs->fetch_assoc();

                                                        ?>
                                                        <div class="col-3 border-end border-dark">
                                                            <h6 class="fw-bold"><?php echo $product_data["title"]; ?> </h6>
                                                            <h6>LKR : <?php echo $new_o_data["price"]; ?>.00</h6>
                                                        </div>

                                                        <?php

                                                        $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $new_o_data["user_email"] . "'");
                                                        $user_data = $user_rs->fetch_assoc();
                                                        $addres_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $new_o_data["user_email"] . "'");
                                                        $addres_data = $addres_rs->fetch_assoc();

                                                        ?>

                                                        <div class="col-3 border-end border-dark">
                                                            <h6 class="fw-bold"><?php echo $user_data["fname"] . " " . $user_data["lname"]; ?></h6>
                                                            <h6><?php echo $addres_data["address_line_1"]; ?></h6>
                                                            <h6><?php echo $addres_data["postal_code"]; ?></h6>


                                                        </div>
                                                        <div class="col-2 border-end border-dark">
                                                            <button class="btn selling-btn mt-4" onclick="changeStatustoPaking(<?php echo $new_o_data['id']; ?>);" id="btn<?php echo $new_o_data['order_id']; ?> "><i class="bi bi-box2"></i>&nbsp;Packing</button>

                                                        </div>
                                                    </div>
                                                    <!-- cart -->
                                                <?php
                                                }

                                                ?>



                                            </div>
                                        </div>

                                    </section>

                                    <!-- New Order -->


                                    <!-- Packing -->

                                    <section id="Packing" class="d-none">
                                        <div class="row">
                                            <div class="col-12 shadow-lg">
                                                <div class="row">
                                                    <h4 class="text-center">Packing (<?php echo $invoice_p_rs->num_rows; ?>)</h4>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row mt-4">
                                            <div class="col-12">
                                                <div class="row g-2" style="background-color: #9999; border-radius: 20px;">
                                                    <div class="col-2 border-end border-dark">
                                                        <h6 class="fw-bold">Invoice Id</h6>
                                                    </div>
                                                    <div class="col-2 border-end border-dark">
                                                        <h6 class="fw-bold">Product Image</h6>
                                                    </div>
                                                    <div class="col-3 border-end border-dark">
                                                        <h6 class="fw-bold">Product </h6>
                                                    </div>
                                                    <div class="col-3 border-end border-dark">
                                                        <h6 class="fw-bold">Coustomer Data</h6>
                                                    </div>
                                                    <div class="col-2 border-end border-dark">
                                                        <h6 class="fw-bold">Status</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row mt-4">
                                            <div class="col-12" style="height: 800px; overflow-y: scroll;">
                                                <!-- cart -->

                                                <?php

                                                $paking_rs = Database::search("SELECT * FROM `invoice` WHERE `status`='1' ORDER BY `date_time` DESC");
                                                $paking_num = $paking_rs->num_rows;

                                                for ($z = 0; $z < $paking_num; $z++) {
                                                    $paking_data = $paking_rs->fetch_assoc();
                                                ?>
                                                    <div class="row mt-2 mb-2 shadow">
                                                        <div class="col-2 border-end border-dark">
                                                            <h6 class="fw-bold mt-4"><?php echo $paking_data["order_id"]; ?></h6>


                                                        </div>
                                                        <?php

                                                        $img_new_o_rs = Database::search("SELECT * FROM `product_image` WHERE `product_id`='" . $paking_data["product_id"] . "'");
                                                        $img_new_o_data = $img_new_o_rs->fetch_assoc();

                                                        ?>
                                                        <div class="col-2 border-end border-dark">
                                                            <img src="<?php echo $img_new_o_data["path"]; ?>" style="width: 100px;" class="mt-1 mb-1" alt="">
                                                        </div>
                                                        <?php

                                                        $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $paking_data["product_id"] . "'");
                                                        $product_data = $product_rs->fetch_assoc();

                                                        ?>
                                                        <div class="col-3 border-end border-dark">
                                                            <h6 class="fw-bold"><?php echo $product_data["title"]; ?> </h6>
                                                            <h6>LKR : <?php echo $paking_data["price"]; ?>.00</h6>
                                                        </div>

                                                        <?php

                                                        $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $paking_data["user_email"] . "'");
                                                        $user_data = $user_rs->fetch_assoc();
                                                        $addres_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $paking_data["user_email"] . "'");
                                                        $addres_data = $addres_rs->fetch_assoc();

                                                        ?>

                                                        <div class="col-3 border-end border-dark">
                                                            <h6 class="fw-bold"><?php echo $user_data["fname"] . " " . $user_data["lname"]; ?></h6>
                                                            <h6><?php echo $addres_data["address_line_1"]; ?></h6>
                                                            <h6><?php echo $addres_data["postal_code"]; ?></h6>


                                                        </div>
                                                        <div class="col-2 border-end border-dark">
                                                            <button class="btn selling-btn mt-4" onclick="changeStatustoShipping(<?php echo $paking_data['id']; ?>);" id="btn<?php echo $paking_data['order_id']; ?> "><i class="bi bi-send"></i>&nbsp;Shipping</button>

                                                        </div>
                                                    </div>
                                                    <!-- cart -->
                                                <?php
                                                }

                                                ?>
                                            </div>
                                        </div>

                                    </section>
                                    <!-- Packing -->

                                    <!-- Shipping -->
                                    <section id="Shipping" class="d-none">
                                        <div class="row">
                                            <div class="col-12 shadow-lg">
                                                <div class="row">
                                                    <h4 class="text-center">Shipping (<?php echo $invoice_s_rs->num_rows; ?>)</h4>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-12">
                                                <div class="row g-2" style="background-color: #9999; border-radius: 20px;">
                                                    <div class="col-2 border-end border-dark">
                                                        <h6 class="fw-bold">Invoice Id</h6>
                                                    </div>
                                                    <div class="col-2 border-end border-dark">
                                                        <h6 class="fw-bold">Product Image</h6>
                                                    </div>
                                                    <div class="col-3 border-end border-dark">
                                                        <h6 class="fw-bold">Product </h6>
                                                    </div>
                                                    <div class="col-3 border-end border-dark">
                                                        <h6 class="fw-bold">Coustomer Data</h6>
                                                    </div>
                                                    <div class="col-2 border-end border-dark">
                                                        <h6 class="fw-bold">Status</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-12" style="height: 800px; overflow-y: scroll;">
                                                <!-- cart -->

                                                <?php

                                                $shipping_rs = Database::search("SELECT * FROM `invoice` WHERE `status`='2' ORDER BY `date_time` DESC");
                                                $shipping_num = $shipping_rs->num_rows;

                                                for ($z = 0; $z < $shipping_num; $z++) {
                                                    $shipping_data = $shipping_rs->fetch_assoc();
                                                ?>
                                                    <div class="row mt-2 mb-2 shadow">
                                                        <div class="col-2 border-end border-dark">
                                                            <h6 class="fw-bold mt-4"><?php echo $shipping_data["order_id"]; ?></h6>


                                                        </div>
                                                        <?php

                                                        $img_new_o_rs = Database::search("SELECT * FROM `product_image` WHERE `product_id`='" . $shipping_data["product_id"] . "'");
                                                        $img_new_o_data = $img_new_o_rs->fetch_assoc();

                                                        ?>
                                                        <div class="col-2 border-end border-dark">
                                                            <img src="<?php echo $img_new_o_data["path"]; ?>" style="width: 100px;" class="mt-1 mb-1" alt="">
                                                        </div>
                                                        <?php

                                                        $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $shipping_data["product_id"] . "'");
                                                        $product_data = $product_rs->fetch_assoc();

                                                        ?>
                                                        <div class="col-3 border-end border-dark">
                                                            <h6 class="fw-bold"><?php echo $product_data["title"]; ?> </h6>
                                                            <h6>LKR : <?php echo $shipping_data["price"]; ?>.00</h6>
                                                        </div>

                                                        <?php

                                                        $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $shipping_data["user_email"] . "'");
                                                        $user_data = $user_rs->fetch_assoc();
                                                        $addres_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $shipping_data["user_email"] . "'");
                                                        $addres_data = $addres_rs->fetch_assoc();

                                                        ?>

                                                        <div class="col-3 border-end border-dark">
                                                            <h6 class="fw-bold"><?php echo $user_data["fname"] . " " . $user_data["lname"]; ?></h6>
                                                            <h6><?php echo $addres_data["address_line_1"]; ?></h6>
                                                            <h6><?php echo $addres_data["postal_code"]; ?></h6>


                                                        </div>
                                                        <div class="col-2 border-end border-dark">
                                                            <button class="btn selling-btn mt-4" onclick="changeStatustoDeliverd(<?php echo $shipping_data['id']; ?>);" id="btn<?php echo $shipping_data['order_id']; ?> "><i class="bi bi-check2-square"></i></i>&nbsp;Deliverd</button>

                                                        </div>
                                                    </div>
                                                    <!-- cart -->
                                                <?php
                                                }

                                                ?>
                                            </div>
                                        </div>

                                    </section>
                                    <!-- Shipping -->

                                    <!-- dileverd -->
                                    <section id="dileverd" class="d-none">
                                        <div class="row">
                                            <div class="col-12 shadow-lg">
                                                <div class="row">
                                                    <h4 class="text-center">dileverd (<?php echo $invoice_d_rs->num_rows; ?>)</h4>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-12">
                                                <div class="row g-2" style="background-color: #9999; border-radius: 20px;">
                                                    <div class="col-2 border-end border-dark">
                                                        <h6 class="fw-bold">Invoice Id</h6>
                                                    </div>
                                                    <div class="col-2 border-end border-dark">
                                                        <h6 class="fw-bold">Product Image</h6>
                                                    </div>
                                                    <div class="col-3 border-end border-dark">
                                                        <h6 class="fw-bold">Product</h6>
                                                    </div>
                                                    <div class="col-3 border-end border-dark">
                                                        <h6 class="fw-bold">Coustomer Data</h6>
                                                    </div>
                                                    <div class="col-2 border-end border-dark">
                                                        <h6 class="fw-bold">Status</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row mt-4">
                                            <div class="col-12" style="height: 800px; overflow-y: scroll;">
                                                <!-- cart -->

                                                <?php

                                                $deliverd_rs = Database::search("SELECT * FROM `invoice` WHERE `status`='3' ORDER BY `date_time` DESC");
                                                $deliverd_num = $deliverd_rs->num_rows;

                                                for ($z = 0; $z < $deliverd_num; $z++) {
                                                    $deliverd_data = $deliverd_rs->fetch_assoc();
                                                ?>
                                                    <div class="row mt-2 mb-2 shadow">
                                                        <div class="col-2 border-end border-dark">
                                                            <h6 class="fw-bold mt-4"><?php echo $deliverd_data["order_id"]; ?></h6>


                                                        </div>
                                                        <?php

                                                        $img_new_o_rs = Database::search("SELECT * FROM `product_image` WHERE `product_id`='" . $deliverd_data["product_id"] . "'");
                                                        $img_new_o_data = $img_new_o_rs->fetch_assoc();

                                                        ?>
                                                        <div class="col-2 border-end border-dark">
                                                            <img src="<?php echo $img_new_o_data["path"]; ?>" style="width: 100px;" class="mt-1 mb-1" alt="">
                                                        </div>
                                                        <?php

                                                        $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $deliverd_data["product_id"] . "'");
                                                        $product_data = $product_rs->fetch_assoc();

                                                        ?>
                                                        <div class="col-3 border-end border-dark">
                                                            <h6 class="fw-bold"><?php echo $product_data["title"]; ?> </h6>
                                                            <h6>LKR : <?php echo $deliverd_data["price"]; ?>.00</h6>
                                                        </div>

                                                        <?php

                                                        $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $deliverd_data["user_email"] . "'");
                                                        $user_data = $user_rs->fetch_assoc();
                                                        $addres_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $deliverd_data["user_email"] . "'");
                                                        $addres_data = $addres_rs->fetch_assoc();

                                                        ?>

                                                        <div class="col-3 border-end border-dark">
                                                            <h6 class="fw-bold"><?php echo $user_data["fname"] . " " . $user_data["lname"]; ?></h6>
                                                            <h6><?php echo $addres_data["address_line_1"]; ?></h6>
                                                            <h6><?php echo $addres_data["postal_code"]; ?></h6>


                                                        </div>
                                                        <div class="col-2 border-end border-dark">
                                                            <button class="btn selling-btn mt-4" onclick="changeStatustoHide(<?php echo $deliverd_data['id']; ?>);" id="btn<?php echo $deliverd_data['order_id']; ?> "><i class="bi bi-check2-square"></i></i>&nbsp;Hide</button>

                                                        </div>
                                                    </div>
                                                    <!-- cart -->
                                                <?php
                                                }

                                                ?>
                                            </div>
                                        </div>

                                    </section>
                                    <!-- dileverd -->




                                </div>
                            </div>








                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- panel -->
    <?php
} else {
    ?>

        <h1>Pleace LogIn Frist</h1>

    <?php
}

require "footer.php";

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