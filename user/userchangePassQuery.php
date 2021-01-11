<?php
    session_start();
    $servername = "localhost";
$username = "root";
$password = "";
$dbname = "CedCab";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    die("Connection failed"). mysqli_connect_error();
}else{
    echo "connected<br>";
}

    if(isset($_POST['submit'])){
        $oldpass = $_POST['oldpass'];
        $newpass = $_POST['newpass'];
        $confpass = $_POST['confpass'];

        echo "$oldpass $newpass $confpass <br>";

        $user = $_SESSION['user'];
        echo $user;
        $sql = "SELECT * FROM signup WHERE email = '$user'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                $dbpass = $row['password'];
            }
        }
        
        if($oldpass == $dbpass && $newpass == $confpass){
            $upd = "UPDATE signup SET password = '$confpass' WHERE email = '$user' ";
            if (mysqli_query($conn, $upd)) {
                echo "<script>alert('Password changed successfully')</script>";
                header("refresh:0;url=userdash.php");
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        }else{
            if($newpass != $confpass){
                echo "<script>alert('Your new password and confirm password did not matched')</script>";
                header("refresh:0;url=userchangePassQuery.php");
            }
            if($oldpass != $dbpass){
                echo "<script>alert('You Entered a wrong old password')</script>";
                header("refresh:0;url=userchangePassQuery.php");
            }
           
        }
    }
?>