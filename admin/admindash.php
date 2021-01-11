<?php
session_start();

if(!isset($_SESSION['user'])){
    header("location:../login.php");
}
?>

<?php include 'adminheader.php' ?>
   <div class=''>
        <div class='row'>
            <div class='col-sm-2 col-md-2'>
                <?php include 'adminSideBar.php'; ?>
            </div>
<!-- </div> -->
            <!-- <div class='col-md-1'>
            <div> -->

            <div class='col-sm-3 col-md-3 mt-4'>
                <div class="card  bg-warning text-dark text-center" style="width: 18rem;">
                    <div class="card-body">
                        <span class="card-text"><?php if(isset($_SESSION['rideReq'])){echo $_SESSION['rideReq'];} ?></span><br>
                        <span class="card-text">Ride Request</span><br>
                        <a href="adminRideRequest.php" class="card-link text-primary blink_me">click→</a>
                    </div>
                </div>
                <div class="card  bg-warning text-dark mt-3 text-center" style="width: 18rem;">
                    <div class="card-body">
                        <span class="card-text"><?php if(isset($_SESSION['compRide'])){echo $_SESSION['compRide'];} ?></span><br>
                        <span class="card-text">Completed Rides</span><br>
                        <a href="adminCompleteRide.php" class="card-link text-primary blink_me">click→</a>
                    </div>
                </div>
                <div class="card  bg-warning text-dark mt-3 text-center" style="width: 18rem;">
                    <div class="card-body">
                        <span class="card-text"><?php if(isset($_SESSION['cancelCount'])){echo $_SESSION['cancelCount'];} ?></span><br>
                        <span class="card-text">Canceled rides</span><br>
                        <a href="adminCancelRide.php" class="card-link text-primary blink_me">click→</a>
                    </div>
                </div>
            </div>
            <div class='col-sm-3 col-md-3 mt-3'>
                <div class="card  bg-warning text-dark mt-3 text-center" style="width: 18rem;">
                    <div class="card-body">
                        <span class="card-text">123456</span><br>
                        <span class="card-text">Total Number Of Rides</span><br>
                        <a href="#" class="card-link text-primary blink_me">click→</a>
                    </div>
                </div>
                <div class="card  bg-warning text-dark mt-3 text-center" style="width: 18rem;">
                    <div class="card-body">
                        <span class="card-text"><?php if(isset($_SESSION['pendReq'])){echo $_SESSION['pendReq'];} ?></span><br>
                        <span class="card-text">Pending users Request</span><br>
                        <a href="adminPendingUsersReq.php" class="card-link text-primary blink_me">click→</a>
                    </div>
                </div>
                <div class="card  bg-warning text-dark mt-3 text-center" style="width: 18rem;">
                    <div class="card-body">
                        <span class="card-text"><?php if(isset($_SESSION['apprCount'])){echo $_SESSION['apprCount'];} ?></span><br>
                        <span class="card-text">Approve user requests</span><br>
                        <a href="adminApproveUserReq.php" class="card-link text-primary blink_me">click→</a>
                    </div>
                </div>
            </div>
            <div class='col-sm-3 col-md-3 mt-3'>
                <div class="card  bg-warning text-dark mt-3 text-center" style="width: 18rem;">
                    <div class="card-body">
                        <span class="card-text"><?php if(isset($_SESSION['allUserCount'])){echo $_SESSION['allUserCount'];} ?></span><br>
                        <span class="card-text">All users</span><br>
                        <a href="allUsers.php" class="card-link text-primary blink_me">click→</a>
                    </div>
                </div>
                <div class="card  bg-warning text-dark mt-3 text-center" style="width: 18rem;">
                    <div class="card-body">
                        <span class="card-text">123456</span><br>
                        <span class="card-text">Serviceable locations</span><br>
                        <a href="adminServiceLocation.php" class="card-link text-primary blink_me">click→</a>
                    </div>
                </div>
                <div class="card  bg-warning text-dark mt-3 text-center" style="width: 18rem;">
                    <div class="card-body">
                        <span class="card-text"><?php if(isset($_SESSION['totalEarn'])){echo $_SESSION['totalEarn'];} ?></span><br>
                        <span class="card-text">Total Earning</span><br>
                        <a href="#" class="card-link text-primary blink_me">click→</a>
                    </div>
                </div>
            </div>
        </div>
   <!-- </div> -->
<?php include 'adminfooter.php' ?>


<script>

(function blink() {
     $('.blink_me').fadeOut(500).fadeIn(500, blink);
    })();
</script>