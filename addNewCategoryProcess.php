<?php

session_start();

require "connection.php";

if (isset($_SESSION["a"])) {

    $txt = $_GET["t"];


    if (empty($txt)) {
        echo "You Must Enter a Category";
    } else {
        $categoryrs = Database::search("SELECT * FROM `category` WHERE `name` LIKE '%" . $txt . "%';");
        $n = $categoryrs->num_rows;

        if($n>=1){
            echo "The Category Already Exists.";
        }else{

            Database::iud("INSERT INTO `category` (`name`) VALUES ('".$txt."');");

            echo "success";
        }
    }
}
