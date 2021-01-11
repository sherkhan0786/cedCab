<?php include 'adminheader.php' ?>
<div class='container mt-5 mb-5'>
    <div class='row'>
        <div class='col-md-4 bg-white p-3 forrm'>
            <form action="changePassQuery.php" method="post">
                <div class="text-center mb-3"><button class="btn btn-success m-0" disabled>CITY TAXI</button></div>
                    <h5 class="text-center fw-bold">CHANGE PASSWORD here..</h5>
                
                <div class="mb-3">
                    <label for="Password1" class="form-label">Old Password</label>
                    <input type="password" name="oldpass" class="form-control" id="password">
                </div>
                <div class="mb-3">
                    <label for="Password1" class="form-label">New Password</label>
                    <input type="password" name="newpass" class="form-control" id="password">
                </div>
                <div class="mb-3">
                    <label for="Password1" class="form-label">Confirm New Password</label>
                    <input type="password" name="confpass" class="form-control" id="password">
                </div>
                <button type="submit" name="submit" class="btn btn-success btn-block">CHANGE</button>
            </form>
        </div>
    </div>
  </div>
<?php include 'adminfooter.php' ?>