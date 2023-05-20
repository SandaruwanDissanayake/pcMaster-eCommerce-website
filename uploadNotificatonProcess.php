<?php

require("connection.php");

$head=$_POST["head"];
$notification=$_POST["notification"];

$d = new DateTime();
$tz=new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date=$d->format("Y-m-d H:i:s");

Database::iud("INSERT INTO `notification` (`body`,`head`,`date_time`) VALUES ('".$notification."','".$head."','".$date."')");

echo("done");

?>