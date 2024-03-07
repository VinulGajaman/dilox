<?php

session_start();

require "connection.php";

if (isset($_SESSION["u"])) {

    $mail = $_SESSION["u"]["email"];

    $id = $_POST["i"];
    $txt = $_POST["ft"];
    $rate = $_POST["r"];

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    if (empty($txt)) {

        echo "Please Enter a Feedback.";
    }elseif(empty($rate)){

        echo "Please add a Rate.";
    
    } else {

        Database::iud("INSERT INTO `feedback` (`user_email`,`product_id`,`feed`,`rate`,`date`) VALUES ('" . $mail . "','" . $id . "','" . $txt . "','" . $rate . "','" . $date . "') ;");

        echo "1";
    }
}
