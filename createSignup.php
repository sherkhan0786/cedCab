<?php include 'header.php' ?>

<?php
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


if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    

    $sql = "INSERT INTO signup(name, email, mobile, password, isadmin, blockStatus)
    VALUES('$name', '$email', '$mobile', '$password', '0', 1)";


    if(mysqli_query($conn, $sql)){
         header('location:login.php');
        echo "Accepted your input to database";
    }else{
        echo "Failed to signup Email Already used ". mysqli_error($conn);
    }
}

?>


<?php include 'footer.php' ?>