<?php

include("libsms/nusoap.php");



$name = $_POST['name'];

 $username="root";
$password='';
 $dsn="mysql:host=localhost;dbname=tavantek";

$db=new PDO($this->dsn,$this->username,$this->password);


    $sql = "ALTER TABLE problems ADD $name varchar(255);";
$stmt=mysqli_prepare($sql);
$stmt->execute();



phpAlert("ایراد مورد نظر موفقیت ایجاد شد.");
?> <script> location.assign("problems.php");  </script> <?php



