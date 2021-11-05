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

        $i = 0;

        $status = 0;
        $name = "";
        $clr ="";
        $size="";

        while ($cartdata = $cart->fetch_assoc()) {

            $productrs = Database::search("SELECT * FROM `product` WHERE `id`='" . $cartdata["product_id"] . "' ;");
            $pr = $productrs->fetch_assoc();

            $types = Database::search("SELECT * FROM `types` WHERE `product_id`='" . $pr["id"] . "' AND `color`='" . $cartdata["color"] . "' AND `size`='" . $cartdata["size"] . "';");
            $typers = $types->fetch_assoc();

            if ($typers["qty"] < $cartdata["qty"]) {

                $status = 1;
                $name = $pr["title"];
                $clr = $typers["color"];
                $size = $typers["size"];
            }

            if ($i == 0) {
                $i = 1;
                $delivery_fee = $pr["delivery_fee"];
            } else {

                $delivery_fee += $pr["delivery_fee"] / 2;
            }



            $total += $pr["price"] * $cartdata["qty"];
        }


        $amount = $total + $delivery_fee;

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
        $array["status"] = $status;
        $array["title"] = $name;
        $array["color"]=$clr;
        $array["size"]=$size;

        echo json_encode($array);
    } else {

        echo "Please Update Your Profile";
    }
}
