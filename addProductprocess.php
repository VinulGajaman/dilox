<?php

session_start();

require "connection.php";

if (isset($_SESSION["a"])) {


    $category = $_POST["ca"];
    $title = $_POST["ti"];
    $size[] = $_POST["size"];
    $color[] = $_POST["color"];
    $qty[] = $_POST["qty"];
    $cost = $_POST["cost"];
    $delivery = $_POST["delivery"];
    $description = $_POST["desc"];
    $imgs[] = $_FILES["image"];

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    $status = 1;



    if (!empty($category) && !empty($title) && !empty($size) && !empty($color) && !empty($qty) && !empty($cost) && !empty($delivery) && !empty($description) && !empty($imgs)) {
        echo "s2";
        $allowed_image_extenstion = array("image/jpeg", "image/jpg", "image/png", "image/svg");

        foreach ($_FILES['image']['tmp_name'] as $key => $image) {

            $file_extension = $_FILES['image']['type'][$key];
            if (!in_array($file_extension, $allowed_image_extenstion)) {

                header('location:addProduct.php?image=error');
                exit();
            }
        }

        for ($i = 0; $i <= sizeof($qty); $i++) {


            if ($qty[0][$i] < 0) {
                header('location:addProduct.php?inserted=false');
                exit();
            }
        }


        Database::iud("INSERT INTO `product` (`category_id`, `title`, `price`, `delivery_fee`, `description`, `status_id`, `datetime_added`) VALUES  ('" . $category . "','" . $title . "','" . $cost . "','" . $delivery . "','" . $description . "','" . $status . "','" . $date . "');");

        $last_id = Database::$connection->insert_id;






        foreach ($_FILES['image']['tmp_name'] as $key => $image) {


            $newimageextension;
            if ($file_extension = "image/jpeg") {
                $newimageextension = ".jpeg";
            } else if ($file_extension = "image/jpg") {
                $newimageextension = ".jpg";
            } else if ($file_extension = "image/svg") {
                $newimageextension = ".svg";
            } else if ($file_extension = "image/png") {
                $newimageextension = ".png";
            }

            $fileName = "resourses//product//" . uniqid() . $newimageextension;

            move_uploaded_file($_FILES['image']['tmp_name'][$key], $fileName);

            Database::iud("INSERT INTO `images`(`code`,`product_id`) VALUES ('" . $fileName . "','" . $last_id . "');");

            echo "Image Saved Successfully.";
        }

        for ($i = 0; $i <= sizeof($size); $i++) {

            //2D Array
            Database::iud("INSERT INTO `types`(`product_id`,`color`,`qty`,`size`) VALUES ('" . $last_id . "','" . $color[0][$i] . "','" . $qty[0][$i] . "','" . $size[0][$i] . "')");
        }


        header('location:addProduct.php?inserted=true');
        exit();
    } else {
        header('location:addProduct.php?inserted=false');
    }
} else {
    header('location:adminSignin.php?login=false');
}
