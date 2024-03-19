<?php
session_start();
include("lib/connect.php");
include ("lib/jdf.php");

$object=new class_parent();
$mobile=$_SESSION['mobile'];
$sql="select * from users where mobile=?";
$arr=array($mobile);
$res=$object->select($sql,$arr);
$agent_id=$res[0]['id'];


$customer= $_POST['customer'];
$device= $_POST['device'];
$serial= $_POST['serial'];
$problem= $_POST['problem'];
$description= $_POST['description'];
$battery_replacement=$_POST['battery_replacement'];
$service_fee_announcement=$_POST['service_fee_announcement'];
$input_cable=$_POST['input_cable'];
$tahvil_girandeh=$_POST['tahvil_girandeh'];


if(isset($_POST['no_output'])){$no_output=1;}else{$no_output=0;}
if(isset($_POST['connection'])){$connection=1;}else{$connection=0;}
if(isset($_POST['fuse'])){$fuse=1;}else{$fuse=0;}
if(isset($_POST['burning'])){$burning=1;}else{$burning=0;}
if(isset($_POST['battery'])){$battery=1;}else{$battery=0;}
if(isset($_POST['charger'])){$charger=1;}else{$charger=0;}
if(isset($_POST['inverter'])){$inverter=1;}else{$inverter=0;}
if(isset($_POST['rectifier'])){$rectifier=1;}else{$rectifier=0;}
if(isset($_POST['volt_high'])){$volt_high=1;}else{$volt_high=0;}
if(isset($_POST['volt_low'])){$volt_low=1;}else{$volt_low=0;}
if(isset($_POST['fan'])){$fan=1;}else{$fan=0;}
if(isset($_POST['hot'])){$hot=1;}else{$hot=0;}





$sql="select * from users where name=?";

$arr=array($customer);
$arr1=array($tahvil_girandeh);


$row=$object->select($sql,$arr);
$row1=$object->select($sql,$arr1);

$customer_id=$row[0]['id'];
$tahvil_girandeh_id=$row1[0]['id'];

if($service_fee_announcement=="enable"){$service_fee_announcement=1;}
if($service_fee_announcement=="disable"){$service_fee_announcement=0;}

if($battery_replacement=="enable"){$battery_replacement=1;}
if($battery_replacement=="disable"){$battery_replacement=0;}

if($input_cable=="enable"){$input_cable=1;}
if($input_cable=="disable"){$input_cable=0;}






$time=jdate('H:i:s');
$date=jdate('Y/m/d');

$Year=jdate('y');
$Month=jdate('m');
$Day=jdate('d');

$Hour=jdate('H');
$Minute=jdate('i');

$ticket_number=$Hour.$Minute.$Year.$Month.$Day.$customer_id;
$ticket_number=uniqid();


$sql="select * from status order by priority asc limit 1";
$row=$object->select($sql);
$status_id=$row[0]['id'];

$sql="select * from status where id=?";
$arr=array($status_id);
$row=$object->select($sql,$arr);
$description=$row[0]['name'];

$sql = "INSERT INTO orders (date,time,ticket_number,customer_id,device,serial,problem,description,status_id,service_fee_announcement,battery_replacement,input_cable,agent_id,exit_tahvil_girandeh_id) VALUES ('$date','$time','$ticket_number','$customer_id','$device','$serial','$problem','$description','$status_id','$service_fee_announcement','$battery_replacement','$input_cable','$agent_id','$tahvil_girandeh_id')";
$object->myquery($sql);

$sql = "INSERT INTO problems (ticket_number,no_output,connection,fuse,burning,battery,charger,inverter,rectifier,volt_high,volt_low,fan,hot) VALUES
                            ('$ticket_number','$no_output','$connection','$fuse','$burning','$battery','$charger','$inverter','$rectifier','$volt_high','$volt_low','$fan','$hot')";
$object->myquery($sql);

$sql = "INSERT INTO history (date,time,ticket_number,status_id,description,agent_id) VALUES ('$date','$time','$ticket_number','$status_id','$description','$agent_id')";
$object->myquery($sql);



phpAlert("  قبض جدید با موفقیت ایجاد شد.");
?> <script> location.assign("orders.php");  </script><?php



