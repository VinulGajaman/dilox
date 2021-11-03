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

$recentrs = Database::search("SELECT * FROM `recent` WHERE `product_id`='".$pid."' AND `user_email`='".$mail."' ;");
    $rn = $recentrs->num_rows;

    if($rn==1){

        Database::iud("DELETE FROM `watchlist` WHERE `product_id`='".$id."';");
        echo "success";

    }else{

        Database::iud("INSERT INTO `recent` (`product_id`,`user_email`) VALUES ('".$pid."','".$mail."') ;");
        Database::iud("DELETE FROM `watchlist` WHERE `product_id`='".$id."';");

        echo "success";


    }

?>