<?php

require "connection.php";

require 'Exception.php'; 
require 'PHPMailer.php'; 
require 'SMTP.php'; 

use PHPMailer\PHPMailer\PHPMailer; 

if (isset($_GET["e"])) {

    $e = $_GET["e"];

    if (empty($e)) {
        echo "Please enter your email address";
    } else {

        $rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $e . "';");

        if ($rs->num_rows == 1) {
            $code = uniqid();
            Database::iud("UPDATE `user` SET `verification_code`='" . $code . "' WHERE `email`='" . $e . "';");


            //  email code

            $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'vinulgajaman2001@gmail.com';
            $mail->Password = '#GMAILGAJAMAN#*12345*';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('vinulgajaman2001@gmail.com', 'Dilox');
            $mail->addReplyTo('vinulgajaman2001@gmail.com', 'Dilox');
            $mail->addAddress($e);
            $mail->isHTML(true);
            $mail->Subject = 'Dilox Forgot Password Verfication Code';
            $bodyContent = '<h1 style="color:red;">Your Verfication Code : '. $code . '</h1>';
            $mail->Body    = $bodyContent;

            //  email code

            if (!$mail->send()) {
                echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo "1";
            }
        } else {
            echo "Email address not found";
        }
    }
} else {
    echo "Please enter your email address";
}
