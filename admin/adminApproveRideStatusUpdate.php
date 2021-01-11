<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "CedCab";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$userId = $_GET['userId'];

// $last_id = $_SESSION['last_id'];
// $user = $_SESSION["user_id"];
$sql = "UPDATE Ride SET status=2 WHERE rideId = '$userId' ";
if (mysqli_query($conn, $sql)) {
    echo "Updated";
    header('location:adminRideRequest.php');
    } 
    else {
    echo "Error" . mysqli_error($conn);
    }
?>