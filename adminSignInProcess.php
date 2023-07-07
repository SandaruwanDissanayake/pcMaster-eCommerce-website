<?php

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if (empty($_POST["e"])) {
    echo ("Pleace Enter Your Email Address");
} else if (empty($_POST["i"])) {
    echo ("pleace Enter Your Admin Number");
} else {
    $email = $_POST["e"];
    $admin_number = $_POST["i"];

    $admin_data = Database::search("SELECT * FROM user WHERE `email`='" . $email . "' AND `admin_reg_num`='" . $admin_number . "'");
    $admin_num = $admin_data->num_rows;

    if ($admin_num == 1) {
        // echo ("sucsess");
        $code = uniqid();

        Database::iud("UPDATE user SET `verification_code`='" . $code . "' 
        WHERE `email`='" . $email . "' AND `admin_reg_num`='" . $admin_number . "'");

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'sandaruwandissanayake9@gmail.com';
        $mail->Password = '************';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('sandaruwandissanayake9@gmail.com', 'Reset Password');
        $mail->addReplyTo('sandaruwandissanayake9@gmail.com', 'Reset Password');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'PC LAB Admin Verification Code';
        $bodyContent = '<h1 style="color:green"> Your Verification code is ' . $code . '</h1>';
        $mail->Body    = $bodyContent;
        if (!$mail->send()) {
            echo 'verification code sending failed';
        } else {


            echo 'success';
        }
    } else {
        echo ("Invalid your Email Or Admin Number Pleace Check And try again");
    }
}
