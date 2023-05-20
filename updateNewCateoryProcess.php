<?php
require("connection.php");

session_start();

if(isset($_SESSION["au"])){

    $category=$_POST["category"];

    $category_rs=Database::search("SELECT * FROM `catogory` WHERE `name`='".$category."'");
if($category_rs->num_rows ==0){

    if (isset($_FILES["image"])) {
        $image = $_FILES["image"];

        $allowed_image_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");
        $file_ex = $image["type"];
        // echo($file_ex);
        if (!in_array($file_ex, $allowed_image_extentions)) {
            echo ("Pleace select a valid image.");
        } else {
            $new_file_extention;
            if ($file_ex == "image/jpg") {
                $new_file_extention = ".jpg";
            } else  if ($file_ex == "image/jpeg") {
                $new_file_extention = ".jpeg";
            } else if ($file_ex == "image/png") {
                $new_file_extention = ".png";
            } else if ($file_ex == "image/svg+xml") {
                $new_file_extention = ".svg";
            }
            // echo("$new_file_extention");
            $file_name = "resouses/category_image/" . $category . "_" . uniqid() . $new_file_extention;
            move_uploaded_file($image["tmp_name"], $file_name);
            

            Database::iud("INSERT INTO `catogory` (`name`,`path`) VALUES ('".$category."','".$file_name."')");

           echo("done");
        }
    }else{
        Database::iud("INSERT INTO `catogory` (`name`) VALUES ('".$category."')");
        echo("done");

    }

}else{
    echo("A type with this name was previously entered");
}


    



}else{
    echo("Pleace Log In Frist");
}

?>