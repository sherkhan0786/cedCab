<?php include 'header.php';?>
    <div class="main">
    <h1 class="text-white text-center fw-bold mt-3">Book a City Taxi to your destination in town</h1>
    <p class="text-white text-center fw-bold mb-4">Choose from a range of categories and prices</p>
    
    <div class="container mt-3 mb-5">
       <div class="row">
            <div class="col-lg-4 bg-white p-3 forrm">
                <form method="post" id="submit">
                    <div class="text-center mb-3"><button class="btn btn-success m-0" disabled>CITY TAXI</button></div>
                    <h5 class="text-center fw-bold">Your everyday travel partner</h5>
                    <h6 class="text-center fw-bold">AC Cabs for point to point travel</h6>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="pickup">PICKUP</label>
                    </div>
                        <select class="form-select locations" name="pickup" id="pickup" aria-label="Default select example">
                            <option value="Current location">Current location</option>
                            <option value="Charbagh">Charbagh</option>
                            <option value="IndiraNagar">Indira Nagar</option>
                            <option value="BBD">BBD</option>
                            <option value="Barabanki">Barabanki</option>
                            <option value="Faizabad">Faizabad</option>
                            <option value="Gorakhpur">Gorakhpur</option>
                            <option value="Basti">Basti</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="drop">DROP</label>
                    </div>
                        <select class="form-select locations" name="drop" id="drop" aria-label="Default select example">
                            <option value="Enter drop for ride estimate">Enter drop for ride estimate</option>
                            <option value="Charbagh">Charbagh</option>
                            <option value="IndiraNagar">Indira Nagar</option>
                            <option value="BBD">BBD</option>
                            <option value="Barabanki">Barabanki</option>
                            <option value="Faizabad">Faizabad</option>
                            <option value="Gorakhpur">Gorakhpur</option>
                            <option value="Basti">Basti</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="cab">CAB TYPE</label>
                    </div>
                        <select class="form-select" name="cab" id="cab" aria-label="Default select example">
                            <option value = "Select Cab">Select Cab</option>
                            <option value="micro">Ced Micro</option>
                            <option value="mini">Ced Mini</option>
                            <option value="royal">Ced Royal</option>
                            <option value="suv">Ced SUV</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="luggage">LUGGAGE</label>
                    </div>
                    <input class="form-control" type="text" min=0 max=999 step=".001" name="weight" id="weight">
                        
                    </div>
                    
                    <input type="submit" name="submit" class="btn btn-success btn-block" value="Calculate Fare" data-toggle="modal" data-target="#myModal">
                    </form>
            </div>
            <div class="col-lg-4 result">
                
            </div>
            
            
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
                <h4 class="modal-title">Cab Fare</h4>
              </div>
              <div class="modal-body" id="display">
                
              </div>
              <div class="modal-footer">
                <a href="rideInsert.php" id='bookbtn'><button type="button" class="btn btn-primary">Book</button></a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              </div>
            </div>
            
          </div>
        </div>
        
      </div>

      <?php
        include 'footer.php';
      ?>
  

  <!-- Script -->

<script>
    var display = document.getElementById('display');

    // weight disable in ced micro cab
    $('#cab').on('change', function(){
        var cab = document.getElementById('cab').value;
            if(cab == 'micro'){
                $('#weight').val('');
                $("#weight").prop('disabled', true);
                $("#weight").prop('placeholder',"luggage not allowed in micro");
            }else{
                $("#weight").prop('disabled', false);
                $("#weight").val("");
            }
        });

//  pickup drop select display enable disable
    $('.locations').on('change', function(){
        var selected = $(this).val();
        var other = $('.locations').not(this);
        other.find('option').prop('disabled', false);
        other.find('option[value ='+ selected+']').prop('disabled', true);
    })

    document.querySelector("input").addEventListener("keypress", function (evt) {
        if ((evt.which < 48 || evt.which > 57) && evt.which != 46)
        {
            evt.preventDefault();
        }
        });

    // picking variable and sending data through ajax
    $(document).ready(function(){
        $('#submit').submit(function(e){
            var pickup = $('#pickup').val();
            var drop = $('#drop').val();
            var cab = $('#cab').val();
            var weight = $('#weight').val();
            
            data = {'pickup':pickup, 'drop':drop, 'cab':cab, 'weight':weight,}
            e.preventDefault();


            
            if(pickup == "Current location"){
                document.getElementById('display').innerHTML = "Enter valid pickup Point";
                $('#bookbtn').hide();
            }
            else if(drop == "Enter drop for ride estimate"){
                document.getElementById('display').innerHTML = "Enter valid Drop Location";
                $('#bookbtn').hide();
            }
            else if(cab == "Select Cab"){
                document.getElementById('display').innerHTML = "Enter Cab Type";
                $('#bookbtn').hide();
            }
            else
            {
                $('#bookbtn').show();
            $.ajax({
                type:'POST',
                url:'calculate.php',
                data:data,
                success: function(data){
                    display = data;
                    console.log(data);
                    document.getElementById('display').innerHTML = display;
                }
            });
            }
        });
    });
</script>