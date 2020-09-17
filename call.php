<?php
require 'vendor/autoload.php';
use \Twilio\Rest\Client;

require_once('include/connect.php');
 $sql = "SELECT * from `info` ";
 $query = mysqli_query($con,$sql);
 $res=mysqli_fetch_assoc($query);
 
$clientnumber = urlencode($_GET['userPhone']);
$clientname = urlencode($_GET['name']);
$AccountSid=$res['AccountSid'];
$AuthToken=$res['AuthToken'];
  
$client=new Client($AccountSid,$AuthToken);
$host = $_SERVER['HTTP_HOST'];
$outboundUri = "http://$host/outbound.php?client=$clientnumber&name=$clientname";
try{
    $call=$client->calls->create(
        $res['adminnumber'],
        $res['twilionumber'],
        array("url"=> $outboundUri)
    );
    echo "Started call:" . $call->sid;
}
catch(Exception $e){
    echo "Error:" . $e->getMessage();
}