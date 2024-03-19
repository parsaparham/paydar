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

$did=$_POST['id'];
$ticket_number= $_POST['ticket_number'];
$customer= $_POST['customer'];
$device= $_POST['device'];
$serial= $_POST['serial'];
$problem= $_POST['problem'];
$description= $_POST['description'];
$battery_replacement=$_POST['battery_replacement'];
$service_fee_announcement=$_POST['service_fee_announcement'];
$warranty=$_POST['warranty'];
$input_cable=$_POST['input_cable'];
$tahvil_girandeh=$_POST['tahvil_girandeh'];
$EntryCode=$_POST['EntryCode'];


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

if($warranty=="enable"){$warranty=1;}
if($warranty=="disable"){$warranty=0;}

$time=jdate('H:i:s');
$date=jdate('Y/m/d');

$Year=jdate('y');
$Month=jdate('m');
$Day=jdate('d');

$Hour=jdate('H');
$Minute=jdate('i');

$sql = "update orders set edit=0 where edit=1";
$object->myquery($sql);

$sql = "update orders set customer_id='$customer_id',device='$device',serial='$serial',problem='$problem',description='$description',service_fee_announcement='$service_fee_announcement',battery_replacement='$battery_replacement',input_cable='$input_cable',exit_tahvil_girandeh_id='$tahvil_girandeh_id',edit=1,warranty='$warranty',EntryCode='$EntryCode' where id=?";
$arr=array($did);
$object->myquery($sql,$arr);



$sql = "update problems set no_output='$no_output',connection='$connection',fuse='$fuse',burning='$burning',battery='$battery',charger='$charger',inverter='$inverter',rectifier='$rectifier',volt_high='$volt_high',volt_low='$volt_low',fan='$fan',hot='$hot' where ticket_number=?";
$arr=array($ticket_number);
$object->myquery($sql,$arr);

phpAlert("  قبض جدید با موفقیت ویرایش شد.");
?> <script> location.assign("orders.php");  </script><?php



