<?php

require("connection.php");

$name=$_POST["name"];
$email=$_POST["email"];
$mobile=$_POST["mobile"];
$comment=$_POST["comment"];
$status=$_POST["status"];

if(empty($name)){
    echo("Pelace Enter Your Name");
}else if(empty($email)){
    echo("Pelace Enter Email");
}else if(empty($mobile)){
    echo("Pelace Enter Mobile");

}else if(empty($comment)){
    echo("Pelace Enter Comment");

}else {
    Database::iud("INSERT INTO `user_comment` (`name`,`email`,`mobile`,`comment`,`status`) 
    VALUES ('".$name."','".$email."','".$mobile."','".$comment."','".$status."')");

    echo("Sucsess");
}

?>