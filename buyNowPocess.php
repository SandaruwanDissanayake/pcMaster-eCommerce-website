<?php

// echo ("hello");

session_start();
require "connection.php";
if (isset($_SESSION["u"])) {

    $pid = $_GET["id"];
    $qty = $_GET["qty"];
    $umail = $_SESSION["u"]["email"];

    //    echo($pid);
    //    echo($qty);
    //    echo($umail);

    $array;
    $order_id = uniqid();

    $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "'");
    $product_data = $product_rs->fetch_assoc();

    $city_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $umail . "'");
    $city_num = $city_rs->num_rows;

    if ($city_num == 1) {

        $city_data = $city_rs->fetch_assoc();
        $city_id = $city_data["city_id"];
        $address = $city_data["address_line_1"] . ", " . $city_data["address_line_2"];

        $distric_rs = Database::search("SELECT * FROM `city` WHERE `id`='" . $city_id . "'");
        $distric_data = $distric_rs->fetch_assoc();
        $distric_id = $distric_data["distric_id"];
        //    echo($distric_id);
        $delivery = "0";
        $merchant_id = "1221402"; 


        $delivery = $product_data["delivery_cost"];

        $currency = "LKR";
        $merchant_secret = "12";

        $item = $product_data["title"];
        $amount = ((int)$product_data["price"] * (int)$qty) + (int)$delivery;

        $hash = strtoupper(
            md5(
                $merchant_id . 
                $order_id . 
                number_format($amount, 2, '.', '') . 
                $currency .  
                strtoupper(md5($merchant_secret)) 
            ) 
        );

        $fname = $_SESSION["u"]["fname"];
        $lname = $_SESSION["u"]["lname"];
        $mobile = $_SESSION["u"]["mobile"];
        $user_address = $address;
        $city = $distric_data["name"];

        $array["id"] = $order_id;
        $array["item"] = $item;
        $array["amount"] = $amount;
        $array["fname"] = $fname;
        $array["lname"] = $lname;
        $array["mobile"] = $mobile;
        $array["address"] = $user_address;
        $array["city"] = $city;
        $array["mail"] = $umail;
        $array["hash"] = $hash;

        echo json_encode($array);
    } else {
        echo ("2");
    }
} else {
    echo ("1");
}
