<?php

require("connection.php");

session_start();

if(isset($_SESSION["u"])){
    $user=$_SESSION["u"];

    $email=$user["email"];
    
    
    Database::iud("UPDATE `cart` SET `status`='0' WHERE `user_email`='".$email."'");
}



?>