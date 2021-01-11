<?php
    session_start();
    echo "<table>";
    if($_POST['pickup'] && $_POST['drop'] &&  $_POST['cab']){
        $pickup = $_POST['pickup'];
        $drop = $_POST['drop'];
        $cab = $_POST['cab'];
        $weight = $_POST['weight'];

        


        $dist = array('Charbagh'  =>  0,
        'IndiraNagar'  => 10,
        'BBD'           => 30,
        'Barabanki'     => 60,
        'Faizabad'      => 100,
        'Basti'         => 150,
        'Gorakhpur'     =>210);

        $totalFare = new Luggage($pickup, $drop, $cab, $weight, $dist);
        echo "<tr><th>TOTAL DIST(KM) : </th> <td>".$totalFare->diff()." </td> </tr>";
        $totalFare->cedcab();
        $totalFare->weight();
    }else{
        echo "Please Enter a valid input";
    }
    global $pickup, $drop, $cab, $weight, $dist, $value1, $value2, $distance, $fare;

    // class to calculate total distance in km
    class Difference{
        public $pickup;
        public $drop;
        public $cab;
        public $weight;
        public $dist;

        function __construct($pickup, $drop, $cab, $weight, $dist){
            $this->pickup = $pickup;
            $this->drop = $drop;
            $this->cab = $cab;
            $this->weight = $weight;
            $this->dist = $dist;
        }

        function diff(){
            global $pickup, $drop, $cab, $weight, $dist, $value1, $value2, $distance;
            foreach($dist as $key=>$val){
                if($key == $pickup){
                    $value1 = $val;
                    echo "<tr><th>FROM : </th> <td>$key </td> </tr>";
                }
            }
            foreach($dist as $key=>$val){
                if($key == $drop){
                    $value2 = $val;
                    echo "<tr><th>TO : </th> <td>$key </td> </tr>";
                }
            }
            return $distance = abs($value2 - $value1);
        }
    }


    class Cab extends Difference{
        public function cedcab(){
            global $pickup, $drop, $cab, $weight, $dist, $value1, $value2,$distance, $fare;
            echo "<tr><th>Weight(KG) : </th> <td>$weight</td> </tr>";
            if($cab == 'micro'){
                echo "<tr><th>CAB TYPE : </th> <td>$cab<br>";
                if($distance <= 10){
                    $fare = ($distance * 13.5) + 50 ;
                    if($weight <= 0){
                     echo "<tr><th>Total Fare(₹) : </th> <td>$fare</td> </tr>";
                    }
                }
                elseif($distance>10 && $distance<=60){
                    $distance = $distance-10;
                    $rate1 = 10*13.5;
                    $fare = $rate1 + ($distance*12) + 50 ;
                     if($weight <= 0){
                     echo "<tr><th>Total Fare(₹) : </th> <td>$fare</td> </tr>";
                    }
                }
                elseif($distance>50 && $distance<=160){
                    $distance = $distance - 60;
                    $rate2 = 10*13.5 + (50*12);
                    $fare = $rate2 + ($distance * 10.2) + 50;
                     if($weight <= 0){
                     echo "<tr><th>Total Fare(₹) : </th> <td>$fare</td> </tr>";
                    }
                }
                elseif($distance>160){
                    $distance = $distance - 160;
                    $rate3 = 10*13.5 + (50*12) + 100*10.2;
                    $fare = $rate3 + ($distance * 8.5) + 50;
                     if($weight <= 0){
                     echo "<tr><th>Total Fare(₹) : </th> <td>$fare</td> </tr>";
                    }
                }
            }


            // fare Calculation for ced MINI cab
            if($cab == 'mini'){
                echo "<tr><th>CAB TYPE :</th> <td> $cab</td> </tr>";
                if($distance <= 10){
                    $fare = ($distance * 14.5) + 150;
                     if($weight <= 0){
                     echo "<tr><th>Total Fare(₹) : </th> <td>$fare</td> </tr>";
                    }
                }
                elseif($distance>10 && $distance<=60){
                    $distance = $distance-10;
                    $rate1 = 10*14.5;
                    $fare = $rate1 + ($distance*13) + 150;
                     if($weight <= 0){
                     echo "<tr><th>Total Fare(₹) : </th> <td>$fare</td> </tr>";
                    }
                }
                elseif($distance>50 && $distance<=160){
                    $distance = $distance - 60;
                    $rate2 = 10*14.5 + (50*13);
                    $fare = $rate2 + ($distance * 11.2) + 150;
                    if($weight <= 0){
                     echo "<tr><th>Total Fare(₹) : </th> <td>$fare</td> </tr>";
                    }
                }
                elseif($distance>160){
                    $distance = $distance - 160;
                    $rate3 = 10*14.5 + (50*13) + 100*11.2;
                    $fare = $rate3 + ($distance * 9.5) + 150;
                     if($weight <= 0){
                     echo "<tr><th>Total Fare(₹) : </th> <td>$fare</td> </tr>";
                    }
                }
            }

            // fare for ced ROYAL cab
            if($cab == 'royal'){
                echo "<tr><th>CAB TYPE : </th> <td>$cab</td> </tr>";
                if($distance <= 10){
                    $fare = ($distance * 15.5) + 200;
                     if($weight <= 0){
                     echo "<tr><th>Total Fare(₹) : </th> <td>$fare</td> </tr>";
                    }
                }
                elseif($distance>10 && $distance<=60){
                    $distance = $distance-10;
                    $rate1 = 10*15.5;
                    $fare = $rate1 + ($distance*14) + 200;
                     if($weight <= 0){
                     echo "<tr><th>Total Fare(₹) : </th> <td>$fare</td> </tr>";
                    }
                }
                elseif($distance>50 && $distance<=160){
                    $distance = $distance - 60;
                    $rate2 = 10*15.5 + (50*14);
                    $fare = $rate2 + ($distance * 12.2) + 200;
                     if($weight <= 0){
                     echo "<tr><th>Total Fare(₹) : </th> <td>$fare</td> </tr>";
                    }
                }
                elseif($distance>160){
                    $distance = $distance - 160;
                    $rate3 = 10*15.5 + (50*14) + 100*12.2;
                    $fare = $rate3 + ($distance * 10.5) + 200;
                     if($weight <= 0){
                     echo "<tr><th>Total Fare(₹) : </th> <td>$fare</td> </tr>";
                    }
                }
            }

            // fare for ced SUV cab
            if($cab == 'suv'){
                echo "<tr><th>CAB TYPE : </th> <td>$cab</td> </tr>";
                if($distance <= 10){
                    $fare = ($distance * 16.5) + 250;
                     if($weight <= 0){
                     echo "<tr><th>Total Fare(₹) : </th> <td>$fare</td> </tr>";
                    }
                }
                elseif($distance>10 && $distance<=60){
                    $distance = $distance-10;
                    $rate1 = 10*16.5;
                    $fare = $rate1 + ($distance*15) + 250;
                     if($weight <= 0){
                     echo "<tr><th>Total Fare(₹) : </th> <td>$fare</td> </tr>";
                    }
                }
                elseif($distance>50 && $distance<=160){
                    $distance = $distance - 60;
                    $rate2 = 10*16.5 + (50*15);
                    $fare = $rate2 + ($distance * 13.2) + 250;
                     if($weight <= 0){
                     echo "<tr><th>Total Fare(₹) : </th> <td>$fare</td> </tr>";
                    }
                }
                elseif($distance>160){
                    $distance = $distance - 160;
                    $rate3 = 10*16.5 + (50*15) + 100*13.2;
                    $fare = $rate3 + ($distance * 11.5) + 250;
                     if($weight <= 0){
                     echo "<tr><th>Total Fare(₹) : </th> <td>$fare</td> </tr>";
                    }
                }
            }
        }
    }

    class Luggage extends Cab{
        public function weight(){
            global $pickup, $drop, $cab, $weight, $dist, $value1, $value2,$distance , $fare;
            
            if(($weight>0 && $weight<=10) && ($cab == 'mini' || $cab == 'royal')){
                $fare = $fare + 50;
                echo "<tr><th>Total Fare(₹) : </th> <td>$fare</td> </tr>";
            }

            if(($weight>10 && $weight<=20) && ($cab == 'mini' || $cab == 'royal')){
                $fare = $fare + 100;
                echo "<tr><th>Total Fare(₹) : </th> <td>$fare</td> </tr>";
            }
            if($weight>0 && $weight<=10 && $cab == 'suv'){
                $fare = $fare + (50*2);
                echo "<tr><th>Total Fare3(₹) : </th> <td>$fare</td> </tr>";
            }
            if($weight>10 && $weight<=20 && $cab == 'suv'){
                $fare = $fare + (100*2);
                echo "<tr><th>Total Fare(₹) : </th> <td>$fare</td> </tr>";
            }


            if(($weight>20) && ($cab == 'mini' || $cab == 'royal')){
                $fare = $fare + 200;
                echo "<tr><th>Total Fare(₹) : </th> <td>$fare</td> </tr>";
            }
            if($weight>20 && $cab == 'suv'){
                $fare = $fare + (200*2);
                echo "<tr><th>Total Fare(₹) : </th> <td>$fare</td> </tr>";
            }
        }
    }
    echo "</table>";
?>

<?php
// storing all data in session to store in database
$_SESSION['pickup'] = $pickup;
$_SESSION['drop'] = $drop;
$_SESSION['distance'] = $distance;
$_SESSION['weight'] = $weight;
$_SESSION['cab'] = $cab;
$_SESSION['totalFare'] = $fare;

?>