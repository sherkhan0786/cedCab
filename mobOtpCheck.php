<?php
session_start();
if(isset($_POST['verifyotp'])){
    $mobvarr = $_SESSION['mobsess'];
    $verify = $_POST['verify'];

    if($verify == $mobvarr){
        echo "Congo Your OTP Matched";
        header("location:signup.php");
    }else{
        echo "You Entered wrong OTP";
    }
}
?>