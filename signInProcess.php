<?php

session_start();

require "connection.php";

$email = $_POST["email"];
$password = $_POST["password"];
$r = $_POST["remember"];


$rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' AND `password`='" . $password . "';");
$n = $rs->num_rows;

//sign in success

if ($n == 1) {

    $d = $rs->fetch_assoc();
    $status = $d["status_id"];
    if ($status == "2") {
        echo "You Have been Blocked.";
    } else {
        echo "1";
        $_SESSION["u"] = $d;
    }
    //remember me true

    if ($r == "true") {
        setcookie("e", $email, time() + (60 * 60 * 24 * 365));
        setcookie("p", $password, time() + (60 * 60 * 24 * 365));

        //remember me false
    } else {
        setcookie("e", "", -1);
        setcookie("p", "", -1);
    }
} else {
    echo "Invalid Details";
}
