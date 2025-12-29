<?php
$array = $callclass->_get_setup_backend_settings_detail($conn, 'BK_ID001');
$fetch = json_decode($array, true);
$smtp_host = $fetch[0]['smtp_host'];
$smtp_username = $fetch[0]['smtp_username'];
$smtp_password = $fetch[0]['smtp_password'];
$smtp_port = $fetch[0]['smtp_port'];
$sender_name = $fetch[0]['sender_name'];
$support_email = $fetch[0]['support_email'];
$currentDate = date("l, d F Y");


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../config/mail/admin/PHPMailer/src/PHPMailer.php';
require '../../config/mail/admin/PHPMailer/src/SMTP.php';
require '../../config/mail/admin/PHPMailer/src/Exception.php';

$mail = new PHPMailer(true);

try {

    $mail->SMTPDebug = SMTP::DEBUG_OFF;  // Disable verbose debug output
    $mail->isSMTP();  // Set mailer to use SMTP
    $mail->Host       = $smtp_host;  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;  // Enable SMTP authentication
    $mail->Username   = $smtp_username;  // SMTP username
    $mail->Password   = $smtp_password;  // SMTP password
    $mail->SMTPSecure = 'ssl';  // Enable SSL encryption
    $mail->Port       = $smtp_port;  // TCP port to connect to

    $mail->SMTPOptions = [
    'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' =>true
        ]
    ];  
    $mail->isHTML(true);
    //// sender and replyTo
    $mail->setFrom($smtp_username, $sender_name);
    $mail->addReplyTo($support_email, $sender_name); // Reply-to address
    

   //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$send_to=$email;
$reciever_name=$fullname;	
$subject="$reciever_name Reset Password";
$message = '
    <div style="width:90%; margin:auto; height:auto;">
        <img src="cid:mail_header" width="100%">
        <div style="padding:15px; font-size:14px; color:#444;">
            <p>👋 Hi, <strong>' . $fullname . '</strong>,</p>
            <p>
                Trust this mail meets you well.<br><br>
                Kindly click on the link below to complete your reset password process.<br><br>
                <a href="' . $websiteUrl . '/admin/reset-password/?ref=' . $access_key . '" 
                   style="display:inline-block; padding:12px 20px; background-color:#0C760D; color:#ffffff; text-decoration:none; border-radius:20px; font-weight:bold; text-align:center;">
                    Click to Reset Password
                </a>
            </p>
            <p><strong>Nacos Mapoly</strong> is the official body for all computing and IT students in Nigeria, fostering innovation, collaboration, and professional development.<br/> 
            <strong>Be Inspired,</strong><br/> 
            <img src="cid:logo" width="150px" style="padding:5px; background:#fff; margin-top:10px;"></p>
        </div>
        <div style="min-height:30px;background:#333;text-align:left;color:#FFF;line-height:20px;padding:20px 10px 20px 50px;">
            &copy; All Right Reserve.<br>' . $thename . '
        </div>
    </div>';


  
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = strip_tags($message);  // Fallback for non-HTML clients
    
    /// copy this emails
    $mail->addAddress($email, $fullname);  // Recipient email and name
    $mail->addAddress($support_email, $sender_name);  // Support email
    $mail->addAddress("nacosmapoly07@gmail.com", "Nacos Mapoly");  // Additional recipient
    $mail->addAddress("afolabiabayomi83@gmail.com", "Afoo");  // Additional recipient

    // Attach images
    $mail->addEmbeddedImage('../../config/mail/admin/img/mail_header.jpg', 'mail_header');
    $mail->addEmbeddedImage('../../config/mail/admin/img/logo.png', 'logo');

    // Send the email
    if(!$mail->send()){
        echo 'Not Working';
    }

} catch (Exception $e) {
    // Handle PHPMailer exceptions
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
