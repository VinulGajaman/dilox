<?php

require "connection.php";

session_start();

$email = $_SESSION["u"]["email"];

$c = $_POST["c"];
$s = $_POST["s"];
$q = $_POST["q"];
$p = $_POST["p"];

if(!empty($c) && !empty($s) && !empty($q) && !empty($p)){
    
Database::iud("INSERT INTO `cart` (`product_id`,`user_email`,`qty`,`color`,`size`) VALUES ('".$p."','".$email."','".$q."','".$c."','".$s."') ;");


}

?>