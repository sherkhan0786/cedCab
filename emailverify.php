<?php include 'header.php' ?>


<form action = "">
  <div class='container mt-5 mb-5'>
    <div class='row'>
        <div class='col-md-4 bg-white p-3 forrm'>
            <form action ="">
                <div class="text-center mb-3"><button class="btn btn-success m-0" disabled>CITY TAXI</button></div>
                    <h5 class="text-center fw-bold">VERIFY EMAIL here..</h5>
                <div class="mb-3">
                    <label for="Email1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>

                <button type="button" onclick='mailVerify()' class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal">GENERATE OTP</button>
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

                <h4 class="modal-title">Cab Fare</h4>
              </div>
              <div class="modal-body" id="display">
              <form action="emailOtpCheck.php" method='post' id="myotp">
                <h2>verify OTP</h2>
                <label for="verify">Verify Email</label>
                <input type="number" name="verify" id="verify" placeholder="Enter OTP">
                <br><br>
                <button class="btn btn-success" type="submit" name='verifyotp' value="verify an email">Submit</button>
              </form>
              </div>
              <div class="modal-footer">
              
              </div>
            </div>
            
          </div>
        </div>
        
      </div>


<?php include 'footer.php' ?>

<script>
    function mailVerify(e){
        // e.preventDefault();
        var email = $('#email');
        console.log(email);

        if(isNotEmpty(email)){
            $.ajax({
                url:'emailcode.php',
                method:"POST",
                // dataType: 'json',
                data: {
                    email:email.val(),
                },
                success: function(response){
                    $('#myForm')[0].reset();
                    $(".sent-notification").text("Message sent Success");
                    $('#myotp').css("display", "block");
                    $('#myForm').css("display", "none");
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