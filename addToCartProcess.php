<?php

require "connection.php";

session_start();

$email = $_SESSION["u"]["email"];

$c = $_POST["c"];
$s = $_POST["s"];
$q = $_POST["q"];
$p = $_POST["p"];



if (!empty($c) && !empty($s) && !empty($q) && !empty($p)) {

    $cartId = 0;
    $cartQty = $q;

    $qty = Database::search("SELECT * FROM `types` WHERE `product_id`='" . $p . "' AND `color`='" . $c . "';");
    $qtyd = $qty->fetch_assoc();
    $qtyrow = $qtyd["qty"];

    $cart = Database::search("SELECT * FROM `cart` WHERE `product_id`='" . $p . "' AND `color`='" . $c . "' AND `size`='" . $s . "' AND `user_email`='" . $email . "';");
    $cartn = $cart->num_rows;


    if ($cartn >= 1) {
        $cartrs = $cart->fetch_assoc();
        $cartQty += $cartrs["qty"];
        $cartId = $cartrs["id"];
    }

    if ($q < 1) {
        echo "Please Add a Valid Quantity.";

    } elseif ($cartQty > $qtyrow) {

        echo "Please Reduce Quantity.";
        
    } elseif ($cartn >= 1) {

        Database::iud("UPDATE `cart` SET `qty`='" . $cartQty . "' WHERE `id`='" . $cartId . "';");
        echo "Product Added To the Cart.";
    } else {

        Database::iud("INSERT INTO `cart` (`product_id`,`user_email`,`qty`,`color`,`size`) VALUES ('" . $p . "','" . $email . "','" . $q . "','" . $c . "','" . $s . "') ;");

        echo "Product Added To the Cart.";
    }
} else {
    echo "Please Fill the Empty Felids.";
}
