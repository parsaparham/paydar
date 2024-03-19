<?php

include("libsms/nusoap.php");

$client = new nusoap_client("http://panel.raysan.ir/smsSendWebService.asmx?wsdl","wsdl","","","","");
foreach($client as $item){
    echo $item . "\n";
}

echo "<br/>";


   $param = array('UserName'=>'09392263154','Pass'=>'123456','Domain'=>'panel.raysansms');
foreach($param as $item){
    echo $item . "\n";
}
$result = $client->call('getCredit', array('parameters' => $param), '', '', false, true);
// Check for a fault


		echo '<h2>اعتبار باقی مانده : </h2><pre>';
		print_r($result["getCreditResult"]);
        $a=$result["getCreditResult"];
        echo "<h1>".var_dump($a)."</h1>";
		echo '</pre>';

