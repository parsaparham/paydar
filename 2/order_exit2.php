<?php
session_start();
include("lib/connect.php");
include ("lib/jdf.php");

$object=new class_parent();
$mobile=$_SESSION['mobile'];
$sql="select * from users where mobile=?";
$arr=array($mobile);
$res=$object->select($sql,$arr);
$exit_agent_id=$res[0]['id'];


$ticket_number= $_POST['ticket_number'];
$bill_number= $_POST['bill_number'];
$exit_person= $_POST['exit_person'];
$tahvil_dehandeh= $_POST['tahvil_dehandeh'];

$sql="select * from users where name=?";
$arr=array($tahvil_dehandeh);
$res=$object->select($sql,$arr);
$exit_tahvil_dehandeh_id=$res[0]['id'];


$sql="select * from orders where ticket_number=?";
$arr=array($ticket_number);
$row=$object->select($sql,$arr);
$customer_id=$row[0]['id'];

$time=jdate('H:i:s');
$date=jdate('Y/m/d');


$sql="select * from status order by priority desc limit 1";
$row=$object->select($sql);
$status_id=$row[0]['id'];

$sql = "update orders set exit_device=1, exit_date='$date',exit_time='$time',exit_person='$exit_person',bill_number='$bill_number',status_id='$status_id',exit_agent_id='$exit_agent_id',exit_tahvil_dehandeh_id='$exit_tahvil_dehandeh_id' where ticket_number=?";
$arr = array($ticket_number);
$object->myquery($sql, $arr);


phpAlert("قبض خروج با موقیت ایجاد شد.");
?> <script> location.assign("orders.php");  </script> <?php




