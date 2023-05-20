<?php
session_start();

require "connection.php";

if (isset($_SESSION["u"])) {

    $user = $_SESSION["u"];

    $email = $user["email"];
    $pid = $_POST["pid"];
    $star = $_POST["star_id"];

    // echo ($pid);

    $star_rs = Database::search("SELECT * FROM `star` WHERE `product_id`='" . $pid . "' AND `user_email`='" . $email . "' ");
    $star_num = $star_rs->num_rows;

    if($star_num ==0){
        // echo ("no");
        //insert ek

        Database::iud("INSERT INTO `star` (`product_id`,`user_email`,`star_type_id`) VALUES ('" . $pid . "','" . $email . "','" . $star . "')");

        echo ("done");
    }else{
        //update ek

        Database::iud("UPDATE `star` SET `star_type_id`='" . $star . "' WHERE `product_id`='" . $pid . "' AND `user_email`='" . $email . "'");


        echo ("done");
    }
    

}else{
    echo ("Pleace Log In Frist");
}


?>