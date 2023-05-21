<?php

require("connection.php");

session_start();

if (isset($_SESSION["au"])) {

    $category_id = $_POST["category_id"];
    $newBrand = $_POST["newbrand"];

if(empty($newBrand)){
  echo("Pleace Enter New Brand Name");
}else{

    if (isset($category_id)) {

        $brand_rs = Database::search("SELECT * FROM `brand` WHERE `name`='" . $newBrand . "' AND `catogory_id`='" . $category_id . "'");
        if ($brand_rs->num_rows == 0) {
            Database::iud("INSERT INTO `brand` (`catogory_id`,`name`) VALUES ('" . $category_id . "','" . $newBrand . "')");

            echo ("done");
        } else {
            echo ("Alredy have this brand");
        }
    } else {
        echo ("Pleace Select Category");
    }

}
    
} else {
    echo ("pleace Log In Frist");
}
