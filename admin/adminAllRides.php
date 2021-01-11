<?php session_start(); ?>

<?php include 'adminheader.php' ?>

<div class=''>
        <div class='row'>
            <div class='col-sm-2'>
            <ul class="nav flex-column pb-5 sbar">
                <li class="nav-item sbaritem">
                    <a class="nav-link active" aria-current="page" href="#">HOME</a>
                </li>
                <li class="nav-item sbaritem">
                    <a class="nav-link" href="#">UPDATE PROFILE</a>
                </li>
                <li class="nav-item sbaritem">
                    <a class="nav-link" href="#">UPDATE NEWS</a>
                </li>
                <li class="nav-item sbaritem">
                    <a class="nav-link" href="#" tabindex="-1">UPDATE NOTICE</a>
                </li>
                <li class="nav-item sbaritem">
                    <a class="nav-link" href="#" tabindex="-1">CILENT LIST</a>
                </li>
                <li class="nav-item sbaritem">
                    <a class="nav-link" href="#" tabindex="-1">ADD</a>
                </li>
                <li class="nav-item sbaritem">
                    <a class="nav-link" href="#" tabindex="-1">UPDATE REPORT</a>
                </li>
                <li class="nav-item sbaritem">
                    <a class="nav-link" href="#" tabindex="-1">CAREER REQUEST</a>
                </li>
                <li class="nav-item sbaritem">
                    <a class="nav-link" href="#" tabindex="-1">UPLOAD EXCEL</a>
                </li>
                <li class="nav-item sbaritem">
                    <a class="nav-link" href="#" tabindex="-1">ANALYSYS REPORT</a>
                </li>
                <li class="nav-item sbaritem">
                    <a class="nav-link" href="#" tabindex="-1">CED CAB</a>
                </li>
            </ul>
        </div>

        <!-- Table -->
        <div class='col-md-10 col-sm-10'>
                <div class="card bg-warning text-dark text-center">
                    <div class="card-body">
                        <span class="card-text">123</span><br>
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
                        <th scope="col">Fare</th>
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
                            }else{
                                echo "Connected<br>";
                            }
                            // $user = $_SESSION['user'];
                            
                            $sql = "SELECT * FROM `Ride` WHERE status = 0 OR 1 OR 2";
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