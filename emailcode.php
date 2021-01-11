<?php 
session_start();

$digits = 4;
$rand =  rand(pow(10, $digits-1), pow(10, $digits)-1);

$_SESSION['Emailsess'] = $rand;

use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['email'])){
    $email = $_POST['email'];
    $_SESSION['uEmail'] = $email;

    require 'vendor/autoload.php'; 

    $mail = new PHPMailer(true); 

    try { 
        // $mail->SMTPDebug = 2;									 
        $mail->isSMTP();											 
        $mail->Host	 = 'smtp.gmail.com;';					 
        $mail->SMTPAuth = true;							 
        $mail->Username = 'sheruk7898@gmail.com';				 
        $mail->Password = 'sher@khan123';						 
        $mail->SMTPSecure = 'tls';							 
        $mail->Port	 = 587; 

        $mail->setFrom('sheruk7898@gmail.com', 'sher khan');		 
        // $mail->addAddress('sherk7898@gmail.com'); 
        $mail->addAddress($email); 
        
        $mail->isHTML(true);								 
        $mail->Subject = 'OTP';//("$email($subject)");
        $mail->Body = $rand;
        $mail->AltBody = 'Body in plain text for non-HTML mail clients'; 
        $mail->send(); 
        echo "Mail has been sent successfully!"; 
    } catch (Exception $e) { 
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; 
    } 


}


?> 
