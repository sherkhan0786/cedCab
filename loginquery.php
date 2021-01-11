<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "CedCab";

error_reporting(0);
    $pickup = $_SESSION['pickup'];
    $drop = $_SESSION['drop'];
    $cab = $_SESSION['cab'];
    $weight = $_SESSION['weight'];
    $distance = $_SESSION['distance'];
    $fare = $_SESSION['totalFare'];


$conn = mysqli_connect($servername, $username, $password, $dbname);

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM signup WHERE email = '$email' AND password = '$password' ";
        $query = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($query);
        $arr = mysqli_fetch_assoc($query);
        // print_r($arr);
        if($rows && $arr['blockStatus']==1){
            if($arr['isadmin'] == 1){
            echo "Login Success<br>";
            $_SESSION['user'] = $email;
            echo "Hello admin : ".$_SESSION['user'];
            header('location:admin/admindash.php');
            }else{
                $_SESSION['user'] = $email;
                echo "Hello user : ".$_SESSION['user'];

                if(isset($_SESSION['user']) && $fare != ""){
                    $sql = "INSERT INTO Ride(totalDistance, rideFrom, rideTo, luggage, cabType, totalFare, status, customerUSerId)
                    VALUES('$distance','$pickup', '$drop', '$weight', '$cab', '$fare', '0', 1)";
            
        
                    if(mysqli_query($conn, $sql)){
                        $last_id = mysqli_insert_id($conn);
                        $_SESSION['last_id'] = $last_id;
                        // header('location:login.php');
                        echo "Accepted your input to database";
                    }else{
                        echo "Error:   ". mysqli_error($conn);
                    }
                }
                // $last_id = mysqli_insert_id($conn);
                // $_SESSION['last_id'] = $last_id;
                header('location:user/userdash.php');
            }
            // header("location:show.php");
        }
        else
        {
            echo "User Name Or password is incorrect Or Signup";
        }
    }
?>