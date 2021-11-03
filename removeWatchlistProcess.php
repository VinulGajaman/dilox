<?php

require "connection.php";

$id = $_GET["id"];

$watchrs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='".$id."' ;");
$watchrow = $watchrs->fetch_assoc();

$pid = $watchrow["product_id"];
$mail = $watchrow["user_email"];

// Database::iud("INSERT INTO `recent` (`product_id`,`user_email`) VALUES ('".$pid."','".$mail."') ;");

// echo "PRODUCT ADDED TO THE RECENTS.";

// Database::iud("DELETE FROM `watchlist` WHERE `product_id`='".$id."';");

// echo "success";



        Database::iud("DELETE FROM `watchlist` WHERE `product_id`='".$id."';");
        echo "success";

  
?>