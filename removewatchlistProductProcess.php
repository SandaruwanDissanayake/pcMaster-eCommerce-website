<?php


require("connection.php");

session_start();

$email=$_SESSION["u"]["email"];

$pid=$_GET["pid"];
 

Database::iud("DELETE FROM `watchlist` WHERE `user_email_email`='".$email."' AND `product_id`='".$pid."'");

echo("done");
?>