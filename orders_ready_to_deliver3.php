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
                                      پیشخوان
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
                        $sql2="select * from users";
                        $num2=$object->num($sql2);
                        if($num2==0){echo " تاکنون هیچ  کاربری نداشته اید. ";goto a;}

                        ?>

                        <div class="portlet-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped" id="data-table">
                                    <thead>
                                    <tr>
                                        <th>   تاریخ</th>
                                        <th> ساعت</th>
                                        <th>شماره قبض</th>
                                        <th>مشتری</th>
                                        <th>دستگاه</th>
                                        <th> تحویل گیرنده  </th>
                                        <th>بیشتر </th>
                                        <th>خروج </th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    <?php
                                    $sql4="select * from orders where status_id=3 and exit_device=0 order by id desc";
                                    $res4=$object->select($sql4);
                                    $radif=0;
                                    foreach ($res4 as $row4){
                                        $radif=$radif+1;
                                        $id=$row4['id'];
                                        $ticket_number=$row4['ticket_number'];
                                        $device=$row4['device'];
                                        $date=$row4['date'];
                                        $time=$row4['time'];
                                        $problem=$row4['problem'];
                                        $customer_id=$row4['customer_id'];
                                        $agent_id=$row4['agent_id'];
                                        $status_id=$row4['status_id'];
                                        $exit_device=$row4['exit_device'];
                                        $service_fee_announcement=$row4['service_fee_announcement'];

                                    $sql5="select * from users where id=?";
                                    $arr5=array($customer_id);
                                    $row5=$object->select($sql5,$arr5);
                                    $customer=$row5[0]['name'];
                                    $agent=$row5[0]['name'];


                                    $sql5="select * from status where id=?";
                                    $arr5=array($status_id);
                                    $row5=$object->select($sql5,$arr5);
                                    $status_name=$row5[0]['name'];

                                        if($exit_device==1){$s="style=background-color:LightGray;color:black";}else{$s="";}
                                        if($service_fee_announcement==1){$service_fee_announcement="assets/custom/tik.png";}else{$service_fee_announcement="assets/custom/notTik.png";}


                                    ?>

                                        <tr>
                                            <td><?php echo $date. str_repeat('&nbsp;', 2);  ?></td>
                                            <td><?php echo $time;  ?></td>
                                            <td><?php echo $ticket_number;  ?></td>
                                            <td><?php echo $customer;  ?></td>
                                            <td><?php echo $device;  ?></td>
                                            <td><?php echo $agent;  ?></td>
                                            <td style="text-align: center"><a href="order_view_more.php?id=<?php  echo $id; ?>"><span class="accordion-item badge-primary">جزيیات</span></a></td>
                                            <td style="text-align: center"><a href="order_exit1.php?id=<?php  echo $id; ?>"><span class="accordion-item badge-primary">خروج</span></a></td>
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