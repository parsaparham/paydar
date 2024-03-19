<?php

include("lib/connect.php");
include("libsms/nusoap.php");
include ("lib/jdf.php");

$object=new class_parent();

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$mobile=check_injection($mobile);
$password = $_POST['password'];
$password=check_injection($password);
$email= $_POST['email'];
$email=check_injection($email);
$address= $_POST['address'];
$address=check_injection($address);
$permission= $_POST['permission'];

/*$sql="select * permissions from  where name=?";
$arr=array($permission);
$res=$object->select($sql,$arr);
$per_id=$res[0]['id'];*/


$per_id=memberback($permission);

$id= $_POST['id'];
$id=check_injection($id);
$active=$_POST['active'];
if($active=="enable"){$active=1;}
if($active=="disable"){$active=0;}







$sql="select * from users where mobile=? AND id!=$id";
$arr=array($mobile);
$num=$object->num($sql,$arr);
if($num>0){
    phpAlert("این شماره همراه قبلا در سایت ثبت نام شده است");
    ?>  <script> window.history.go(-1);  </script> <?php
    exit();
}


$sql = "update users set name='$name',password='$password',mobile='$mobile',email='$email',address='$address',active='$active',per_id='$per_id' where id=?";
$arr = array($id);
$object->myquery($sql, $arr);





phpAlert("مشخصات با موفقیت ویرایش گردید");
?>  <script> location.assign("users.php");  </script> <?php


