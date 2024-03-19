
<?php
include("libsms/nusoap.php");

$client = new nusoap_client('http://panel.raysan.ir/smsSendWebService.asmx', 'wsdl'
, "", "", "", "");

$client->soap_defencoding = 'UTF-8';
$client->decode_utf8 = false;

 $param = array('UserName' => '09392263154', 'Pass' => '123456', 'Domain' => 'panel.raysansms');

$result = $client->call('getCredit', array('parameters' => $param), '', '', false, true);

$smsCredit = $result["getCreditResult"];
 ?>