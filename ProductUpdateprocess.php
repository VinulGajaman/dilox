<?php

session_start();

require "connection.php";

if (isset($_SESSION["a"])) {



    $title = $_POST["ti"];
    $color[] = $_POST["color"];
    $qty[] = $_POST["qty"];
    $cost = $_POST["cost"];
    $delivery = $_POST["delivery"];
    $description = $_POST["desc"];
    $imgs[] = $_FILES["image"];
    $typeid[] = $_POST["typeid"];
    $pid = $_POST["pid"];


    for ($i = 0; $i <= sizeof($typeid); $i++) {

        Database::iud("UPDATE `types` SET `qty`='" . $qty[0][$i] . "',`color`='" . $color[0][$i] . "' WHERE `id`='" . $typeid[0][$i] . "';");
    }

    Database::iud("UPDATE `product` SET `title`='" . $title . "',`price`='" . $cost . "',`delivery_fee`='" . $delivery . "',`description`='" . $description . "' WHERE `id`='" . $pid . "';");


    // if (!empty($category) && !empty($title) && !empty($size) && !empty($color) && !empty($qty) && !empty($cost) && !empty($delivery) && !empty($description) && !empty($imgs)) {
    //     echo "s2";
    // 

    //     foreach ($_FILES['image']['tmp_name'] as $key => $image) {

    //         $file_extension = $_FILES['image']['type'][$key];
    //         if (!in_array($file_extension, $allowed_image_extenstion)) {

    //             header('location:addProduct.php?image=error');
    //             exit();
    //         }
    //     }

    //    

    //    

    //    $last_id = Database::$connection->insert_id;

    // if (isset($_POST["img"])) {
    //     $imgs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pid . "';");

    //     while ($imgdata = $imgs->fetch_assoc()) {
    //         $oldimg = $_POST["img"];
    //         for ($i = 0; $i < sizeof($oldimg); $i++) {
    //             if ($imgdata['code'] == $oldimg[$i]) {
    //                 break;
    //             }
    //             if ($i == sizeof($oldimg) - 1) {
    //                 echo "DELETE FROM `images` WHERE `code`='" . $oldimg[$i] . "';";
    //                 Database::iud("DELETE FROM `images` WHERE `code`='" . $oldimg[$i] . "';");

    //             }
    //             echo "123";
    //         }
    //     }
    // }



    

    //         for ($i = 0; $i <= sizeof($size); $i++) {


    //             Database::iud("INSERT INTO `types`(`product_id`,`color`,`qty`,`size`) VALUES ('" . $last_id . "','" . $color[0][$i] . "','" . $qty[0][$i] . "','" . $size[0][$i] . "')");
    //         }


     header('location:updateProduct.php?inserted=true&id='.$pid);
    exit();
        // } else {
        //     header('location:adminSignin.php?login=false');
        
        // }
} else {
    header('location:adminSignin.php?login=false');
}
