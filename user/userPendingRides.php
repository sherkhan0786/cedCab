<?php session_start(); ?>

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
                        <span class="card-text"><?php if(isset($_SESSION['pendCount'])){ echo $_SESSION['pendCount'];}?></span><br>
                        <span class="card-text">Your pending Rides</span><br>
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
                        <th scope="col" class="text-danger">Action</th>
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
                            
                            $count = 0;
                            $sql = "SELECT * FROM `Ride` WHERE userId = '$user' AND status = 1";
                            $result = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($result)>0){
                                while($row = mysqli_fetch_assoc($result)){
                                    $user_id =  $row['rideId'];
                                    //using session
                                    $_SESSION["user_id"] = $user_id;

                                    $from =  $row["rideFrom"];
                                    $to = $row["rideTo"];
                                    $dist = $row["totalDistance"];
                                    $rideDate = $row["rideDate"];
                                    $luggage = $row["luggage"];
                                    $cabType = $row["cabType"];
                                    $totalFare = $row["totalFare"];
                                    $count++;
                                    $_SESSION['pendCount'] = $count;
                                    echo "<tr>
                                    <td>$from</td>
                                    <td>$to</td>
                                    <td>$dist</td>
                                    <td>$rideDate</td>
                                    <td>$luggage</td>
                                    <td>$cabType<td>
                                    <td>$totalFare<td>
                                    <td><a href='userRideStatusUpdate.php?userId=$row[rideId]'>
                                    <button id='statusCancel'  class='btn btn-outline-danger'>Cancel</button>
                                    </a><td></tr>";
                                }
                            }
                        ?>
                        
                    </tbody>
                    </table>
        </div>
    </div>
</div>
<?php include 'userfooter.php' ?>

<!-- 
<script>
    function statusChange(){
        var statusCancel = $('#statusCancel');
        $.ajax({
                url:'userRideStatusUpdate.php',
                method:"POST",
                data: {
                    statusCancel:statusCancel.val(),
                },
                success: function(response){
                    alert("deleted");
                }
            });
    }
</script> -->