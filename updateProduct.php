<!DOCTYPE html>

<?php
require "connection.php";
session_start();
$pid = $_GET["id"];


?>

<html lang="en">

<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link rel="icon" href="resouses/bacground_image/logo.png">

  <title>SHOP NOW | TEC MASTER</title>


  <link rel="stylesheet" href="animations/animation.css">


  <link href="bootstrap/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="bootstrap.css">
  <link rel="stylesheet" href="style.css">

</head>
<?php

if (isset($_SESSION["au"])) {
    $admin = $_SESSION["au"];

?>

    <body style=" overflow-x: hidden; height: 100vh; ">



        <?php

        require "adminHeader.php";

        //   echo ($pid);
        $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "'");
        $product_data = $product_rs->fetch_assoc();

        ?>

        <!-- panel -->

        <div class="col-12" >
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
                                        <h4 class="text-center mt-4">UPDATE PRODUCT</h4>
                                        <div class="col-6">
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 shadow-lg m-5">
                                    <div class="row">
                                        <div class="col-lg-4 offset-lg-0 offset-1 col-10 border-lg-end">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row justify-content-center">
                                                        <div class="col-11 mt-4" data-aos="zoom-in">
                                                            <div class="row">
                                                                <label for="" class="fw-bold">*Product Title</label>
                                                                <input type="text" value="<?php echo $product_data["title"] ?>" class="form-control" id="title">
                                                            </div>
                                                        </div>


                                                        <div class="col-11 mt-3" data-aos="zoom-in">
                                                            <div class="row">
                                                                <label for="" class="fw-bold">*Product Catogory</label>
                                                                <?php
                                                                $catogry_rs = Database::search("SELECT * FROM `catogory` WHERE `id`='" . $product_data["catogory_id"] . "'");
                                                                $catogry_data = $catogry_rs->fetch_assoc();
                                                                ?>

                                                                <select name="" class="form-control" id="" disabled>
                                                                    <option value=""><?php echo $catogry_data["name"] ?></option>
                                                                </select>
                                                            </div>
                                                        </div>


                                                        <div class="col-11 mt-3" data-aos="zoom-in">
                                                            <div class="row">
                                                                <label for="" class="fw-bold">*Product Brand</label>
                                                                <?php
                                                                $brand_rs = Database::search("SELECT * FROM `brand` WHERE `id`='" . $catogry_data["id"] . "'");
                                                                $brand_data = $brand_rs->fetch_assoc();
                                                                ?>

                                                                <select name="" class="form-control" id="" disabled>
                                                                    <option value=""><?php echo $brand_data["name"] ?></option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-11 mt-3" data-aos="zoom-in">
                                                            <div class="row">
                                                                <label for="" class="fw-bold">*Product Model</label>
                                                                <?php
                                                                $model_rs = Database::search("SELECT * FROM `model` WHERE `id`='" . $brand_data["id"] . "'");
                                                                $model_data = $model_rs->fetch_assoc();
                                                                ?>

                                                                <select name="" class="form-control" id="" disabled>
                                                                    <option value=""><?php echo $model_data["name"] ?></option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-11 mt-3" data-aos="zoom-in">
                                                            <div class="row">
                                                                <label for="" class="fw-bold">*Product Colur</label>
                                                                <select name="" class="form-select p-3" id="clr" disabled>

                                                                    <?php
                                                                    $clr_rs = Database::search("SELECT * FROM `colour` WHERE `id`='" . $product_data["colour_id"] . "'");
                                                                    $clr_num = $clr_rs->num_rows;

                                                                    for ($a = 0; $a < $clr_num; $a++) {
                                                                        $clr_data = $clr_rs->fetch_assoc();
                                                                    ?>
                                                                        <option value="<?php echo $clr_data["id"]; ?>"><?php echo $clr_data["name"]; ?></option>


                                                                    <?php

                                                                    }

                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-11 mt-3" data-aos="zoom-in">
                                                            <div class="row">
                                                                <label for="" class="fw-bold">*Product Condition</label>
                                                                <div class="col-12 mx-4 mt-4">


                                                                    <div class="row justify-content-center">
                                                                        <?php

                                                                        if ($product_data["condition_id"] == 1) {
                                                                        ?>
                                                                            <div class="form-check form-check-inline  ">
                                                                                <input class="form-check-input" type="radio" id="b" name="c" checked disabled>
                                                                                <label class="form-check-label " for="b">Brand New</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline ">
                                                                                <input class="form-check-input" type="radio" id="u" name="c" disabled>
                                                                                <label class="form-check-label " for="u">used</label>
                                                                            </div>
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <div class="form-check form-check-inline  ">
                                                                                <input class="form-check-input" type="radio" id="b" name="c" disabled>
                                                                                <label class="form-check-label " for="b">Brand New</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline ">
                                                                                <input class="form-check-input" type="radio" id="u" name="c" checked disabled>
                                                                                <label class="form-check-label " for="u">used</label>
                                                                            </div>

                                                                        <?php
                                                                        }

                                                                        ?>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 offset-lg-0 offset-1 col-10 border-lg-end">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row justify-content-center">





                                                        <div class="col-11 mt-4" data-aos="zoom-in">
                                                            <div class="row">
                                                                <label for="" class="fw-bold">*Add quentity</label>

                                                                <input type="number" id="qty" class="form-control" value="<?php echo $product_data["qty"]; ?>" min="0">

                                                            </div>
                                                        </div>

                                                        <div class="col-11 mt-5 mb-4" data-aos="zoom-in">
                                                            <div class="row">

                                                                <div class="col-12">
                                                                    <label for="" class="form-label fw-bold">*Approved payement method</label>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <div class="offset-0 offset-lg-2 col-2 pm pm1"></div>
                                                                        <div class=" col-2 pm pm2"></div>
                                                                        <div class=" col-2 pm pm3"></div>
                                                                        <div class=" col-2 pm pm4"></div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-11 mt-4" data-aos="zoom-in">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <label for="" class="form-label fw-bold">Cost Per Item</label>
                                                                </div>
                                                                <div class=" col-12">
                                                                    <div class="input-group">
                                                                        <span class="input-group-text">Rs.</span>
                                                                        <input type="text" value="<?php echo $product_data["price"]; ?>" id="cost" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                                                                        <span class="input-group-text">.00</span>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="col-11 mt-4" data-aos="zoom-in">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <label for="" class="form-label fw-bold">Delivery Cost</label>
                                                                </div>
                                                                <div class=" col-12">
                                                                    <div class="input-group">
                                                                        <span class="input-group-text">Rs.</span>
                                                                        <input type="text" id="dcost" value="<?php echo $product_data["delivery_cost"]; ?>" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                                                                        <span class="input-group-text">.00</span>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-11 mt-4" data-aos="zoom-in">



                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <p>updated Image</p>
                                                                        <?php
                                                                        $img = array();
                                                                        $img[0] = "resouses/product/R (4).png";
                                                                        $img[1] = "resouses/product/R (4).png";
                                                                        $img[2] = "resouses/product/R (4).png";
                                                                        $images_rs = Database::search("SELECT * FROM `product_image` WHERE `product_id`='" . $product_data["id"] . "'");
                                                                        $images_num = $images_rs->num_rows;

                                                                        for ($x = 0; $x < $images_num; $x++) {
                                                                            $images_data = $images_rs->fetch_assoc();
                                                                            $img[$x] = $images_data["path"];
                                                                        }


                                                                        ?>
                                                                        <div class="row">
                                                                            <div class="col-4 border border-primary rounded">
                                                                                <img src="<?php echo $img[0]; ?>" class="img-fluid" style="width:250px ;" id="i0">
                                                                            </div>
                                                                            <div class="col-4 border border-primary rounded">
                                                                                <img src="<?php echo $img[1]; ?>" class="img-fluid" style="width:250px ;" id="i1">
                                                                            </div>
                                                                            <div class="col-4 border border-primary rounded">
                                                                                <img src="<?php echo $img[2]; ?>" class="img-fluid" style="width:250px ;" id="i2">
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class=" col-12  d-grid mt-3 mb-5">
                                                                    <input type="file" class="d-none" id="imageuploder" multiple>
                                                                    <label for="imageuploder" class="col-12 btn btn-primary" onclick="changeProductImage();">Uplode Image</label>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-10 offset-lg-0 offset-1 col-10 border-lg-end">
                                            <div class="row">

                                            </div>
                                            <div class="col-11 mt-4" data-aos="zoom-in">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label for="" class="form-label fw-bold">Product Description</label>
                                                    </div>
                                                    <div class="col-12">
                                                        <textarea name="" id="desc" cols="30" rows="25" class="form-control"><?php echo $product_data["description"]; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-11 mt-4">
                                                <div class="row">
                                                    <button class="btn btn-success d-grid" onclick="updateProductProcess('<?php echo $product_data['id']; ?>');">Update Product</button>
                                                </div>
                                            </div>
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