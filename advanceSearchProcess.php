<?php

require("connection.php");

$text = $_POST["text"];
$category = $_POST["category"];
$brand = $_POST["brand"];
$model = $_POST["model"];
$clr = $_POST["clr"];
$condition = $_POST["con"];
$H_to_L = $_POST["priceH_to_L"];
$price_from = $_POST["from"];
$price_to = $_POST["to"];

$query = "SELECT * FROM `product`";

$status = 0;

if (!empty($text)) {
    $query .= " WHERE `title` LIKE '%" . $text . "%'";
    $status = 1;
}
if ($status == 0 && $category != 0) {
    $query .= " WHERE `catogory_id`='" . $category . "'";
    $status = 1;
} else if ($status != 0 && $category != 0) {
    $query .= " AND `catogory_id`='" . $category . "'";
}

$pid = 0;

if ($brand != 0 && $model == 0) {
    $brand_rs = Database::search("SELECT * FROM `brand_has_model` WHERE `brand_id`='" . $brand . "'");
    $brand_num = $brand_rs->num_rows;
    for ($x = 0; $x < $brand_num; $x++) {
        $brand_data = $brand_rs->fetch_assoc();
        $pid = $brand_data["id"];
    }
    if($status==0){
        $query .= "WHERE `brand_has_model_id`='" . $pid . "'";
        $status = 1;
    }else if($status !=0){
        $query .= " AND `brand_has_model_id`='" . $pid . "'";

    }
}

if ($brand == 0 && $model != 0) {

    $model_rs = Database::search("SELECT * FROM `brand_has_model` WHERE `model_id`='" . $model . "'");
    $model_num = $model_rs->num_rows;
    for ($x = 0; $x < $model_num; $x++) {
        $model_data = $model_rs->fetch_assoc();
        $pid = $model_data["id"];
    }

    if ($status == 0) {
        $query .= " WHERE `brand_has_model_id`='" . $pid . "'";
        $status = 1;
    } else if ($status != 0) {
        $query .= " AND `brand_has_model_id`='" . $pid . "'";
    }
}

if ($brand != 0 && $model != 0) {

    $model_has_brand_rs = Database::search("SELECT * FROM `brand_has_model` WHERE `brand_id`='" . $brand . "' 
    AND `model_id`='" . $model . "'");
    $model_has_brand_num = $model_has_brand_rs->num_rows;
    for ($x = 0; $x < $model_has_brand_num; $x++) {
        $model_has_brand_data = $model_has_brand_rs->fetch_assoc();
        $pid = $model_has_brand_data["id"];
    }

    if ($status == 0) {
        $query .= " WHERE `brand_has_model_id`='" . $pid . "'";
        $status = 1;
    } else if ($status != 0) {
        $query .= " AND `brand_has_model_id`='" . $pid . "'";
    }

}

if ($status == 0 && $condition != 0) {
    $query .= " WHERE `condition_id`='" . $condition . "'";
    $status = 1;
} else if ($status != 0 && $condition != 0) {
    $query .= " AND `condition_id`='" . $condition . "'";
}
if ($status == 0 && $clr != 0) {
    $query .= " WHERE `colour_id`='" . $clr . "'";
    $status = 1;
} else if ($status != 0 && $clr != 0) {
    $query .= " AND `colour_id`='" . $clr . "'";
}
if (!empty($price_from) && empty($price_to)) {
    if ($status == 0) {
        $query .= " WHERE `price` >= '" . $price_from . "'";
        $status = 1;
    } else if ($status != 0) {
        $query .= " AND `price` >= '" . $price_from . "'";
    }
} else if (empty($price_from) && !empty($price_to)) {
    if ($status == 0) {
        $query .= " WHERE `price` <= '" . $price_to . "'";
        $status = 1;
    } else if ($status != 0) {
        $query .= " AND `price` <= '" . $price_to . "'";
    }
} else if (!empty($price_from) && !empty($price_to)) {
    if ($status == 0) {
        $query .= " WHERE `price` BETWEEN '" . $price_from . "' AND '" . $price_to . "'";
        $status = 1;
    } else if ($status != 0) {
        $query .= " AND `price` BETWEEN '" . $price_from . "' AND '" . $price_to . "'";
    }
}
if ( $H_to_L == 1) {
    $query .=  "ORDER BY `price` DESC";
    $status = 1;
} 
if ( $H_to_L==2) {
    $query .= "ORDER BY `price` ASC";
    $status = 1;
} 





?>
<div class="row">
    <div class=" col-12  text-center">
        <div class="row justify-content-center">

            <?php


            if ("0" != ($_POST["page"])) {
                $pageno = $_POST["page"];
            } else {
                $pageno = 1;
            }

            $product_rs = Database::search($query);
            $product_num = $product_rs->num_rows;

            $results_per_page = 8;
            $number_of_pages = ceil($product_num / $results_per_page);

            $page_results = ($pageno - 1) * $results_per_page;
            $selected_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

            $selected_num = $selected_rs->num_rows;

            if ($selected_num == 0) {
            ?>

                <div class="col-12">
                    <div class="row">
                        <h6 data-aos="zoom-in" style="font-size: 20px; font-weight: bold;">Sorry.. We don't have the item you are looking for..</h6>
                    </div>
                </div>

                <?php
            } else {


                for ($x = 0; $x < $selected_num; $x++) {
                    $selected_data = $selected_rs->fetch_assoc();

                    // echo ($selected_data["id"]);
                ?>



                    <div style="width: 18rem;">
                        <?php

                        $image_rs = Database::search("SELECT * FROM `product_image` WHERE `product_id`='" . $selected_data["id"] . "'");
                        $image_data = $image_rs->fetch_assoc();

                        ?>

                        <div onclick="singleProduct('<?php echo $selected_data['id']; ?>');" class="col-12 mx-1 mt-4  shadow p-3 mb-5 bg-body rounded " style="cursor: pointer;" onclick="a();" >
                            <div class="row justify-content-center">
                                <div class="col-11" style="background-color: transparent; height: 200px; width: 100%; ">



                                    <img src="<?php echo $image_data["path"]; ?>" style="width: 100%; max-height: 250px;" alt="">

                                    <!-- <img src="resouses/product/OIP__4_-removebg-preview.png" style="width: 100%; max-height: 250px;" alt=""> -->

                                </div>
                                <div class="col-11 bg-white" style="width: 100%; height: 100px; ">
                                    <div class="row">
                                        <div class="col-12 mt-3">
                                            <div class="row justify-content-start">
                                                <label style="cursor: pointer; " class="col-10 text-start" for=""><?php echo $selected_data["title"];  ?></label>
                                                <h6 class="col-1 text-center" style="cursor: pointer;"><i class="bi bi-heart"></i></h6>
                                                <label class="fw-bold text-start" for="">LKR : <?php echo $selected_data["price"]; ?>.00</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>

            <?php

                }
            }
            ?>



        </div>
    </div>
    <!--  -->
    <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
        <nav aria-label="Page navigation example">
            <ul class="pagination pagination-lg justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php if ($pageno <= 1) {
                                                echo ("#");
                                            } else {
                                            ?> onclick="basicSearch(<?php echo ($pageno - 1) ?>);" <?php
                                                                                                } ?> aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php

                for ($x = 1; $x <= $number_of_pages; $x++) {
                    if ($x == $pageno) {
                ?>
                        <li class="page-item active">
                            <a class="page-link" onclick="basicSearch(<?php echo ($x) ?>);"><?php echo $x; ?></a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="page-item">
                            <a class="page-link" onclick="basicSearch(<?php echo ($x) ?>);"><?php echo $x; ?></a>
                        </li>
                <?php
                    }
                }

                ?>

                <li class="page-item">
                    <a class="page-link" <?php if ($pageno >= $number_of_pages) {
                                                echo ("#");
                                            } else {
                                            ?> onclick="basicSearch(<?php echo ($pageno + 1) ?>);" <?php
                                                                                                } ?> aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!--  -->


</div>
<script src="animations/animation.js"></script>
<script src="script.js"></script>