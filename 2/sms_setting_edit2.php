<?php

include("lib/connect.php");
include("libsms/nusoap.php");

$object=new class_parent();

$url = $_POST['url'];
$user = $_POST['user'];
$pass = $_POST['pass'];
$id = $_POST['id'];


$sql = "update sms_setting set url='$url',user='$user', pass='$pass' where id=?";
$arr = array($id);
$object->myquery($sql, $arr);

phpAlert("  تنظیمات پنل پیامک با موفقیت ویرایش شد.");
?> <script> location.assign("sms_setting.php");  </script> <?php



