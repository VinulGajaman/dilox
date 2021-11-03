<?php

session_start();

require "connection.php";

if (isset($_SESSION["u"])) {

    $email = $_SESSION["u"]["email"];

    $oid = $_POST["id"];
    $delivery = $_POST["d"];
    $amount = $_POST["a"];

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    Database::iud("INSERT INTO `invoice` (`order_id`,`user_email`,`date`,`total_delivery`,`total`) 
    VALUES ('" . $oid . "','" . $email . "','" . $date . "','" . $delivery . "','" . $amount . "') ;");


    $invoice = Database::search("SELECT * FROM `invoice` WHERE `order_id`='" . $oid . "';");
    $invoiceData = $invoice->fetch_assoc();
    $inId = $invoiceData["id"];

    $cart = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $email . "';");


    while ($cartdata = $cart->fetch_assoc()) {

        $productrs = Database::search("SELECT * FROM `product` WHERE `id`='" . $cartdata["product_id"] . "' ;");
        $pr = $productrs->fetch_assoc();

        $type = Database::search("SELECT * FROM `types` WHERE `product_id`='" . $pr["id"] . "' AND `size`='" . $cartdata["size"] . "' AND `color`= '" . $cartdata["color"] . "';");
        $typeData = $type->fetch_assoc();

        $newQty = $typeData["qty"] - $cartdata["qty"];

        Database::iud("INSERT INTO `invoice_item` (`product_id`,`invoice_id`,`qty`,`delivery_fee`,`unit_price`) VALUES 
        ('" . $pr["id"] . "','" . $inId . "','" . $cartdata["qty"] . "','" . $pr["delivery_fee"] . "','" . $pr["price"] . "') ;");

        Database::iud("UPDATE `types` SET `qty`='" . $newQty . "' WHERE `id`='" . $typeData["id"] . "' ;");


        Database::iud("DELETE FROM `cart` WHERE `id`='" . $cartdata["id"] . "';");
    }


    echo "Payment Success";
}
