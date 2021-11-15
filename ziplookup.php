<?php
require_once("./phpclasses_ws/WebServiceClient.php");

$token_obj = json_decode(file_get_contents("/home/dvolm359/token.json"));
$_user = $token_obj->{"user"};
$_pass = $token_obj->{"pass"};
$_role = $token_obj->{"role"};
$_api_token = $token_obj->{"api_token"};
$_api_key = $token_obj->{"api_key"};


$client = new WebServiceClient("http://cnmt310.braingia.org/ziplookup.php");
//_ 
// Default is to POST. If you need to change to a GET, here's how:
//$client->setMethod("GET");
//_ 
$zip = "54481";
$data = array("apikey" => $_api_key,
             "apitoken" => $_api_token,
             "zip" => $zip,
             );
$client->setPostFields($data);
//_ 
//For Debugging:
//var_dump($client);
//_ 
header('Content-Type: application/json; charset=utf-8');
print $client->send();
?>
