<?php
    session_start();
?>

<?php include 'header.php' ?>


  <div class='container mt-3 mb-5'>
    <div class='row'>
        <div class='col-md-4 bg-white p-3 forrm'>
            <form action='createSignup.php' method="post">
                <div class="text-center mb-3"><button class="btn btn-success m-0" disabled>CITY TAXI</button></div>
                    <h5 class="text-center fw-bold">SIGNUP here..</h5>
                <div class="mb-3">
                    <label for="name" class="form-label">name</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>
                <div class="mb-3">
                    <label for="Email1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" value=<?php echo $_SESSION['uEmail'];?> >
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="contact" class="form-label">Mobile Number</label>
                    <input type="number" name="mobile" class="form-control" id="mobile" aria-describedby="emailHelp" value=<?php echo $_SESSION['uMob'];?> >
                </div>
                <div class="mb-3">
                    <label for="Password1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <button type="submit" name="submit" class="btn btn-success btn-block">SIGNUP</button>
            </form>
        </div>
    </div>
  </div>
<?php include 'footer.php' ?>

<?php
    session_destroy();
?>