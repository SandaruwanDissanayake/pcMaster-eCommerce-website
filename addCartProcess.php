<?php
require "connection.php";

session_start();

if (isset($_SESSION["u"])) {



    $user = $_SESSION["u"];
    $email = $user["email"];
    $pid = $_GET["pid"];
    $qty = 1;

    // echo ($pid);
// echo ($umail);
// echo ($qty);
// echo ($email);

    $cart_rs = Database::search("SELECT * FROM `cart` WHERE `product_id`='" . $pid . "' AND `user_email`='" . $email . "'");
    $cart_num = $cart_rs->num_rows;

    // echo ($cart_num);

    if ($cart_num == 0) {
        // echo ("empty");
// echo ($email);

        Database::iud("INSERT INTO `cart` (`product_id`,`user_email`,`qty`) VALUES ('" . $pid . "','" . $email . "','1')");


        echo ("1");

    } else {
        Database::iud("DELETE FROM `cart` WHERE `user_email`='" . $email . "' AND `product_id`='" .$pid . "'");
        echo ("2");
    }
}else{
    echo ("Pleace Log In Frist");
}
