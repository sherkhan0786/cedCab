<?php session_start(); ?>

<?php include 'adminheader.php' ?>

<div class=''>
        <div class='row'>
            <div class='col-sm-2'>
                <?php include 'adminSideBar.php'; ?>
            </div>

        <!-- Table -->
        <div class='col-md-10 col-sm-10'>
                <div class="card bg-warning text-dark text-center">
                    <div class="card-body">
                        <span class="card-text"><?php echo $_SESSION['compRide']; ?></span><br>
                        <span class="card-text">Your Completed Rides</span><br>
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
                    <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "CedCab";
                            
                            $conn = mysqli_connect($servername, $username, $password, $dbname);
                            
                            if(!$conn){
                                die("Connection failed"). mysqli_connect_error();
                            }
                            // $user = $_SESSION['user'];
                            $count = 0;
                            $totalEarn = 0;
                            $sql = "SELECT * FROM `Ride` WHERE STATUS = 2";
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
                                    $totalEarn += $totalFare;
                                    $count++;
                                    // echo $totalEarn;
                                    $_SESSION['compRide'] = $count;
                                    $_SESSION['totalEarn'] = $totalEarn;
                                    echo "<tr>
                                    <td>$from</td>
                                    <td>$to</td>
                                    <td>$dist</td>
                                    <td>$rideDate</td>
                                    <td>$luggage</td>
                                    <td>$cabType<td>
                                    <td>$totalFare<td>
                                    </tr>";
                                }
                            }
                        ?>
                        
                    </tbody>
                    </table>
        </div>
    </div>
</div>
<?php include 'adminfooter.php' ?>