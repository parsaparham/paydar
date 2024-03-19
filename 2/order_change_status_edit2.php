<?php
session_start();
include("lib/connect.php");
include("libsms/nusoap.php");
include ("lib/jdf.php");



$object = new class_parent();
$mobile = $_SESSION['mobile'];
$sql = "select * from users where mobile=?";
$arr = array($mobile);
$res = $object->select($sql, $arr);
$agent_id = $res[0]['id'];

$time=jdate('H:i:s');
$date=jdate('Y/m/d');




$status = $_POST['status'];
$description = $_POST['description'];
$id = $_POST['id'];
$ticket_number = $_POST['ticket_number'];




$sql="select * from status where name=?";
$arr=array($status);
$res=$object->select ($sql,$arr);
$status_id=$res[0]['id'];


$sql = "update orders set status_id='$status_id' where id=?";
$arr = array($id);
$object->myquery($sql, $arr);


$sql = "INSERT INTO history (date,time,ticket_number,status_id,description,agent_id) VALUES ('$date','$time','$ticket_number','$status_id','$description','$agent_id')";
$object->myquery($sql);

phpAlert("  وضعیت با موفقیت ویرایش شد.");
?> <script> location.assign("orders.php");  </script> <?php



