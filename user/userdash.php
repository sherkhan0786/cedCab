<?php
session_start();
error_reporting(0);

if(!isset($_SESSION['user'])){
    header("location:../login.php");
}
?>



<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "CedCab";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    die("Connection failed"). mysqli_connect_error();
}

// echo $_SESSION['last_id'];
$last_id = $_SESSION['last_id'];
$sql = "SELECT * FROM Ride WHERE rideId=$last_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $from =  $row["rideFrom"];
        $to = $row["rideTo"];
        $dist = $row["totalDistance"];
        $rideDate = $row["rideDate"];
        $luggage = $row["luggage"];
        $cabType = $row["cabType"];
        $totalFare = $row["totalFare"];

    }
  }

  $user = $_SESSION['user'];


  $pendCount = 0;
    $sql = "SELECT * FROM `Ride` WHERE userId = '$user' AND status = 1";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            $pendCount++;
        }
    }


    $compCount = 0;
    $expCount = 0;
    $sql = "SELECT * FROM `Ride` WHERE userId = '$user' AND status = 2";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            $compCount++;
            $totalFare = $row["totalFare"];
            $expCount += $totalFare;
        }
    }
?>

<?php include 'userheader.php' ?>
   <div class=''>
        <div class='row'>
            <div class='col-sm-2 col-md-2'>
                <?php include 'userSideBar.php'; ?>
            </div>

            <div class='col-sm-3 col-md-4 my-3 mx-auto'>
                <div class="card  bg-warning text-dark text-center" style="width: 18rem;">
                    <div class="card-body">
                        <span class="card-text"><?php echo $pendCount;?></span><br>
                        <span class="card-text">pending Rides</span><br>
                        <a href="userPendingRides.php" class="card-link text-primary blink_me">click→</a>
                    </div>
                </div>
                <div class="card  bg-warning text-dark mt-3 text-center" style="width: 18rem;">
                    <div class="card-body">
                        <span class="card-text"><?php echo $compCount ?></span><br>
                        <span class="card-text">Completed Rides</span><br>
                        <a href="userCompletedRides.php" class="card-link text-primary blink_me">click→</a>
                    </div>
                </div>
            </div>
            <div class='col-sm-3 col-md-4  mx-auto'>
                <div class="card  bg-warning text-dark mt-3 text-center" style="width: 18rem;">
                    <div class="card-body">
                        <span class="card-text"><?php if(isset($_SESSION['allCount'])){ echo $_SESSION['allCount'];}?></span><br>
                        <span class="card-text">All Rides</span><br>
                        <a href="userAllRides.php" class="card-link text-primary blink_me">click→</a>
                    </div>
                </div>
                <div class="card  bg-warning text-dark mt-3 text-center" style="width: 18rem;">
                    <div class="card-body">
                        <span class="card-text"><?php echo $expCount; ?></span><br>
                        <span class="card-text">Total Expanses</span><br>
                        <a href="" class="card-link text-primary blink_me">→</a>
                    </div>
                </div>
            </div>

            </div>


            <!-- creating table for booking approve by admin -->
            <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Pickup</th>
                        <th scope="col">Drop</th>
                        <th scope="col">Distance</th>
                        <th scope="col">Luggage</th>
                        <th scope="col">Cab Type</th>
                        <th scope="col">Date</th>
                        <th scope="col">Fare</th>
                        <!-- <th scope="col" class="text-danger">Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">1</th>
                        <td><?php echo $from; ?></td>
                        <td><?php echo $to; ?></td>
                        <td><?php echo $dist; ?></td>
                        <td><?php echo $luggage; ?></td>
                        <td><?php echo $cabType; ?></td>
                        <td><?php echo $rideDate; ?></td>
                        <td><?php echo $totalFare; ?></td>
                        <!-- <td><button id='statusCancel' onclick="statusChange()" class='btn btn-danger'>Cancel</button></td> -->

                        <?php
                        
                        // echo "<td><a href='userRideStatusUpdate.php?status=$row[status]'><button class='btn btn-danger'>Cancel</button></a></td>";
                        
                        ?>
                        </tr>
                        
                    </tbody>
                    </table>
        </div>
   <!-- </div> -->
<?php include 'userfooter.php' ?>


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
                    // $('#myForm')[0].reset();
                    // $(".sent-notification").text("Message sent Success");
                    // $('#myotp').css("display", "block");
                    // $('#myForm').css("display", "none");
                }
            });
    }

    (function blink() {
     $('.blink_me').fadeOut(500).fadeIn(500, blink);
    })();
</script>