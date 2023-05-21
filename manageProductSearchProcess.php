<?php

require("connection.php");

$text = $_POST["text"];
$category = $_POST["category"];
$brand = $_POST["brand"];
$model = $_POST["model"];
$status = $_POST["status"];
$qty = $_POST["qty"];
$condition = $_POST["condition"];



$query = "SELECT * FROM `product` ";




if (!empty($text)) {
    $query .= " WHERE `title` LIKE '%" . $text . "%'";

    if ($status != "0") {

        $query .= " AND `status_id`='" . $status . "'";
    }
    if ($condition != "0") {

        $query .= " AND `condition_id`='" . $condition . "'";
    }
    if ($qty != "0") {
        if ($qty == "1") {
            $query .= " ORDER BY `qty` DESC";
        } else if ($qty == "2") {
            $query .= " ORDER BY `qty` ASC";
        }
    }
} else {
    if ($status != "0") {

        $query .= " WHERE `status_id`='" . $status . "'";
    }
    if ($condition != "0") {

        $query .= " WHERE `condition_id`='" . $condition . "'";
    }
    if ($qty != "0") {
        if ($qty == "1") {
            $query .= " ORDER BY `qty` DESC";
        } else if ($qty == "2") {
            $query .= " ORDER BY `qty` ASC";
        }
    }
}









?>

<div class="offset-1 col-10 text-center ">
    <div class="row justify-content-center">

        <?php


        if ("0" != ($_POST["page"])) {
            // echo("hello1");
            $pageno = $_POST["page"];
            // echo("hello2");
        } else {
            $pageno = 1;
        }



        $product_rs = Database::search($query);

        $product_num = $product_rs->num_rows;

        $results_per_page = 6;
        $number_of_pages = ceil($product_num / $results_per_page);

        // echo("hello1");

        $page_results = ($pageno - 1) * $results_per_page;
        $selected_rs = Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

        // echo ("hello");

        $selected_num = $selected_rs->num_rows;

        for ($x = 0; $x < $selected_num; $x++) {
            $product_data = $selected_rs->fetch_assoc();
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

                                    if ($product_data["status_id"] == 1) {
                                    ?>
                                        <button class="btn btn-danger d-grid" onclick="activeDeactiveProduct(<?php echo $product_data['id']; ?>);">Block</button>
                                    <?php
                                    } else {
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

<div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
    <nav aria-label="Page navigation example">
        <ul class="pagination pagination-lg justify-content-center">
            <li class="page-item">
                <a class="page-link" <?php if ($pageno <= 1) {
                                            echo "#";
                                        } else {
                                        ?> onclick="sort1('<?php echo ($pageno - 1); ?>');" <?php
                                                                                                    // echo "?page=" . ($pageno - 1);
                                                                                                } ?> aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php

            for ($x = 1; $x <= $number_of_pages; $x++) {
                if ($x == $pageno) {

            ?>
                    <li class="page-item active">
                        <a class="page-link" onclick="sort1('<?php echo $x; ?>');"><?php echo $x; ?></a>
                    </li>
                <?php

                } else {
                ?>
                    <li class="page-item">
                        <a class="page-link" onclick="sort1('<?php echo $x; ?>');"><?php echo $x; ?></a>
                    </li>
            <?php
                }
            }

            ?>

            <li class="page-item">
                <a class="page-link" <?php if ($pageno >= $number_of_pages) {
                                            echo "#";
                                        } else {
                                        ?> onclick="sort1('<?php echo ($pageno + 1); ?>');" <?php
                                                                                                    // echo "?page=" . ($pageno + 1);
                                                                                                } ?> aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>