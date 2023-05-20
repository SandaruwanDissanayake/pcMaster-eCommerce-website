<!DOCTYPE html>
<?php

require "connection.php";
session_start();


?>

<html>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" href="resouses/bacground_image/logo.png">

    <title>TEC MASTER | MANAGE PRODUCT</title>







    <link rel="stylesheet" href="animations/animation.css">

    <link href="bootstrap/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">

</head>
<?php

if (isset($_SESSION["au"])) {
    $admin = $_SESSION["au"];
?>

    <body>

        <section >
            <?php

            require "adminHeader.php";

            ?>


            <div class="col-12">
                <div class="row">
                    <?php

                    require "panel.php";

                    ?>

                    <div class="col-lg-9 col-12">



                        <!-- add product -->

                        <section id="addproduct" class="m-4" style="  height: 800px; overflow: scroll; overflow-x: hidden;">
                            <div class="col-12">
                                <div class="row justify-content-center">
                                    <div class="col-12">
                                        <div class="row justify-content-center" data-aos="zoom-in">
                                            <h4 class="text-center mt-4">MANAGE PRODUCT</h4>
                                            <div class="col-6">
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12  " data-aos="zoom-in">
                                        <div class="row justify-content-center">
                                            <div class="col-11 shadow-lg rounded-1">
                                                <div class="row justify-content-end border-bottom">
                                                    <div class="col-3">
                                                        <button class="btn btn-success d-grid mt-2 mb-2" onclick="(window.location='addProduct.php');">Add Product</button>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="row mt-3 mb-3">
                                                            <div class="col-lg-3 col-6 mt-2">
                                                                <input type="text" class="form-control" placeholder="Enter Keyword" id="text">
                                                            </div>
                                                            <div class="col-lg-3 col-6 mt-2">
                                                                <select class="form-select text-center" onchange="loadbrand();" id="category">
                                                                    <option value="0">--Select Category--</option>
                                                                    <?php
                                                                    $category_rs = Database::search("SELECT * FROM `catogory`");
                                                                    $category_num = $category_rs->num_rows;

                                                                    for ($x = 0; $x < $category_num; $x++) {
                                                                        $category_data = $category_rs->fetch_assoc();
                                                                    ?>
                                                                        <option value="<?php echo $category_data["id"]; ?>"><?php echo ($category_data["name"]); ?></option>
                                                                    <?php
                                                                    }


                                                                    ?>

                                                                </select>
                                                            </div>
                                                            <div class="col-lg-3 col-6 mt-2">
                                                                <select class="form-select text-center" onchange="loadmodel();" id="brand">
                                                                    <option value="0">--Select Brand--</option>
                                                                    <?php
                                                                    $brand_rs = Database::search("SELECT *FROM `brand`");
                                                                    $brand_num = $brand_rs->num_rows;
                                                                    for ($y = 0; $y < $brand_num; $y++) {
                                                                        $brand_data = $brand_rs->fetch_assoc();
                                                                    ?>
                                                                        <option value="<?php echo $brand_data["id"]; ?>"><?php echo $brand_data["name"]; ?></option>
                                                                    <?php
                                                                    }

                                                                    ?>


                                                                </select>
                                                            </div>
                                                            <div class="col-lg-3 col-6 mt-2">
                                                                <select class="form-select text-center" id="model">
                                                                    <option value="0">--Select Model--</option>
                                                                    <?php
                                                                    $model_rs = Database::search("SELECT * FROM `model`");
                                                                    $model_num = $model_rs->num_rows;
                                                                    for ($z = 0; $z < $model_num; $z++) {
                                                                        $model_data = $model_rs->fetch_assoc();
                                                                    ?>
                                                                        <option value="<?php echo $model_data["id"]; ?>"><?php echo $model_data["name"]; ?></option>
                                                                    <?php
                                                                    }

                                                                    ?>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3 mb-3">

                                                            <div class="col-4 border-end">
                                                                <div class="row">
                                                                    <div class=" offset-2 col-10">
                                                                        <label class="fw-bold" for="">Acrive/Deactive</label>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="row justify-content-center">
                                                                            <div class="col-9">
                                                                                <hr>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="a" id="active">
                                                                            <label class="form-check-label" for="active">
                                                                                Active
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="a" id="deactive" >
                                                                            <label class="form-check-label" for="deactive">
                                                                               Deactive
                                                                            </label>
                                                                        </div>
                                                                    </div>



                                                                </div>
                                                            </div>


                                                            <div class="col-4 border-end">
                                                                <div class="row">
                                                                    <div class=" offset-2 col-10">
                                                                        <label class="fw-bold" for="">Product Quntity</label>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="row justify-content-center">
                                                                            <div class="col-9">
                                                                                <hr>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="b" id="l_h_qty">
                                                                            <label class="form-check-label" for="l_h_qty">
                                                                                Low To High
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="b" id="l_h_qty" >
                                                                            <label class="form-check-label" for="h_l_qty">
                                                                                High To Low
                                                                            </label>
                                                                        </div>
                                                                    </div>



                                                                </div>
                                                            </div>



                                                            <div class="col-4 border-end">
                                                                <div class="row">
                                                                    <div class=" offset-2 col-10">
                                                                        <label class="fw-bold" for="">Condition</label>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="row justify-content-center">
                                                                            <div class="col-9">
                                                                                <hr>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="c" id="used">
                                                                            <label class="form-check-label" for="used">
                                                                            Brand New
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="c" id="brandnew" >
                                                                            <label class="form-check-label" for="brandnew">
                                                                              
                                                                                Used
                                                                            </label>
                                                                        </div>
                                                                    </div>



                                                                </div>
                                                            </div>


                                                        </div>

                                                        <div class="row justify-content-end">

                                                        

                                                            <button class="col-3 btn btn-danger mx-3" onclick="window.location.reload();">Clear</button>
                                                            <button class="col-3 btn btn-success" onclick="manageProductSearch(1);">Search</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <section id="Product">


                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <?php

                                                                $product_rs = Database::search("SELECT * FROM `product`");
                                                                $product_num = $product_rs->num_rows;

                                                                for ($x = 0; $x < $product_num; $x++) {
                                                                    $product_data = $product_rs->fetch_assoc();
                                                                ?>

                                                                    <!-- cart -->

                                                                    <div class="col-4 shadow-lg rounded-3 mt-2">
                                                                        <div class="row m-1">

                                                                            <?php

                                                                            $product_img_rs = Database::search("SELECT * FROM `product_image` WHERE `product_id`='" . $product_data["id"] . "'");
                                                                            $product_img_num = $product_img_rs->num_rows;

                                                                            if ($product_img_num != 0) {
                                                                                $product_img_data = $product_img_rs->fetch_assoc();

                                                                            ?>
                                                                                <div class="col-12">
                                                                                    <img src="<?php echo $product_img_data["path"]; ?>" style="width: 100%; max-height: 200px;" alt="" srcset="">
                                                                                </div>

                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <div class="col-12">
                                                                                    <img src="resouses/product/DELL CORE i5_0_63cbe57edab6f.jpeg" style="width: 100%; max-height: 200px;" alt="" srcset="">
                                                                                </div>

                                                                            <?php
                                                                            }

                                                                            ?>

                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <h6 class="fw-bold"><?php echo $product_data["title"]; ?></h6>
                                                                                    <div class="col-5 mt-3">
                                                                                        <h6 class="text-bg-danger">Rs:<?php echo $product_data["price"]; ?>.00</h6>
                                                                                    </div>
                                                                                    <div class="col-7 mt-3">
                                                                                        <h6><?php echo $product_data["qty"]; ?> Item Availeble</h6>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <div class="row justify-content-center">
                                                                                    <div class="col-5 m-2">
                                                                                        <div class="row">
                                                                                            <?php
                                                                                            
                                                                                            if($product_data["status_id"]==1){
                                                                                                ?>
                                                                                                  <button class="btn btn-danger d-grid" onclick="activeDeactiveProduct(<?php echo $product_data['id']; ?>);">Block</button>
                                                                                                <?php
                                                                                            }else {
                                                                                                ?>
                                                                                                  <button class="btn btn-primary d-grid" onclick="activeDeactiveProduct(<?php echo $product_data['id']; ?>);">UnBlock</button>
                                                                                                
                                                                                                <?php
                                                                                            }
                                                                                            
                                                                                            ?>
                                                                                          

                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-5 m-2">
                                                                                        <div class="row">
                                                                                            <button class="btn btn-success d-grid" onclick="updateProduct('<?php echo $product_data['id']; ?>');">Update</button>

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
                                                        </div>
                                                    </div>

                                                </section>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <!-- add product -->


                    </div>

                </div>
            </div>
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