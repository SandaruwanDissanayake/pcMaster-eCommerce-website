<?php

require "connection.php";

$txt = $_POST["t"];
$select = $_POST["s"];

$query = "SELECT * FROM `product`";

if (!empty($txt) && $select == 0) {
    $query .= " WHERE `title` LIKE '%" . $txt . "%'";
} else if (empty($txt) && $select != 0) {
    $query .= " WHERE `catogory_id` = '" . $select . "'";
} else if (!empty($txt) && $select != 0) {
    $query .= "WHERE `title` LIKE '%" . $txt . "%' AND `catogory_id`='" . $select . "'";
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

            if($selected_num==0){
                ?>
                
                <div class="col-12">
                    <div class="row"> 
                        <h6 data-aos="zoom-in" style="font-size: 20px; font-weight: bold;">Sorry.. We don't have the item you are looking for..</h6>
                    </div>
                </div>
                
                <?php
            }else {
                
                
                for ($x = 0; $x < $selected_num; $x++) {
                $selected_data = $selected_rs->fetch_assoc();

                // echo ($selected_data["id"]);
            ?>



                <div  style="width: 18rem;"  >
                    <?php

                    $image_rs = Database::search("SELECT * FROM `product_image` WHERE `product_id`='" . $selected_data["id"] . "'");
                    $image_data = $image_rs->fetch_assoc();

                    ?>

                    <div  onclick="singleProduct('<?php echo $selected_data['id']; ?>');"  class="col-12 mx-1 mt-4  shadow p-3 mb-5 bg-body rounded" style="cursor: pointer;" onclick="a();"  data-aos="zoom-in">
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

<script src="script.js"></script>