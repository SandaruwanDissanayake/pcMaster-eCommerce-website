<?php
require "connection.php";

session_start();

if (isset($_SESSION["u"])) {



    $user = $_SESSION["u"];
    $email = $user["email"];
    $pid = $_GET["pid"];
    

    // echo ($pid);
// echo ($umail);
// echo ($qty);
// echo ($email);

    $cart_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='" . $pid . "' AND `user_email_email`='" . $email . "'");
    $cart_num = $cart_rs->num_rows;

    // echo ($cart_num);

    if ($cart_num == 0) {
        // echo ("empty");
// echo ($email);

        Database::iud("INSERT INTO `watchlist` (`product_id`,`user_email_email`) VALUES ('" . $pid . "','" . $email . "')");


        echo ("1");

    } else {
        Database::iud("DELETE FROM `watchlist` WHERE `user_email_email`='" . $email . "' AND `product_id`='" .$pid . "'");
        echo ("2");
    }
}else{
    echo ("Pleace Log In Frist");
}
