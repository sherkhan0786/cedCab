<?php
session_start();

$digits = 4;
$rand =  rand(pow(10, $digits-1), pow(10, $digits)-1);

$_SESSION['mobsess'] = $rand;
        $mob = $_POST['mob'];
        $_SESSION['uMob'] = $mob;

$fields = array(
    "sender_id" => "FSTSMS",
    "message" => "$rand",
    "language" => "english",
    "route" => "p",
    "numbers" => "$mob",
);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($fields),
  CURLOPT_HTTPHEADER => array(
    "authorization: 0kma1ofgIEzi34y2jpblZ6WteBwSFUD8YATNvJLOVRuh5H9dxXxKmgpiFB02v87rY6ThsdSL4qa9N3PJ",
    "accept: */*",
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}


    
?>