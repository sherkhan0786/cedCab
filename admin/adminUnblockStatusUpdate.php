<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "CedCab";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$userId = $_GET['unblock'];

// $last_id = $_SESSION['last_id'];
// $user = $_SESSION["user_id"];
$sql = "UPDATE signup SET blockStatus=1 WHERE id = '$userId' ";
if (mysqli_query($conn, $sql)) {
    echo "Updated";
    header('location:allUsers.php');
    } 
    else {
    echo "Error" . mysqli_error($conn);
    }
?>