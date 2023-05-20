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
        $mail->Password = 'nghdvvkmfgayduhd';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('sandaruwandissanayake9@gmail.com', 'Reset Password');
        $mail->addReplyTo('sandaruwandissanayake9@gmail.com', 'Reset Password');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'PC LAB Admin Verification Code';
        $bodyContent = '
            
            <div 
            style="
            background-color: #ccc; 
             width:100%; 
             height: 300px; 
             display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 20px;
             
             ">
             <div 
             style="
             margin-top: 25px;
             margin-left: 20%;
             margin-right: 20%;

             "
             >
             <h1 style="
             margin-top: 50px;
             margin-left: 40%;
             "> Pc Master</h1>
           
             <h3>The term business refers to an organization or enterprising entity engaged in commercial, industrial, or professional activities. The purpose of a business is to organize some sort of economic production (of goods or services). Businesses can be for-profit entities or non-profit organizations fulfilling </h3>
           
            <h2>Your Verification Code : <span style=" color: #0D7377;" font-size: 30px;  font-weight: bold;>'.$code.'</span></h2>
             </div>
             
            </div>
           
            </div>
        ';
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
