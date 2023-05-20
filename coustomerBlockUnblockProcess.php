<?php

require("connection.php");

$umail=$_GET["uid"];



$user_rs=Database::search("SELECT * FROM `user` WHERE `email`='".$umail."'");
$user_data=$user_rs->fetch_assoc();

// echo($user_data["email"]);

if($user_data["status"]==1){

    Database::iud("UPDATE `user` SET `status`='2' WHERE `email`='".$umail."'");
    echo("done");

}else if($user_data["status"]==2){
    Database::iud("UPDATE `user` SET `status`='1' WHERE `email`='".$umail."'");
echo("done");
}


?>