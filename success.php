<?php

require "connection.php";
session_start();

$email = $_SESSION["u"]["email"];




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Compleate</title>
  <link rel="icon" href="resouses/bacground_image/logo.png">

  <link rel="stylesheet" href="style.css">

</head>

<body>
  <div class="success-container">
    <?php
    if (isset($_GET["json"]) && !empty($_GET["json"])) {

      $json = $_GET["json"];

      $PHP_Obj = json_decode($json);


      // $amount = $PHP_Obj->amount;
      // $token = $PHP_Obj->token;
      // $phone = $PHP_Obj->phone;
      $qty = $PHP_Obj->qty;
      // $desc = $PHP_Obj->desc;
      // $pid = $PHP_Obj->pid;
      $pid = $PHP_Obj->pid;
      // $token_card_type = $PHP_Obj->token_card_type;

      if ($pid == 0) {
        $p_id_rs = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $email . "' AND `status`='1'");
        $invoice_id = uniqid();

        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d h:i:s"); 

        $product_num = $p_id_rs->num_rows;

        for ($x = 0; $x < $product_num; $x++) {

          $p_id_data = $p_id_rs->fetch_assoc();

          $pid = $p_id_data["product_id"];
          $qty = $p_id_data["qty"];

          $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "'");
          $product_data = $product_rs->fetch_assoc();

          $price = $product_data["price"];



          Database::iud("INSERT INTO `invoice` (`order_id`,`qty`,`price`,`user_email`,`product_id`,`date_time`) 
  VALUES ('" . $invoice_id . "','" . $qty . "','" . $price . "','" . $email . "','" . $pid . "','" . $date . "')");

          $new_qty = $product_data["qty"] - $qty;

          Database::iud("UPDATE `product` SET `qty`='" . $new_qty . "' WHERE `id`='" . $pid . "'");

          Database::iud("DELETE FROM `cart` WHERE `product_id`='" . $pid . "' AND `user_email`='" . $email . "'");
        }
      } else {
        $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "'");
        $product_data = $product_rs->fetch_assoc();

        $p_price = $product_data["price"];
        $d_cost = $product_data["delivery_cost"];
        $all_product_price = $p_price * $qty;
        $total_price = ($p_price * $qty) ;

        $invoice_id = uniqid();

        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d h:i:s");



        Database::iud("INSERT INTO `invoice` (`order_id`,`qty`,`price`,`user_email`,`product_id`,`date_time`) 
  VALUES ('" . $invoice_id . "','" . $qty . "','" . $total_price . "','" . $email . "','" . $pid . "','" . $date . "')");


        $new_qty = $product_data["qty"] - $qty;
        Database::iud("UPDATE `product` SET `qty`='" . $new_qty . "' WHERE `id`='" . $pid . "'");
      }

      // echo ($pid);
      // echo ($qty);
      // echo ($email);






      //     $email = $_GET["mobile"];
      //    $amount= $_GET["amount"];



    ?>
      <!-- <h1><?php echo $json; ?></h1> -->
      <input type="text" hidden value="<?php echo $pid; ?>" id="pid">
      <input type="text" hidden value="<?php echo $qty; ?>" id="qty">
      <input type="text" hidden value="<?php echo $invoice_id; ?>" id="invoice_id">



      <div class="col-12">
        <div class="row" style="display: flex; align-items: center; justify-content: center;">

          <img src="resouses/sucsesspng.gif" alt="" style="width: 300px; height: 200px;">
        </div>

      </div>
      <div class="col-12">
        <div class="row" style="display: flex; align-items: center; justify-content: center;">
          <h3 class="text-center " style="font-size: 30px;">Your Transaction has been Successfully Completed</h3>

        </div>

      </div>

      <div class="col-12">
        <div class="row" style="display: flex; align-items: center; justify-content: center;">
          <button class="sucess-btn" onclick="invoice();">Create invoice</button>


        </div>

      </div>
    <?php
    }
    ?>
  </div>
  <script src="script.js"></script>
</body>

</html>