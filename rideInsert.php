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
        echo "Connected<br>";
    }


    $pickup = $_SESSION['pickup'];
    $drop = $_SESSION['drop'];
    $cab = $_SESSION['cab'];
    $weight = $_SESSION['weight'];
    $distance = $_SESSION['distance'];
    $fare = $_SESSION['totalFare'];

    // echo "$pickup $drop $cab $weight $fare"."<br>";
$user = $_SESSION['user'];
    if(isset($_SESSION['user'])){
        $sql = "INSERT INTO Ride(totalDistance, rideFrom, rideTo, luggage, cabType, totalFare, status, customerUSerId, userId)
        VALUES('$distance','$pickup', '$drop', '$weight', '$cab', '$fare', 1, 1,'$user')";


        if(mysqli_query($conn, $sql)){
            $last_id = mysqli_insert_id($conn);
            $_SESSION['last_id'] = $last_id;
            // header('location:login.php');
            echo "Accepted your input to database";
            header("location:user/userdash.php");
        }else{
            echo "Error:   ". mysqli_error($conn);
        }
    }
    else{
        // $last_id = mysqli_insert_id($conn);
        // $_SESSION['last_id'] = $last_id;
        header("location:login.php");
    }
?>