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

  <title>SHOP NOW | ADD PRODUCT</title>


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
<?php

if (isset($_SESSION["au"])) {
    $admin = $_SESSION["au"];
?>

    <body>

        <section style="margin-top: -60px; ">
            <?php

            require "adminHeader.php";

            ?>


            <div class="col-12" style="margin-top: -60px;">
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
                                            <h4 class="text-center mt-4">ADD PRODUCT</h4>
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
                                                                    <input type="text" class="form-control" id="title">
                                                                </div>
                                                            </div>


                                                            <div class="col-11 mt-3" data-aos="zoom-in">
                                                                <div class="row">
                                                                    <label for="" class="fw-bold">*Product Catogory</label>
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
                                                            </div>


                                                            <div class="col-11 mt-3" data-aos="zoom-in">
                                                                <div class="row">
                                                                    <label for="" class="fw-bold">*Product Brand</label>
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
                                                            </div>

                                                            <div class="col-11 mt-3" data-aos="zoom-in">
                                                                <div class="row">
                                                                    <label for="" class="fw-bold">*Product Model</label>
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

                                                            <div class="col-11 mt-3" data-aos="zoom-in">
                                                                <div class="row">
                                                                    <label for="" class="fw-bold">*Product Colur</label>
                                                                    <select name="" class="form-select p-3" id="clr">
                                                                        <option value="0">--Select--</option>

                                                                        <?php
                                                                        $clr_rs = Database::search("SELECT * FROM `colour`");
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
                                                                            <div class="form-check form-check-inline  ">
                                                                                <input class="form-check-input" type="radio" id="b" name="c" checked>
                                                                                <label class="form-check-label " for="b">Brand New</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline ">
                                                                                <input class="form-check-input" type="radio" id="u" name="c">
                                                                                <label class="form-check-label " for="u">used</label>
                                                                            </div>
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
                                                                    <input type="number" id="qty" class="form-control" value="1" min="0">

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
                                                                            <input type="text" id="cost" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
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
                                                                            <input type="text" id="dcost" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                                                                            <span class="input-group-text">.00</span>
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-11 mt-4" data-aos="zoom-in">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="row">
                                                                            <div class="col-4 border border-primary rounded">
                                                                                <img src="resouses/product/R (4).png" class="img-fluid" style="width:250px ;" id="i0">
                                                                            </div>
                                                                            <div class="col-4 border border-primary rounded">
                                                                                <img src="resouses/product/R (4).png" class="img-fluid" style="width:250px ;" id="i1">
                                                                            </div>
                                                                            <div class="col-4 border border-primary rounded">
                                                                                <img src="resouses/product/R (4).png" class="img-fluid" style="width:250px ;" id="i2">
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
                                                            <textarea name="" id="desc" cols="30" rows="15" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-11 mt-4">
                                                    <div class="row">
                                                        <button class="btn btn-success d-grid" onclick="addProduct();">Update Product</button>
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
            <?php

            require "footer.php";

            ?>





            <script src="bootstrap/animation/purecounter/purecounter_vanilla.js"></script>
            <script src="bootstrap/animation/aos/aos.js"></script>
            <script src="bootstrap/animation/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="bootstrap/animation/glightbox/js/glightbox.min.js"></script>
            <script src="bootstrap/animation/isotope-layout/isotope.pkgd.min.js"></script>
            <script src="bootstrap/animation/swiper/swiper-bundle.min.js"></script>
            <script src="bootstrap/animation/php-email-form/validate.js"></script>


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