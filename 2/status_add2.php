<?php

include("lib/connect.php");
include("libsms/nusoap.php");

$object=new class_parent();

$name = $_POST['name'];
$name=check_injection($name);
$deadline = $_POST['deadline'];
$deadline=check_injection($deadline);
$priority = $_POST['priority'];
$priority=check_injection($priority);


$sql="select * from status where name=?";
$arr=array($name);
$num=$object->num($sql,$arr);
if($num>0){
    phpAlert("نام وضعیت تکراری است");
    ?> <script> window.history.go(-1);  </script> <?php
    die();
}

$sql="select * from status where priority=?";
$arr=array($priority);
$num=$object->num($sql,$arr);
if($num>0){
    phpAlert(" اولویت تکراری است");
    ?> <script> window.history.go(-1);  </script> <?php
    die();
}


    $sql = "INSERT INTO status (name,deadline,priority) VALUES ('$name','$deadline','$priority')";
    $object->myquery($sql);


phpAlert(" وضعیت با موفقیت ایجاد شد.");
?> <script> location.assign("status.php");  </script> <?php



