<?php
session_start();


require "connection.php";

$fname=$_POST["f"];
$lname=$_POST["l"];
$email=$_POST["e"];
$password=$_POST["p"];
$mobile=$_POST["m"];
$gender=$_POST["g"];


// echo($fname);
// echo($lname);
// echo($email);
// echo($password);
// echo($mobile);
// echo($gender);

if(empty($fname)){
    echo("*please enter your Frist Name!!!");
}else if(strlen($fname)>50){
    echo ("*Frist Name must have less than 50 characters");
}else if(empty($lname)){
    echo("*please enter your Last Name!!!");
}else if(strlen($lname)>50){
    echo ("*Last Name must have less than 50 characters");
}else if(empty($email)){
    echo("*please enter your email!!!");
}else if(strlen($email)>=100){
    echo ("*Email address must have less than 100 characters");
}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo("*Invalid email");
}else if(empty($password)){
    echo("*please enter your password!!!");
}else if(strlen($password)<5 || strlen($password)>20){
    echo ("*Password must be between 5-20 characters");
}else if(empty($mobile)){
    echo("*Please enter your mobile number");
}else if(strlen($mobile)!=10){
    echo("*Mobile must have 10 charactors");
}else if(!preg_match("/07[0,1,2,4,5,6,7,8][0-9]/",$mobile)){
    echo("*invalid mobile");
}else{
   $rs=Database::search("SELECT * FROM `user` WHERE `email`='".$email."' OR `mobile`='".$mobile."'");
   $n=$rs->num_rows;

   if($n>0){
    echo("User with the same email or mobile already exists.");
   }else{
    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    Database::iud("INSERT INTO `user` (`fname`,`lname`,`email`,`mobile`,`password`,`gender_id`,`join_date`,`status`,`user_type_user_type_id`)
    VALUES ('".$fname."','".$lname."','".$email."','".$mobile."','".$password."','".$gender."','".$date."','1','1')");

$rs= Database::search("SELECT * FROM `user` WHERE `email`='".$email."' AND `password`='".$password."'");
$n=$rs->num_rows;

if ($n==1){
   $d=$rs->fetch_assoc();
   $_SESSION["u"]=$d;
//    if($rememberme=="true"){
//        setcookie("email",$email,time()+(60*60*24*365));
//        setcookie("password",$password,time()+(60*60*24*365));
   echo("success");


//    }else{
//        setcookie("email","",-1);
//        setcookie("password","",-1);

// // echo("su");
//    }

}else{
   echo("Invalid User Name Or Password");
}

   }
}


?>