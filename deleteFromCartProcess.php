<?php

session_start();

require "connection.php";

$cid = $_GET["id"];



if (isset($_SESSION["u"])) {

   
    $cid = $_GET["id"];
   

    Database::iud("DELETE FROM `cart` WHERE `id`='" . $cid . "';");

    echo "success";
}
