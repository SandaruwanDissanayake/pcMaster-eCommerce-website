<?php

session_start();

if(isset($_SESSION["au"])){

    $_SESSION["u"]=null;

    session_destroy();

    echo("success");
}

?>