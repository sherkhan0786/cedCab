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
                        <span class="card-text">123</span><br>
                        <span class="card-text">Your Ride Request</span><br>
                        <a href="" class="card-link text-light">→</a>
                    </div>
                </div>

                <table class="table table-striped table-warning">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Distance</th>
                        <th scope="col">IsAvailable</th>
                        <th scope="col">Action</th>
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
                            
                            $sql = "SELECT * FROM `Location`";
                            $result = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($result)>0){
                                while($row = mysqli_fetch_assoc($result)){
                                    $id =  $row["id"];
                                    $name = $row["name"];
                                    $distance = $row["distance"];
                                    $isAvailable = $row["isAvailable"];

                                    echo "<tr>
                                    <td>$id</td>
                                    <td>$name</td>
                                    <td>$distance</td>
                                    <td>$isAvailable</td>
                                    <td><button class='btn btn-info'>Edit</button>  <button class='btn btn-danger'>Delete</button></td>
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