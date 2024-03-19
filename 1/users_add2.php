<?php

include("lib/connect.php");
include("libsms/nusoap.php");
include ("lib/jdf.php");

$object=new class_parent();

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$email= $_POST['email'];
$address= $_POST['address'];
$etc= $_POST['etc'];


$time=jdate('H:i:s');
$date=jdate('Y/m/d');


$sql="select * from users where mobile=?";
$arr=array($mobile);
$num=$object->num($sql,$arr);
if($num>0){
    phpAlert("این شماره همراه قبلا در سایت ثبت نام شده است");
    ?>  <script> window.history.go(-1);  </script> <?php
    exit();
}


$sql = "INSERT INTO users (date,time,name,mobile,password,phone,email,address,etc) VALUES ('$date','$time','$name','$mobile','$password','$phone','$email','$address','$etc')";
$object->myquery($sql);

phpAlert("کاربر با موفقیت اضافه گردید");
?>  <script> location.assign("users.php");  </script> <?php


