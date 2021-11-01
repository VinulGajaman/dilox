<?php
session_start();

require "connection.php";

$vc = $_GET["v"];
$e = $_GET["e"];

if (empty($vc)) {

    echo "Please enter the verification code";
} else {

    $rs = Database::search("SELECT * FROM `admin` WHERE `email`='" . $e . "' AND `verification`='" . $vc . "';");
    

    if ($rs->num_rows == 1) {
        
        $rd = $rs->fetch_assoc();
        $_SESSION["a"] = $rd;
        echo "success";
    } else {
        echo "Please Enter the Correct Verification Code";
    }
}
