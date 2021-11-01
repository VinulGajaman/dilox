<?php
session_start();

require "connection.php";

if (isset($_SESSION["u"])) {

    $fname = $_POST["f"];
    $lname = $_POST["l"];
    $mobile = $_POST["m"];
    $line1 = $_POST["a1"];
    $line2 = $_POST["a2"];
    $city = $_POST["c"];
    $province = $_POST["pro"];
    $district = $_POST["di"];
    $postal_code = $_POST["pc"];


    if (isset($_FILES["i"])) {
        $image = $_FILES["i"];
    } else {
    }
    // validate
    if (empty($fname)) {
        echo "Please Enter Your First Name";
    } elseif (empty($lname)) {
        echo "Please Enter Your Last Name";
    } else if (empty($mobile)) {
        echo "Please Enter Your Mobile Number";
    } else if (strlen($mobile) != 10) {
        echo "Please enter 10 digit mobile number";
    } else if (preg_match("/07[0,1,2,4,5,6,7,8][0-9]+/", $mobile) == 0) {
        echo "Invalid mobile number";
    } else  if (empty($postal_code)) {
        echo "Please Enter Your Postal Code";
    } else {



        Database::iud("UPDATE `user` SET 
    `fname`='" . $fname . "',
    `lname`='" . $lname . "',
    `mobile`='" . $mobile . "'
     WHERE `email`='" . $_SESSION["u"]["email"] . "' ");

        echo "|| User details Updated";

        $addressrs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $_SESSION["u"]["email"] . "' ");
        $nr = $addressrs->num_rows;

        if ($nr == 1) {
            $nd = $addressrs->fetch_assoc();
            //update
            $ucity = Database::search("SELECT * FROM district INNER JOIN province ON province.id = district.province_id 
                   WHERE district.id ='" . $district . "' AND province.id ='" . $province . "'");
            if ($ucity->num_rows == 1) {

                $cityrs = Database::search("SELECT * FROM `city` WHERE `name`='" . $city . "';");
                $cn = $cityrs->num_rows;

                if ($cn == 1) {
                    $cd = $cityrs->fetch_assoc();

                    Database::iud("UPDATE `city` SET `postal_code`='" . $postal_code . "',`district_id`='" . $district . "' WHERE city.id ='" .  $cd["id"]  . "'");
                    Database::iud("UPDATE `user_has_address` SET `line1`='" . $line1 . "',`line2`='" . $line2 . "',`city_id`='" . $cd["id"] . "' WHERE user_has_address.user_email='" . $_SESSION["u"]["email"] . "'");
                } else {

                    Database::iud("INSERT INTO `city` (`name`,`district_id`,`postal_code`) VALUES ('" . $city . "','" . $district . "','" . $postal_code . "') ;");
                    $citynew = Database::search("SELECT * FROM `city` WHERE `name`='" . $city . "';");
                    $newd = $citynew->fetch_assoc();
                    Database::iud("UPDATE `user_has_address` SET `line1`='" . $line1 . "',`line2`='" . $line2 . "',`city_id`='" . $newd["id"] . "' WHERE user_has_address.user_email='" . $_SESSION["u"]["email"] . "'");
                }

                echo " || Address Successfuly updated";
            } else {
                echo " || Invalid Address , Please Try Again";
            }
        } else {

            $location = Database::search("SELECT * FROM district 
            INNER JOIN province ON province.id=district.province_id
            WHERE district.id='" . $district . "' AND province.id='" . $province . "' ; ");
            if ($location->num_rows == 1) {
                $unr =  $location->fetch_assoc();

                Database::iud("INSERT INTO `city` (`name`,`district_id`,`postal_code`) VALUES 
                ('" . $city . "','" . $district . "','" . $postal_code . "') ");

                $city = Database::search("SELECT * FROM `city` WHERE `name`='" . $city . "';");
                $cd = $city->fetch_assoc();

                Database::iud("INSERT INTO `user_has_address` (`user_email`,`line1`,`line2`,`city_id`) VALUES 
        ('" . $_SESSION["u"]["email"] . "','" . $line1 . "','" . $line1 . "','" . $cd["id"] . "') ");



                echo "|| New Address Added";
            } else {
                echo "|| Invalid Address Please Try Again";
            }
        }
        $last_email = $_SESSION["u"]["email"];



        if (isset($_FILES["i"])) {
            $allowed_image_extention = array("image/jpeg", "image/jpg", "image/png", "image/svg");
            $file_extention = $image["type"];

            if (!in_array($file_extention, $allowed_image_extention)) {
                echo "|| Please Select a valid image.";
            } else {
                // echo $imageFile["name"];

                $newimgextention;
                if ($file_extention = "image/jpeg") {
                    $newimgextention = ".jpeg";
                } elseif ($file_extention = "image/jpg") {
                    $newimgextention = ".jpg";
                } elseif ($file_extention = "image/png") {
                    $newimgextention = ".png";
                } elseif ($file_extention = "image/svg") {
                    $newimgextention = ".svg";
                }

                $filename = "resourses//profile_img//" . uniqid() . $newimgextention;

                move_uploaded_file($image["tmp_name"], $filename);
                $resultProfileImg = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $_SESSION["u"]["email"] . "'  ");
                $pror = $resultProfileImg->num_rows;

                if ($pror == 1) {


                    Database::iud("UPDATE `profile_img` SET `code`='" . $filename . "' WHERE `user_email`='" . $_SESSION["u"]["email"] . "'  ");

                    echo "|| Image Updated Successfully.";
                } else {
                    Database::iud("INSERT INTO `profile_img` (`code`,`user_email`) VALUES ('" . $filename . "','" . $last_email . "') ;");
                }
            }
        }
    }
} else {
    echo "invalid User";
}
