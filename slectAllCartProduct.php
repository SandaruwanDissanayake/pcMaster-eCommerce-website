<?php

require("connection.php");

session_start();

$user=$_SESSION["u"];
$email=$user["email"];

$status=$_GET["states"];

if($status==1){
    Database::iud("UPDATE `cart` SET `status`='1' WHERE `user_email`='".$email."' ");
    echo("1");
}else{
    Database::iud("UPDATE `cart` SET `status`='0' WHERE `user_email`='".$email."' ");


    echo("0");
}


?>