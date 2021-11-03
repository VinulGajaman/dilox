<?php

session_start();

require "connection.php";

if (isset($_SESSION["u"])) {


    $email = $_SESSION["u"]["email"];

    $array;

    $orderId = uniqid();





    $addressrs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email` = '" . $email . "' ;");
    $cn = $addressrs->num_rows;

    if ($cn == 1) {

        $total = 0;
        $delivery_fee = 0;

        $cr = $addressrs->fetch_assoc();

        $cityId = $cr["city_id"];

        $cityName = Database::search("SELECT * FROM `city` WHERE `id`='" . $cityId . "';");
        $namedata = $cityName->fetch_assoc();

        $city = $namedata["name"];

        $add = $cr["line1"] . " " . $cr["line2"];

        $cart = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $email . "';");


        while ($cartdata = $cart->fetch_assoc()) {

            $productrs = Database::search("SELECT * FROM `product` WHERE `id`='" . $cartdata["product_id"] . "' ;");
            $pr = $productrs->fetch_assoc();

            $delivery_fee += $pr["delivery_fee"];

            $total += $pr["price"] * $cartdata["qty"] + $pr["delivery_fee"];
        }


        $amount = $total;

        $fname = $_SESSION["u"]["fname"];
        $lname = $_SESSION["u"]["lname"];
        $mobile = $_SESSION["u"]["mobile"];
        $address = $add;

        $array["delivery_fee"] = $delivery_fee;
        $array["id"] = $orderId;
        $array["item"] = $orderId;
        $array["amount"] = $amount;
        $array["fname"] = $fname;
        $array["lname"] = $lname;
        $array["email"] = $email;
        $array["mobile"] = $mobile;
        $array["address"] = $address;
        $array["city"] = $city;

        echo json_encode($array);
    } else {

        echo "2";
    }
} else {

    echo "1";
}
