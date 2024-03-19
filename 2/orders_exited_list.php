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
                                    دستگاههای خارج شده
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
                        $sql2="select * from orders WHERE exit_device=1";
                        $num2=$object->num($sql2);
                        if($num2==0){echo "شما تاکنون هیچ دستگاهی خارج نشده است. ";goto a;}

                        ?>

                        <div class="portlet-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped" id="data-table">
                                    <thead>
                                    <tr>
                                        <th> شماره قبض  </th>
                                        <th>تاریخ خروج </th>
                                        <th>ساعت خروج  </th>
                                        <th>نام مشتری </th>
                                        <th>نام کالا </th>
                                        <th>شماره فاکتور</th>
                                        <th>تحویل گیرنده</th>
                                        <th>تحویل دهنده</th>
                                        <th> صادر کننده قبض خروج</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $sql4="select * from orders where exit_device=1 order by exit_date desc";
                                    $res4=$object->select($sql4);
                                    $radif=0;
                                    foreach ($res4 as $row4){
                                        $radif=$radif+1;
                                        $exit_date=$row4['exit_date'];
                                        $exit_time=$row4['exit_time'];
                                        $ticket_number=$row4['ticket_number'];
                                        $customer_id=$row4['customer_id'];
                                        $exit_agent_id=$row4['exit_agent_id'];
                                        $device=$row4['device'];
                                        $exit_person=$row4['exit_person'];
                                        $bill_number=$row4['bill_number'];
                                        $exit_tahvil_dehandeh_id=$row4['exit_tahvil_dehandeh_id'];


                                    $sql5="select * from users where id=?";
                                    $arr5=array($customer_id);
                                    $row5=$object->select($sql5,$arr5);
                                    $customer=$row5[0]['name'];

                                    $sql5="select * from users where id=?";
                                    $arr5=array($exit_agent_id);
                                    $row5=$object->select($sql5,$arr5);
                                    $exit_agent=$row5[0]['name'];

                                    $sql5="select * from users where id=?";
                                    $arr5=array($exit_tahvil_dehandeh_id);
                                    $row5=$object->select($sql5,$arr5);
                                    $exit_tahvil_dehandeh_name=$row5[0]['name'];



                                    ?>

                                        <tr>
                                            <td><?php echo $ticket_number;  ?></td>
                                            <td><?php echo $exit_date;  ?></td>
                                            <td><?php echo $exit_time;  ?></td>
                                            <td><?php echo $customer;  ?></td>
                                            <td><?php echo $device;  ?></td>
                                            <td><?php echo $bill_number;  ?></td>
                                            <td><?php echo $exit_person;  ?></td>
                                            <td><?php echo $exit_tahvil_dehandeh_name;  ?></td>
                                            <td><?php echo $exit_agent;  ?></td>

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