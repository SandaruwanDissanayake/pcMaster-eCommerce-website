<?php



require("connection.php");

session_start();

if(isset($_SESSION["au"])){
    $colour=$_GET["c"];
    if(empty($colour)){
        echo("pleace Enter New Colour");
    }else{
        $colour_rs=Database::search("SELECT * FROM `colour` WHERE `name`='".$colour."'");
        if($colour_rs->num_rows==0){
            Database::iud("INSERT INTO `colour` (`name`) VALUES ('".$colour."')");
   echo("done");
        }else{
            echo("Alredy Have This Colour");
        }
    }
}else{
    echo("Pleace Log In Frist");
}

?>