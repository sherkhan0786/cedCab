<?php include 'header.php' ?>


<form action = "">
  <div class='container mt-5 mb-5'>
    <div class='row'>
        <div class='col-md-4 bg-white p-3 forrm'>
            <form action ="">
                <div class="text-center mb-3"><button class="btn btn-success m-0" disabled>CITY TAXI</button></div>
                    <h5 class="text-center fw-bold">VERIFY MOBILE here..</h5>
                <div class="mb-3">
                    <label for="Mobile" class="form-label">Mobile</label>
                    <input type="number" class="form-control" id="mob" aria-describedby="emailHelp">
                    <div id="mobHelp" class="form-text">We'll never share your Contact with anyone else.</div>
                </div>

                <button type="button" onclick='mobiVerify()' class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal">GENERATE OTP</button>
            </form>
        </div>
    </div>
  </div>


  <div class="container">
        
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">
          
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
              <a class="navbar-brand" href="index.php">CED CAB</a>

                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                <h4 class="modal-title">Ced Cab</h4>
              </div>
              <div class="modal-body" id="display">
              <form action="mobOtpCheck.php" method='post' id="myotp">
                <h2>verify OTP</h2>
                <label for="verify">Verify OTP</label>
                <input type="number" name="verify" id="verify" placeholder="Enter OTP">
                <br><br>
                <button class="btn btn-success" type="submit" name='verifyotp' value="verify an email">Submit</button>
            </form>
              </div>
              <div class="modal-footer">
                <!-- <a href="signup.php"><button type="button" class="btn btn-primary">Book</button></a> -->
                <!-- <button type="button" class="btn btn-success" data-dismiss="modal">verify</button> -->
              </div>
            </div>
            
          </div>
        </div>
        
      </div>


<?php include 'footer.php' ?>

<script>
    function mobiVerify(e){
        // e.preventDefault();
        var mob = $('#mob');
        // console.log(email);

        if(isNotEmpty(mob)){
            $.ajax({
                url:'mobiCode.php',
                method:"POST",
                // dataType: 'json',
                data: {
                    mob:mob.val(),
                },
                success: function(response){
                    // $('#myForm')[0].reset();
                    // $(".sent-notification").text("Message sent Success");
                    // $('#myotp').css("display", "block");
                    // $('#myForm').css("display", "none");
                }
            });
        }
    }

    function isNotEmpty(caller){
        if(caller.val() == ""){
            caller.css('border', '1px solid red');
            return false;
        }
        else{
            caller.css('border', '');
            return true;
        }
    }
    
</script>