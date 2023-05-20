<?php

session_start();
require "connection.php";

if(empty($_GET["v"])){
    echo("Pleace Enter Your Verification Code And Try again");
}else{
    $code=$_GET["v"];
    $admin_rs =Database::search("SELECT * FROM  `user` WHERE `verification_code`='".$code."'");
    $admin_num=$admin_rs->num_rows;
    if($admin_num==1){
        $admin_data=$admin_rs->fetch_assoc();
        $_SESSION["au"]=$admin_data;
        echo("sucsess");



    }else{
        echo("Invalid Verification Code");
    }

}
?>