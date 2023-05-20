<?php

require("connection.php");

$id=$_GET["id"];


Database::iud("DELETE FROM 
`user_comment` 
WHERE `id`='".$id."' ");

echo("done");

?>