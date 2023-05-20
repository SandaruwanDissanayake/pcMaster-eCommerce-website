<?php


require("connection.php");

session_start();

$email=$_SESSION["u"]["email"];

$pid=$_GET["pid"];
 

Database::iud("DELETE FROM `cart` WHERE `user_email`='".$email."' AND `product_id`='".$pid."'");

echo("done");
?>