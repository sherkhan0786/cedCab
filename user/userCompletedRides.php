<?php session_start(); ?>


<?php
    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $dbname = "CedCab";
    
    // $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    // if(!$conn){
    //     die("Connection failed"). mysqli_connect_error();
    // }else{
    //     echo "Connected<br>";
    // }

    // $sql = "SELECT * FROM `Ride`";
    // $result = mysqli_query($conn, $sql);
    // if(mysqli_num_rows($result)>0){
    //     while($row = mysqli_fetch_assoc($result)){
    //         $from =  $row["rideFrom"];
    //         $to = $row["rideTo"];
    //         $dist = $row["totalDistance"];
    //         $rideDate = $row["rideDate"];
    //         $luggage = $row["luggage"];
    //         $cabType = $row["cabType"];
    //         $totalFare = $row["totalFare"];
    //         echo "$from $to $dist";
    //     }
    // }
?>

<?php include 'userheader.php' ?>

<div class=''>
        <div class='row'>
            <div class='col-sm-2'>
                <?php include 'userSideBar.php'; ?>
            </div>

        <!-- Table -->
        <div class='col-md-10 col-sm-10'>
                <div class="card bg-warning text-dark text-center">
                    <div class="card-body">
                        <span class="card-text"><?php if(isset($_SESSION['compCount'])){ echo $_SESSION['compCount'];}?></span><br>
                        <span class="card-text">Your All Rides</span><br>
                        <a href="" class="card-link text-light">→</a>
                    </div>
                </div>

                <table class="table table-striped table-warning">
                    <thead>
                    <tr>
                        <th scope="col">Pickup</th>
                        <th scope="col">Drop</th>
                        <th scope="col">Distance</th>
                        <th scope="col">Date</th>
                        <th scope="col">Luggage</th>
                        <th scope="col">Cab Type</th>
                        <th scope="col"></th>
                        <th scope="col">Fare</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr> -->
                        <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "CedCab";
                            
                            $conn = mysqli_connect($servername, $username, $password, $dbname);
                            
                            if(!$conn){
                                die("Connection failed"). mysqli_connect_error();
                            }
                            $user = $_SESSION['user'];
                            
                            $expCount = 0;
                            $count = 0;
                            $sql = "SELECT * FROM `Ride` WHERE userId = '$user' AND status = 2";
                            $result = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($result)>0){
                                while($row = mysqli_fetch_assoc($result)){
                                    $from =  $row["rideFrom"];
                                    $to = $row["rideTo"];
                                    $dist = $row["totalDistance"];
                                    $rideDate = $row["rideDate"];
                                    $luggage = $row["luggage"];
                                    $cabType = $row["cabType"];
                                    $totalFare = $row["totalFare"];
                                    $count++;
                                    $expCount += $totalFare;
                                    $_SESSION['compCount'] = $count;
                                    $_SESSION['expCount'] = $expCount;
                                    echo "<tr>
                                    <td>$from</td>
                                    <td>$to</td>
                                    <td>$dist</td>
                                    <td>$rideDate</td>
                                    <td>$luggage</td>
                                    <td>$cabType<td>
                                    <td>$totalFare<td></tr>";
                                }
                            }
                        ?>
                        
                    </tbody>
                    </table>
        </div>
    </div>
</div>
<?php include 'userfooter.php' ?>


