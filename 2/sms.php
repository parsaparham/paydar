﻿<?php
/*
 *
 *
 *
 *	Service: WSDL
 *	Payload: document/literal
 *	Transport: http
 *	Authentication: none
 */
require_once('libsms/nusoap.php');
    if(isset($_POST['send']))
{

	/////////////////// Web Service Address ////////////////////////
    ////// آدرس وب سرویس /////////////////////////////////
$client = new nusoap_client('http://panel.payamakpardaz.com/smssendwebserviceforphp.asmx?wsdl', 'wsdl',
						'', '', '', '');


$err = $client->getError();
if ($err) {
	echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
}
    /////////////////// Login ////////////////////////
    ////// اطلاعات کاربری /////////////////////////////////
// Doc/lit parameters get wrapped



    ////// دریافت موجودی /////////////////////////////////
   $param = array('UserName'=>'09392263154','Pass'=>'123456','Domain'=>'panel.raysansms');
$result = $client->call('getCredit', array('parameters' => $param), '', '', false, true);
// Check for a fault
if ($client->fault) {
	echo '<h2>خطا در ارسال پیامک</h2><pre>';
	//print_r($result);
	echo '</pre>';
} else {
	// Check for errors
	$err = $client->getError();
	if ($err) {
		// Display the error
		echo '<h2>خطا : </h2><pre>' . $err . '</pre>';
	} else {
		// Display the result
		echo '<h2>اعتبار باقی مانده : </h2><pre>';
		print_r($result["getCreditResult"]);
		echo '</pre>';
	}
}
}

/////////////////////////////////////////////////////////////////////////////////////////////
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
<SCRIPT LANGUAGE="JavaScript">
<!-- Dynamic Version by: Nannette Thacker -->
<!-- http://www.shiningstar.net -->
<!-- Original by :  Ronnie T. Moore -->
<!-- Web Site:  The JavaScript Source -->
<!-- Use one function for multiple text areas on a page -->
<!-- Limit the number of characters per textarea -->
<!-- Begin
function textCounter(field,cntfield,maxlimit) {
if (field.value.length > maxlimit) // if too long...trim it!
field.value = field.value.substring(0, maxlimit);
// otherwise, update 'characters left' counter
else
cntfield.value = maxlimit - field.value.length;
}
//  End -->
</script></head>

<body>
<form action="" method="post" dir="rtl" name="myForm" >
number : <input type="text" name="number" /> <br/>
text : <textarea rows="20" cols="150" name="txt" id="txt" onKeyDown="textCounter(document.myForm.message1,document.myForm.remLen1,125)"
onKeyUp="textCounter(document.myForm.txt,document.myForm.remLen1,918);" ></textarea>
<br/>
<input readonly type="text" name="remLen1" size="3" maxlength="3" value="918"/>
characters left
<br/>
<br/>
<input type="submit" name="send" value="send" />


</form>
</body>

</html>
