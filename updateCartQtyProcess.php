<?php
require("connection.php");
session_start();

$umail=$_SESSION["u"]["email"];


$pid=$_POST["id"];
$qty=$_POST["pqty"];

$product_rs=Database::search("SELECT * FROM `product` WHERE `id`='".$pid."'");
$product_data=$product_rs->fetch_assoc();
$avilable_qty=$product_data["qty"];
if($qty<=0){
Database::iud("UPDATE `cart` SET `qty`='1' WHERE `product_id`='".$pid."'  AND `user_email`='".$umail."'");
}else if($qty>$avilable_qty){
Database::iud("UPDATE `cart` SET `qty`='".$avilable_qty."' WHERE `product_id`='".$pid."'  AND `user_email`='".$umail."' ");
}else if(0<$avilable_qty){
Database::iud("UPDATE `cart` SET `qty`='".$qty."' WHERE `product_id`='".$pid."'  AND `user_email`='".$umail."' ");
}

if($qty < 1){
    echo("low");

}else if($avilable_qty<$qty){
    echo("heigh");
}



?>