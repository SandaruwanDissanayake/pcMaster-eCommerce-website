<?php

require("connection.php");

$text=$_POST["text"];
$status=$_POST["status"];


$query = "SELECT * FROM `user` WHERE `user_type_user_type_id`='1'";

if(!empty($text)){
    $query .= " AND `fname` LIKE '%" . $text . "%' OR `lname` LIKE '%" . $text . "%'";

    if ($status != "0") {

        $query .= " AND `status`='" . $status . "'";
    }
    

}else{
    if ($status != "0") {

        $query .= " AND `status`='" . $status . "'";
    }
}

?>

<div class=" col-12 text-center ">
    <div class="row justify-content-center">

        <?php


        if ("0" != ($_POST["page"])) {
            // echo("hello1");
            $pageno = $_POST["page"];
            // echo("hello2");
        } else {
            $pageno = 1;
        }



        $user_rs = Database::search($query);

        $user_num = $user_rs->num_rows;

        $results_per_page = 6;
        $number_of_pages = ceil($user_num / $results_per_page);

        // echo("hello1");

        $page_results = ($pageno - 1) * $results_per_page;
        $selected_rs = Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

        // echo ("hello");

        $selected_num = $selected_rs->num_rows;

        for ($x = 0; $x < $selected_num; $x++) {
            $user_data = $selected_rs->fetch_assoc();
        ?>
            <!-- cart -->

            <div class="col-12 shadow-lg rounded-3 mt-2">
                <div class="row m-1">

                <div class="row border p-2" >
                                                                    <h6 class="text-center col-1 border-end border-dark"><?php echo $x + 1; ?></h6>
                                                                    <?php

                                                                    $user_img_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $user_data["email"] . "'");
                                                                    $user_img_data = $user_img_rs->fetch_assoc();

                                                                    ?>
                                                                    <div class="col-3 border-end text-center border-dark">
                                                                        <div class="row justify-content-center">
                                                                            <img src="<?php echo $user_img_data["path"]; ?>" style="width: 100px;" alt="">

                                                                        </div>

                                                                    </div>
                                                                    <h6 class="col-4 border-end text-center border-dark"><?php echo $user_data["fname"] . " " . $user_data["lname"]; ?></h6>
                                                                    <?php

                                                                    $purchase_rs = Database::search("SELECT * FROM `invoice` WHERE `user_email`='" . $user_data["email"] . "'");
                                                                    // $purchase_data=$purchase_rs->fetch_assoc();

                                                                    ?>
                                                                    <h6 class="col-2 "><?php echo $purchase_rs->num_rows; ?></h6>
                                                                    <?php

                                                                    if ($user_data["status"] == 1) {
                                                                    ?>
                                                                        <button class="col-2 btn btn-danger" onclick="coustomerBlockUnblock('<?php echo $user_data['email']; ?>');">Block</button>

                                                                    <?php
                                                                    } else if ($user_data["status"] == 2) {
                                                                    ?>
                                                                        <button class="col-2 btn btn-success" onclick="coustomerBlockUnblock('<?php echo $user_data['email']; ?>');">Unblock</button>
                                                                    <?php
                                                                    }

                                                                    ?>

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