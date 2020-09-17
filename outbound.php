<?php
require 'vendor/autoload.php';
use Twilio\TwiML\VoiceResponse;

//$queryArgs = array();
//parse_str($_SERVER['QUERY_STRING'], $queryArgs);

//$salesPhone = $queryArgs['sales_phone'];
$client=$_GET['client'];
$clientname=$_GET['name'];
$response = new VoiceResponse();
$response->say('please wait while contacting provider ' . $clientname);
$response->dial($client);

print_r((string)$response);
?>
