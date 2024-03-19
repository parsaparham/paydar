<?php
session_start();
include("lib/classDashboard.php");
include ("lib/connect.php");
include ("lib/jdf.php");

$object=new class_parent();
$mobile=$_SESSION['mobile'];
$sql="select * from users where mobile=?";
$arr=array($mobile);
$res=$object->select($sql,$arr);
$per_id=$res[0]['per_id'];
if($per_id==3){

    $header=new header();
    $header->put_header();


    $date=jdate('Y/m/d');

    $day_number = jdate('j');
    $month_number = jdate('n');
    $year_number = jdate('y');
    $date = $year_number . "/" . $month_number . "/" . $day_number;

    $day=jdate('l');

    ?>

    <!-- BEGIN WRAPPER -->
    <div id="wrapper">

        <!-- BEGIN SIDEBAR -->
        <?php
        $sidbar=new sidbar();
        $sidbar->put_sidebar();
        ?>
        <!-- END SIDEBAR -->


        <!-- BEGIN PAGE CONTENT -->
        <div id="page-content">
            <div class="row">
                <!-- BEGIN BREADCRUMB -->
                <div class="col-md-12">
                    <div class="breadcrumb-box border shadow">
                        <ul class="breadcrumb">
                            <li><a href="orders.php">پیشخوان</a></li>
                        </ul>
                        <div  class="breadcrumb-left">
                            <?php //echo jdate('l,Y/m/d G:i');  ?>
                            <?php echo jdate('l,Y/m/d');  ?>
                            <i class="icon-calendar"></i>
                        </div><!-- /.breadcrumb-left -->
                    </div><!-- /.breadcrumb-box -->
                </div><!-- /.col-md-12 -->
                <!-- END BREADCRUMB -->

                <?php

                $adminButtons=new adminButtons();
                $adminButtons->put_adminButtons();

                ?>

                <div class="col-lg-12">
                    <div class="portlet box border shadow">
                        <div class="portlet-heading">
                            <div class="portlet-title">
                                <h3 class="title">
                                    <i class="icon-frane"></i>
                                      تاریخچه
                                </h3>
                            </div><!-- /.portlet-title -->
                            <div class="buttons-box">

                                <div class="code-modal hide">

                                </div>
                                <a class="btn btn-sm btn-default btn-round btn-fullscreen" rel="tooltip" title="تمام صفحه" href="#">
                                    <i class="icon-size-fullscreen"></i>
                                </a>
                                <a class="btn btn-sm btn-default btn-round btn-collapse" rel="tooltip" title="کوچک کردن" href="#">
                                    <i class="icon-arrow-up"></i>
                                </a>
                            </div><!-- /.buttons-box -->
                        </div><!-- /.portlet-heading -->


                        <?php
                        $sql2="select * from history";
                        $num2=$object->num($sql2);
                        if($num2==0){echo " تاکنون هیچ  تاریخچه ای نداشته اید. ";goto a;}

                        ?>

                        <div class="portlet-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped" id="data-table">
                                    <thead>
                                        <tr>
                                            <th> تاریخ</th>
                                            <th> ساعت</th>
                                            <th>شماره قبض</th>
                                            <th>مشتری</th>
                                            <th>دستگاه</th>
                                            <th>سریال</th>
                                            <th> وضعیت</th>
                                            <th> کد ورود</th>

                                        </tr>
                                    </thead>
                                  


                                    <?php
                                    $sql4="select * from history ORDER BY id desc";
                                    $res4=$object->select($sql4);
                                    foreach ($res4 as $row4){
                                        $id=$row4['id'];
                                        $ticket_number=$row4['ticket_number'];
                                        $date=$row4['date'];
                                        $time=$row4['time'];
                                        $status_id=$row4['status_id'];
                                        $description=$row4['description'];
                                        $agent_id=$row4['agent_id'];
                                       

                                           
                                    $sql5="select * from orders where ticket_number=? ";
                                    $arr5=array($ticket_number);
                                    $row5=$object->select($sql5,$arr5);
                                    $num3=$object->num($sql5,$arr5);
                                   // echo "<br/>".$num3;
                                    if(!isset($row5[0]['customer_id'])){$customer="";}
                                    elseif($row5[0]['customer_id']!=0){
                                        $customer_id=$row5[0]['customer_id'];
                                        $device=$row5[0]['device'];
                                        $status_id=$row5[0]['status_id'];
                                        $serial=$row5[0]['serial'];
                                        if(isset($row5[0]['EntryCode'])){$EntryCode=$row5[0]['EntryCode'];}else{$EntryCode="";}
                                        

                                        $sql6="select * from users where id=?";
                                        $arr6=array($customer_id);
                                        $row6=$object->select($sql6,$arr6);
                                        $customer=$row6[0]['name'];

                                        $sql6="select * from status where id=?";
                                        $arr6=array($status_id);
                                        $row6=$object->select($sql6,$arr6);
                                        $status=$row6[0]['name'];

                                    
    
                                    }

                                    //$EntryCode=$row5[0]['EntryCode'];


                                    ?>
                                      <tbody>
                                    <tr>
                                        <td><?php echo $date; ?></td>
                                        <td><?php echo $time; ?></td>
                                        <td><?php echo $ticket_number; ?></td>
                                       <td><?php echo $customer; ?></td> 
                                        <td><?php echo $device; ?></td>
                                        <td><?php echo $serial; ?></td>
                                        <td><?php echo $status; ?></td>
                                        <td><?php echo $EntryCode; ?></td>
                                    </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div><!-- /.table-responsive -->
                        </div><!-- /.portlet-body -->
                    </div><!-- /.portlet -->
                </div><!-- /.col-lg-12 -->

                <?php
                a:;
                ?>

            </div><!-- /.col-md-12 -->





        </div><!-- /.row -->
    </div><!-- /#page-content -->
    <!-- END PAGE CONTENT -->

    </div><!-- /#wrapper -->
    <!-- END WRAPPER -->






    <!--  For Search Box   END  -->

    <?php
    $footer=new footer();
    $footer->put_footer();
}
else{
    ?>  <script> location.assign("../index.php");  </script> <?php

}
?>