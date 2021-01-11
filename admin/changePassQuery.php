<?php 
    if(isset($_POST['submit'])){
        $oldpass = $_POST['oldpass'];
        $newpass = $_POST['newpass'];
        $confpass = $_POST['confpass'];

        echo "$oldpass $newpass $confpass";

    }
?>