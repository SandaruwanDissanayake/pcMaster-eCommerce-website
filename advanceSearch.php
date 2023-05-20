<?php require "connection.php";

session_start();



?>

<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link rel="icon" href="resouses/bacground_image/logo.png">

  <title>TEC MASTER | ADVANCE SEARCH</title>


<link rel="stylesheet" href="animations/animation.css">

  <link href="bootstrap/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="bootstrap.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>
    <section>
        <div class="col-12">
            <div class="row">
            <?php require "header2.php" ?> 


                <div class="col-12 mb-5">
                    <div class="row">
                        <!-- search area -->
                        <div class=" col-12" style="margin-top: 50px;">
                            <div class="row justify-content-center">
                                <div class="col-11 shadow-lg p-5 z-in">
                                    <div class="row  mb-3 justify-content-center">
                                        <div class="col-lg-6 col-12 mt-3">
                                            <input type="text" class="form-control" placeholder="Enter Keywords" id="text">
                                        </div>
                                        <div class="col-lg-2 col-3 mt-3">
                                            <div class="row">

                                                <select class="form-select text-center" onchange="loadbrand();" id="category">
                                                    <option value="0">--Category--</option>
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
                                        <div class="col-lg-2 col-3 mt-3">
                                            <div class="row">
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
                                        <div class="col-lg-2 col-3 mt-3">
                                            <div class="row">
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
                                    </div>
                                    <hr>
                                    <div class="row mt-3">
                                        <div class="col-lg-6 col-12 border-end">
                                            <div class="row">
                                                <label for="" class="text-dark fw-bold fs-5">Price</label>
                                            </div>
                                            <div class="row mt-3 mx-1">
                                                <div class="col-4 mt-4">
                                                    <select name="" id="priceHtoL" class="form-select">
                                                        <option value="0">--Price--</option>

                                                        <option value="1">High To Low</option>
                                                        <option value="2">Low To High</option>
                                                    </select>
                                                </div>
                                                <div class="col-8">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="row">
                                                                <h6>Form</h6>
                                                                <input type="number" id="from" placeholder="Rs:         .00" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="row">
                                                                <h6>To</h6>
                                                                <input type="number" id="to" placeholder="Rs:         .00" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>


                                        <div class="col-lg-3 col-6 border-end">
                                            <div class="row">
                                                <label for="" class="text-dark fw-bold fs-5"> Condition</label>
                                            </div>
                                            <div class="row mt-4 mx-1">
                                                <select name="" id="con" class="form-select">
                                                    <option value="0">--Select Condition--</option>
                                                    <option value="1">Brand New</option>
                                                    <option value="2">Used</option>

                                                </select>

                                            </div>
                                        </div>




                                        <div class="col-lg-3 col-6">
                                            <div class="row">
                                                <label for="" class="text-dark fw-bold fs-5">Color</label>
                                            </div>
                                            <div class="row mt-4 mx-1">
                                                <select name="" id="clr" class="form-select">
                                                    <option value="0">--Select Colour--</option>
                                                    <?php

                                                    $clr_rs = Database::search("SELECT * FROM `colour`");
                                                    $clr_num = $clr_rs->num_rows;

                                                    for ($q = 0; $q < $clr_num; $q++) {
                                                        $clr_data = $clr_rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $clr_data["id"]; ?>"><?php echo $clr_data["name"]; ?></option>

                                                    <?php
                                                    }

                                                    ?>



                                                </select>

                                            </div>
                                        </div>

                                        <div class="row mt-5 justify-content-end">
                                            <button class="col-3 d-grid btn btn-success" onclick="advansSerchBtn(0);">Search</button>
                                        </div>

                                    </div>
                                </div>

                                <section class="col-11" id="searchResult">

                                    <div class="col-12 mt-4 shadow-lg" data-aos="zoom-in" data-aos-delay="500">
                                        <div class="row justify-content-center">
                                            <h1 class="text-center" style="font-size: 100px; padding: 50px;"><i class="bi bi-search"></i></h1>
                                        </div>
                                    </div>

                                </section>
                            </div>
                        </div>
                        <!-- search area -->

                    </div>
                </div>

                <?php require("footer.php"); ?>
            </div>
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
</body>

</html>