<?php
    $myObj = new Cedcab(
        $_POST['pickup'],
        $_POST['drop'],
        $_POST['cab'],
        $_POST['weight'],
        array('Charbag' =>0,'Indira Nagar'=>10,'BBD'=>30,'Barabanki'=>60,'Faizabad'=>100,'Basti'=>150,'Goarkhpur'=>210 ),
        array(50,150,200,250),
        array(
            array(13.50,12.00,10.20,8.50),
            array(14.50,13.00,11.20,9.50),
            array(15.50,14.00,12.20,10.50),
            array(16.50,15.00,13.20,11.50)
        )
    );

    $myObj->fun();
    
    class Cedcab{
        public $pickup, $drop, $cab, $weight, $distance, $fixRate, $fare;

        function __construct($pickup, $drop, $cab, $weight, $distance, $fixRate, $fare){
            $this->pickup = $pickup;
            $this->drop = $drop;
            $this->cab = $cab;
            $this->weight = $weight;
            $this->distance = abs($distance[$pickup] - $distance[$drop]);
            $this->fixRate = $fixRate;
            $this->fare = $fare;
        }

        function luggage(){
            if($this->distance <= 0){
                $weightRate = 0;
            }
            elseif($this->distance >0 && $this->distance <=10){
                $weightRate = 50;
            }
            elseif($this->distance > 10 && $this->distance <=20){
                $weightRate = 100;
            }
            else{
                $weightRate = 200;
            }
            if($cab == 'suv'){
                return $weightRate*2;
            }
            else{
                return $weightRate;
            }
        }

        function fare($i, $j){
            if($this->distance <= 10){
                $totalFare = ($this->fare[$i][$j] * $this->distance) + $this->fixRate[$i]; 
            }
        }
    }
?>