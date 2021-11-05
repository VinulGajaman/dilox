<?php

session_start();

require "connection.php";



if (isset($_SESSION["u"])) {

    $email = $_SESSION["u"]["email"];
    $id = $_POST["i"];

    $cartrs = Database::iud("DELETE FROM `invoice_item` WHERE `product_id`='".$id."' ;");
  
    echo "1";
    
}



?>


