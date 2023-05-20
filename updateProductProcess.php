<?php

// echo ("hello");

session_start();
require "connection.php";


$pid = $_POST["pid"];
$title = $_POST["t"];
$qty = $_POST["q"];
$cost = $_POST["cost"];
$dcost = $_POST["dcost"];
$description = $_POST["desc"];

// echo ($pid);
// echo ($title);
// echo ($qty);
// echo ($dwc);
// echo ($doc);
// echo ($description);

Database::iud("UPDATE `product` SET `title`='" . $title . "', `qty`='" . $qty . "', `price`='" . $cost . "', 
    `delivery_cost`='" . $dcost . "', `description`='" . $description . "' WHERE `id`='" . $pid . "' ");

echo ("success");

$length = sizeof($_FILES);
$allowded_img_extention = array("image/jpeg", "image/jpeg", "image/png", "image/svg+xml");
if ($length <= 3 && $length > 0) {

    for ($x = 0; $x < $length; $x++) {
        if (isset($_FILES["i" . $x])) {
            $img_file = $_FILES["i" . $x];
            $file_type = $img_file["type"];

            if (in_array($file_type, $allowded_img_extention)) {
                $new_image_extention;

                if ($file_type == "image/jpg") {
                    $new_image_extention = ".jpg";
                } else if ($file_type == "image/jpeg") {
                    $new_image_extention = ".jpeg";
                } else if ($file_type == "image/png") {
                    $new_image_extention = ".ppg";
                } else if ($file_type == "image/svg+xml") {
                    $new_image_extention = ".svg";
                }

                $file_name = "resouses//product//" . $title . "_" . $x . "_" . uniqid() . $new_image_extention;
                move_uploaded_file($img_file["tmp_name"], $file_name);

                Database::iud("DELETE FROM `product_image` WHERE `product_id`='" . $pid . "' ");


                Database::iud("INSERT INTO `product_image` (`path`,`product_id`) VALUES ('" . $file_name . "','" . $pid . "')");

                echo ("success");
            } else {
                echo ("File type not allowed!");
            }
        }
    }
} else {
    echo ("success");
}
