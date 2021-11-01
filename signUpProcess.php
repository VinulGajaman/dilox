<?php

require "connection.php";

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$password = $_POST["password"];
$mobile = $_POST["mobile"];
$gender = $_POST["gender"];
$status = 1;

if (empty($fname)) {

    echo "Please Enter Your First Name";
} else if (strlen(($fname)) > 50) {

    echo "First Name must be less than 50 characters";
} else if (empty($lname)) {

    echo "Please Enter Your Last Name";
} else if (strlen(($lname)) > 50) {

    echo "Last Name must be less than 50 characters";
} else if (empty($email)) {

    echo "Please Enter Your Email";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    echo "Invalid Email Address";
} else if (strlen(($email)) > 100) {

    echo "Email must be less than 100 chracters";
} else if (empty($password)) {

    echo "Please Enter Your Password";
} else if (strlen(($password)) < 5 || strlen($password) > 20) {

    echo "Password length must between 5 to 20";
} else if (empty($mobile)) {

    echo "Please Enter Your mobile";

} else if (strlen($mobile) != 10) {

    echo "Please enter 10 digit mobile number";

} else if (preg_match("/07[0,1,2,4,5,6,7,8][0-9]+/",$mobile) == 0) {

    echo "Invalid mobile number";

} else {

    $r = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' OR `mobile` = '".$mobile."';");

    if ($r->num_rows > 0) {
        echo "User with the same email address or mobile already exsist";
    } else {

        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");

        Database::iud("INSERT INTO  `user` (`email`,`fname`,`lname`,`password`,`mobile`,`register_date`,`gender_id`,`status_id`) VALUES ('" . $email . "','" . $fname . "','" . $lname . "','" . $password . "','" . $mobile . "','" . $date . "','" . $gender . "','" . $status . "');");
        echo "success";
    }
}

?>
