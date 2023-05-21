<?php
session_start();
require "connection.php";
$email = $_SESSION["au"]["email"];


$catagory = $_POST["ca"];
$brand = $_POST["br"];
$model = $_POST["mo"];
$title = $_POST["ti"];
$condition = $_POST["co"];
$clr = $_POST["clr"];
$qty = $_POST["qty"];
$cost = $_POST["cost"];
$dcost = $_POST["dcost"];
$desc = $_POST["desc"];
// $image = $_POST["image"];

// echo($catagory);
// echo("<br>");
// echo($model);
// echo("<br>");
// echo($brand);
// echo("<br>");
// echo($title);
// echo("<br>");
// echo($condition);
// echo("<br>");
// echo($clr);
// echo("<br>");
// echo($clr_in);
// echo("<br>");
// echo($qty);
// echo("<br>");
// echo($cost);
// echo("<br>");
// echo($dwc);
// echo("<br>");
// echo($doc);
// echo("<br>");
// echo($desc);
// echo("<br>");
// echo($image);

if (empty($title)) {
    echo ("pelace enter your title");
}else if ($catagory == 0) {
    echo ("pleace select a catagory");
} else if ($brand == 0) {
    echo ("pleace select a brand");
} else if ($model == 0) {
    echo ("pleace select a model");
} else if (strlen($title <= 100)) {
    echo ("Title should have lower than 100 characters");
} else if ($clr == "0") {

    echo ("please select a colour");
} else if (empty($qty)) {
    echo ("please enter the quntity");
} else if ($qty == "0" | $qty == "e" | $qty < 0) {
    echo ("Invalid input for quntity");
} else if (empty($cost)) {
    echo ("Please enter the price");
} else if (!is_numeric($cost)) {
    echo ("Invalid input for cost");
} else if (empty($dcost)) {
    echo ("Please enter the delivery fee.");
} else if (!is_numeric($dcost)) {
    echo ("Invalid input for delivery fee.");
}  else if (empty($desc)) {
    echo ("pleace enter a Description.");
} else {
  
    $bhm_rs = Database::search("SELECT * FROM `brand_has_model` WHERE `brand_id`='" . $brand . "' AND `model_id`='" . $model . "'");
    $barand_has_model_id;
  

    if ($bhm_rs->num_rows == 1) {
        $bhm_data = $bhm_rs->fetch_assoc();
        $brand_has_model_id = $bhm_data["id"];
  

    } else {
        Database::iud("INSERT INTO `brand_has_model`(`brand_id`,`model_id`) VALUES ('" . $brand . "','" . $model . "')");
        $brand_has_model_id = Database::$connection->insert_id;
    

    }
   

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");
  


    $status = 1;



    Database::iud("INSERT INTO `product` (`catogory_id`,`brand_has_model_id`,`colour_id`,`price`,`qty`,`description`,
    `title`,`condition_id`,`status_id`,`add_admin_email`,`added_date_time`,`delivery_cost`) VALUES 
    ('".$catagory."','". $brand_has_model_id."','".$clr."','".$cost."','".$qty."','".$desc."','".$title."',
    '".$condition."','".$status."','".$email."','".$date."','".$dcost."')");

   

    // echo("update successfully");

    $product_id = Database::$connection->insert_id;

    $length = sizeof($_FILES);
    // echo($length);

    if ($length <= 3 && $length > 0) {
        // echo("hello");
        $allowed_img_extentions = array("image/jpg", "image/png", "image/jpeg", "image/svg");
        for ($x = 0; $x < $length; $x++) {
            if (isset($_FILES["image" . $x])) {
                $image_file = $_FILES["image".$x];
                $file_extention = $image_file["type"];
                // echo ($file_extention);
                if (in_array($file_extention, $allowed_img_extentions)) {
                    $new_image_extention;

                    if ($file_extention == "image/jpg") {
                        $new_image_extention = ".jpg";
                    } else if ($file_extention == "image/jpeg") {
                        $new_image_extention = ".jpeg";
                    } else if ($file_extention == "image/png") {
                        $new_image_extention = ".png";
                    } else if ($file_extention == "image/svg+xml") {
                        $new_image_extention = ".svg";
                    }

                    $file_name="resouses//product//".$title."_".$x."_".uniqid().$new_image_extention;
                    move_uploaded_file($image_file["tmp_name"],$file_name);
                    Database::iud("INSERT INTO `product_image`(`path`,`product_id`) VALUES ('".$file_name."','".$product_id."')");

                    // echo("1");

                
                }else {
                echo("invalid image type");
                }
                echo("1");
                
            }
        }
    } else {
        echo ("Invalid image count");
    }
}
