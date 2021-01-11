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
                        <span class="card-text"><?php echo $_SESSION['allUserCount']; ?></span><br>
                        <span class="card-text">All Users</span><br>
                        <a href="" class="card-link text-light">→</a>
                    </div>
                </div>

                <table class="table table-striped table-warning">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile Number</th>
                        <th scope="col">Date</th>
                        <th scope="col" class='text-danger'>Action</th>
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
                            $sql = "SELECT * FROM `signup` WHERE isadmin = 0";
                            $result = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($result)>0){
                                while($row = mysqli_fetch_assoc($result)){
                                    $name =  $row["name"];
                                    $email = $row["email"];
                                    $mobile = $row["mobile"];
                                    $date = $row["date"];
                                    $count++;
                                    $_SESSION['allUserCount'] = $count;
                                    
                                    echo "<tr>
                                    <td>$name</td>
                                    <td>$email</td>
                                    <td>$mobile</td>
                                    <td>$date</td>
                                    <td><a href='adminBlockStatusUpdate.php?block=$row[id]'><button id='statusCancel' class='btn btn-outline-danger'>Block User</button></a> <a href='adminUnblockStatusUpdate.php?unblock=$row[id]'><button id='statusCancel' class='btn btn-outline-primary'>unblock User</button></a><td>
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

<script>
$(document).ready( function () {
    $('.table').DataTable();
} );
</script>