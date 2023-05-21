<?php

require("connection.php");

session_start();

if (isset($_SESSION["au"])) {


    $brand_id = $_POST["brand_id"];
    $newMoodel = $_POST["newMoodel"];



    if (isset($brand_id)) {

        if (empty($newMoodel)) {
            echo ("Pleace Enter New Model Name");
        } else {
            $model_rs = Database::search("SELECT * FROM `model` WHERE `name`='" . $newMoodel . "' AND `brand_id`='" . $brand_id . "'");
            $model_num = $model_rs->num_rows;

            if ($model_num == 0) {
                Database::iud("INSERT INTO `model` (`name`,`brand_id`) VALUES ('" . $newMoodel . "','" . $brand_id . "')");

                echo ("done");
            }else{
                echo("Alredy Have This Model");
            }
        }
    } else {
        echo ("Pleace Select Brand Id");
    }
} else {
    echo ("Pleace Log In Frist");
}
