<?php
session_start();
if(isset($_POST['verifyotp'])){
    $emailvarr = $_SESSION['Emailsess'];
    $verify = $_POST['verify'];
    

    if($verify == $emailvarr){
        echo "Congo Your OTP Matched";
        header("location:mobVerify.php");
    }else{
        echo "You Entered wrong OTP";
    }
}
?>