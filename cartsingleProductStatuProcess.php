<?php
require("connection.php");
session_start();
$email=$_SESSION["u"]["email"];
$pid=$_POST["pid"];
$status=$_POST["status"];

if($status==1){
Database::iud("UPDATE `cart` SET `status`='1' WHERE `product_id`='".$pid."' AND `user_email`='".$email."'");


}else{
Database::iud("UPDATE `cart` SET `status`='0' WHERE `product_id`='".$pid."' AND `user_email`='".$email."'");

}

?>