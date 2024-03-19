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
$id = $_POST['id'];
$id=check_injection($id);

$active=$_POST['active'];
if($active=="enable"){$active=1;}
if($active=="disable"){$active=0;}


$sql="select * from status where name=? and id!=$id";
$arr=array($name);
$num=$object->num($sql,$arr);
if($num>0){
    phpAlert("نام وضعیت تکراری است");
    ?> <script> window.history.go(-1);  </script> <?php
    die();
}

$sql="select * from status where priority=? and id!=$id";
$arr=array($priority);
$num=$object->num($sql,$arr);
if($num>0){
    phpAlert(" اولویت تکراری است");
    ?> <script> window.history.go(-1);  </script> <?php
    die();
}


$sql = "update status set name='$name',deadline='$deadline', priority='$priority',active='$active' where id=?";
$arr = array($id);
$object->myquery($sql, $arr);

phpAlert("  وضعیت با موفقیت ویرایش شد.");
?> <script> location.assign("status.php");  </script> <?php



