<?php
session_start();
include("lib/connect.php");
include ("lib/jdf.php");

require 'kavenegar/vendor/autoload.php';
use Kavenegar\KavenegarApi;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;

$object=new class_parent();
$mobile=$_SESSION['mobile'];
$sql="select * from users where mobile=?";
$arr=array($mobile);
$res=$object->select($sql,$arr);
$exit_agent_id=$res[0]['id'];

$id=$_POST['id'];

echo $exit_agent_id;


$ticket_number= $_POST['ticket_number'];
$bill_number= $_POST['bill_number'];
$exit_person= $_POST['exit_person'];
$tahvil_dehandeh= $_POST['tahvil_dehandeh'];
$customer_name=$_POST['customer'];

$sql="select * from users where name=?";
$arr=array($tahvil_dehandeh);
$res=$object->select($sql,$arr);
$exit_tahvil_dehandeh_id=$res[0]['id'];


$sql="select * from orders where ticket_number=?";
$arr=array($ticket_number);
$row=$object->select($sql,$arr);
$customer_id=$row[0]['id'];
$EntryCode=$row[0]['EntryCode'];

$time=jdate('H:i:s');
$date=jdate('Y/m/d');


$sql="select * from status order by priority desc limit 1";
$row=$object->select($sql);
$status_id=$row[0]['id'];


$sql="select * from users where name=?";
$arr=array($customer_name);
$row=$object->select($sql,$arr);
$customer_mobile=$row[0]['mobile'];





$sql = "update orders set exit_device=1, exit_date='$date',exit_time='$time',exit_person='$exit_person',bill_number='$bill_number',status_id='$status_id',exit_agent_id='$exit_agent_id',exit_tahvil_dehandeh_id='$exit_tahvil_dehandeh_id' where id=?";
$arr = array($id);
$object->myquery($sql, $arr);

$sql = "INSERT INTO history (date,time,ticket_number,status_id,description,agent_id) VALUES ('$date','$time','$ticket_number','$status_id','$description','$exit_agent_id')";
$object->myquery($sql);


if(isset($_POST['sms'])){
    $sms=1;

        $api = new KavenegarApi("43413032427656312F357266574132666549623939627957765263774361434746316E784874614D6B53413D");
        $sender = "9981801848";
        $message =$customer_name.str_repeat(' ', 1)."عزیز! دستگاه شما  به کد ورود ".$EntryCode."  از واحدفنی پایدارسازان خارج و تحویل".str_repeat(' ', 1).$exit_person.str_repeat(' ', 1)."گردید ";
        $message=$message."لغو 11";
        $receptor = array($customer_mobile);
        $result = $api->Send($sender,$receptor,$message);
        if($result){
            var_dump($result);
        }



}else{
    $sms=0;}


phpAlert("قبض خروج با موقیت ایجاد شد.");
?> <script> location.assign("orders.php");  </script> <?php




