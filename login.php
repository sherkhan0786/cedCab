<?php include 'header.php' ?>


  <div class='container mt-5 mb-5'>
    <div class='row'>
        <div class='col-md-4 bg-white p-3 forrm'>
            <form action="loginquery.php" method="post">
                <div class="text-center mb-3"><button class="btn btn-success m-0" disabled>CITY TAXI</button></div>
                    <h5 class="text-center fw-bold">LOGIN here..</h5>
                <div class="mb-3">
                    <label for="Email1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                
                <div class="mb-3">
                    <label for="Password1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <button type="submit" name="submit" class="btn btn-success btn-block">LOGIN</button>
                <p>Not have a account? <a href="emailverify.php">click here</a></p>
            </form>
        </div>
    </div>
  </div>
<?php include 'footer.php' ?>