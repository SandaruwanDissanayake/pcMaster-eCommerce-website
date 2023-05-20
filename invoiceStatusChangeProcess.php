<?php

require("connection.php");

$pid=$_POST["pid"];
$status=$_POST["status"];

Database::iud("UPDATE `invoice` SET `status`='".$status."' WHERE `id`='".$pid."'");

echo("done");


?>