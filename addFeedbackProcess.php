<?php

require "connection.php";

session_start();

if(isset($_SESSION["u"])){

    $user = $_SESSION["u"];
    $pid = $_POST["pid"];
    $text = $_POST["text"];

    $email = $user["email"];

    Database::iud("INSERT INTO `feedback` (`text`,`user_email`,`product_id`) VALUES ('" . $text . "','" . $email . "','" . $pid . "')");

    echo ("Feedback Send Succesfuly");

}else{
    echo ("Pleace Sign In Frist");
}

?>