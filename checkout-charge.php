<?php
    include("./config.php");

    $token = $_POST["stripeToken"];
    $pid = $_POST["pid"];
    $token_card_type = $_POST["stripeTokenType"];
    $phone           = $_POST["phone"];
    $email           = $_POST["stripeEmail"];
    $qty         = $_POST["qty"];
    $amount          = $_POST["amount"]; 
    $desc            = $_POST["product_name"];
    

echo ($address);
echo ($amount);


    $charge = \Stripe\Charge::create([
      "amount" => str_replace(",","",$amount) * 100,
      "currency" => 'inr',
      "description"=>$desc,
      "source"=> $token,
    ]);

$PHP_Obj = new stdClass();

// $PHP_Obj->amount = $amount;
// $PHP_Obj->token=$token;
// $PHP_Obj->phone=$phone;
$PHP_Obj->qty=$qty;
// $PHP_Obj->desc=$desc;
$PHP_Obj->pid=$pid;
// $PHP_Obj->token_card_type=$token_card_type;



$json = json_encode($PHP_Obj);

    if($charge){
      header("Location:success.php?json=$json");
      

    }
?>