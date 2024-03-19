<?php
session_start();
include("lib/classDashboard.php");
include("lib/connect.php");
include("lib/jdf.php");


$object = new class_parent();
$mobile = $_SESSION['mobile'];
$sql = "select * from users where mobile=?";
$arr = array($mobile);
$res = $object->select($sql, $arr);
$per_id = $res[0]['per_id'];
if ($per_id == 3) {

    $did=$_GET['id'];


    $date = jdate('Y/n/d');


    $header = new header();
    $header->put_header();
    ?>

    <!-- BEGIN WRAPPER -->
    <div id="wrapper">


        <!-- BEGIN SIDEBAR -->
        <?php
        $sidbar = new sidbar();
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
                        <div class="breadcrumb-left">
                            <?php echo jdate('l,Y/m/d'); ?>
                            <i class="icon-calendar"></i>
                        </div><!-- /.breadcrumb-left -->
                    </div><!-- /.breadcrumb-box -->
                </div><!-- /.col-md-12 -->
                <!-- END BREADCRUMB -->

                <div class="col-md-12">


                    <?php

                       $adminButtons=new adminButtons();
                      $adminButtons->put_adminButtons();

                    ?>


                    <div class="col-lg-6">
                        <div class="portlet box border shadow">
                            <div class="portlet-heading">
                                <div class="portlet-title">
                                    <h3 class="title">
                                        <i class="icon-settings"></i>
                                       جزيیات قبض </h3>
                                </div><!-- /.portlet-title -->
                                <div class="buttons-box">
                                    <a class="btn btn-sm btn-default btn-round btn-fullscreen" rel="tooltip"
                                       title="تمام صفحه" href="#">
                                        <i class="icon-size-fullscreen"></i>
                                    </a>
                                    <a class="btn btn-sm btn-default btn-round btn-collapse" rel="tooltip"
                                       title="کوچک کردن" href="#">
                                        <i class="icon-arrow-up"></i>
                                    </a>
                                </div><!-- /.buttons-box -->
                            </div><!-- /.portlet-heading -->

                            <?php
                            $sql="select * from orders where id=?";
                            $arr=array($did);
                            $res=$object->select($sql,$arr);
                            $customer_id=$res[0]['customer_id'];
                            $ticket_number=$res[0]['ticket_number'];
                            $device=$res[0]['device'];
                            $serial=$res[0]['serial'];
                            $problem=$res[0]['problem'];
                            $description=$res[0]['description'];
                            $service_fee_announcement=$res[0]['service_fee_announcement'];
                            $battery_replacement=$res[0]['battery_replacement'];
                            	$input_cable=$res[0]['input_cable'];
                                $agent_id=$res[0]['agent_id'];
                                $status_id=$res[0]['status_id'];
                                $agent_report=$res[0]['agent_report'];
                                $exit_device=$res[0]['exit_device'];
                                $exit_date=$res[0]['exit_date'];
                                $exit_time=$res[0]['exit_time'];
                                $exit_person=$res[0]['exit_person'];
                                $bill_number=$res[0]['bill_number'];
                                $exit_agent_id=$res[0]['exit_agent_id'];
                                $exit_tahvil_girandeh_id=$res[0]['exit_tahvil_girandeh_id'];

                            $sql1="select * from problems where ticket_number=?";
                            $arr1=array($ticket_number);
                            $res1=$object->select($sql1,$arr1);
                            $no_output=$res1[0]['no_output'];
                            $connection=$res1[0]['connection'];
                            $fuse=$res1[0]['fuse'];
                            $burning=$res1[0]['burning'];
                            $battery=$res1[0]['battery'];
                            $charger=$res1[0]['charger'];
                            $inverter=$res1[0]['inverter'];
                            $rectifier=$res1[0]['rectifier'];
                            $volt_high=$res1[0]['volt_high'];
                            $volt_low=$res1[0]['volt_low'];
                            $fan=$res1[0]['fan'];
                            $hot=$res1[0]['hot'];



/*                            if(isset($no_output)){$no_output="checked";}else{$no_output="";}
                                if(isset($connection)){$connection="checked";}else{$connection="";}
                                if(isset($fuse)){$fuse="checked";}else{$fuse="";}
                                if(isset($burning)){$burning="checked";}else{$burning="";}
                                if(isset($battery)){$batteryt="checked";}else{$battery="";}
                                if(isset($charger)){$charger="checked";}else{$charger="";}
                                if(isset($inverter)){$inverter="checked";}else{$inverter="";}
                                if(isset($rectifier)){$no_output="checked";}else{$no_output="";}
                                if(isset($volt_high)){$volt_high="checked";}else{$volt_high="";}
                                if(isset($volt_low)){$volt_low="checked";}else{$volt_low="";}
                                if(isset($fan)){$fan="checked";}else{$fan="";}
                                if(isset($hot)){$hot="checked";}else{$hot="";}*/

                            if($no_output==1){$no_output="checked";}else{$no_output="";}
                            if($connection==1){$connection="checked";}else{$connection="";}
                            if($fuse==1){$fuse="checked";}else{$fuse="";}
                            if($burning==1){$burning="checked";}else{$burning="";}
                            if($battery==1){$battery="checked";}else{$battery="";}
                            if($charger==1){$charger="checked";}else{$charger="";}
                            if($inverter==1){$inverter="checked";}else{$inverter="";}
                            if($rectifier==1){$rectifier="checked";}else{$rectifier="";}
                            if($volt_high==1){$volt_high="checked";}else{$volt_high="";}
                            if($volt_low==1){$volt_low="checked";}else{$volt_low="";}
                            if($fan==1){$fan="checked";}else{$fan="";}
                            if($hot==1){$hot="checked";}else{$hot="";}



                            $sql="select * from users where id=?";
                            $arr=array($customer_id);
                            $res=$object->select($sql,$arr);
                            $customer_name=$res[0]['name'];

                            $sql="select * from users where id=?";
                            $arr=array($exit_tahvil_girandeh_id);
                            $res=$object->select($sql,$arr);
                            $tahvil_girandeh_name=$res[0]['name'];

                            $sql="select * from users where id=?";
                            $arr=array($agent_id);
                            $res=$object->select($sql,$arr);
                            $agent_name=$res[0]['name'];

                            ?>

                            <div class="portlet-body">
                                <form method="post" role="form" action="order_add2.php"
                                      enctype="multipart/form-data">
                                    <div class="form-body">

                                            <div class="portlet-body">
                                                <div class="form-group">
                                                    <label> شماره قیض   </label>
                                                    <div class="col-sm-12">
                                                        <input name="ticket_number" class="form-control" value="<?php echo $ticket_number;  ?> " disabled>
                                                    </div>
                                                </div><!-- /.form-group -->
                                            </div>

                                        <div class="portlet-body">
                                            <div class="form-group">
                                                <label> مشتری   </label>
                                                <div class="col-sm-12">
                                                    <input name="customer" class="form-control" value="<?php echo $customer_name;  ?> " disabled>
                                                </div>
                                            </div><!-- /.form-group -->
                                        </div>


                                        <div class="form-group row">
                                            <label> شرح دستگاه</label>
                                            <div class="col-sm-12">
                                                <textarea name="device" class="form-control" rows="2" disabled><?php echo $description ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label> سریال دستگاه</label>
                                            <div class="col-sm-12">
                                                <input name="serial" class="form-control" value="<?php echo $serial ?> " disabled>
                                            </div>
                                        </div>


                                            <label> ایرادات مطرح شده</label>



                                        <div class="input-group">
                                            <div class="col-sm-6">
                                                <label>
                                                    <input name="no_output"   type="checkbox" <?php echo $no_output ?> disabled >
                                                    <?php echo $no_output ?>
                                                    خروجی ندارد
                                                </label>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>
                                                    <input name="connection"  type="checkbox" <?php echo $connection ?> disabled >
                                                    <?php echo $connection ?>
                                                    اتصالی دارد
                                                </label>
                                            </div>
                                        </div>

                                        <div class="input-group">
                                            <div class="col-sm-6">
                                                <label>
                                                    <input name="fuse"   type="checkbox" <?php echo $fuse ?> disabled >
                                                    فیوز ورودی را قطع می کند
                                                </label>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>
                                                    <input name="burning" type="checkbox" <?php echo $burning ?> disabled>
                                                     بوی سوختگی می دهد
                                                </label>
                                            </div>
                                        </div>

                                        <div class="input-group">
                                            <div class="col-sm-6">
                                                <label>
                                                    <input name="battery"  type="checkbox" <?php echo $battery ?> disabled >
                                                    باتری خراب است
                                                </label>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>
                                                    <input name="charger"  type="checkbox" <?php echo $charger ?> disabled >
                                                    شارژر خراب است
                                                </label>
                                            </div>
                                        </div>

                                        <div class="input-group">
                                            <div class="col-sm-6">
                                                <label>
                                                    <input name="inverter"   type="checkbox" <?php echo $inverter ?> disabled>
                                                    اینورتر خراب است
                                                </label>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>
                                                    <input name="rectifier"  type="checkbox" <?php echo $rectifier ?> disabled  >
                                                    رکتیفایر خراب است
                                                </label>
                                            </div>
                                        </div>

                                        <div class="input-group">
                                            <div class="col-sm-6">
                                                <label>
                                                    <input name="volt_high"   type="checkbox" <?php echo $volt_high ?> disabled>
                                                    ولتاژ خروجی بالا است
                                                </label>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>
                                                    <input name="volt_low"  type="checkbox" <?php echo $volt_low ?> disabled >
                                                    ولتاژ خروجی پایین است
                                                </label>
                                            </div>
                                        </div>

                                        <div class="input-group">
                                            <div class="col-sm-6">
                                                <label>
                                                    <input name="fan"  type="checkbox" <?php echo $fan ?> disabled >
                                                    فن خراب است
                                                </label>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>
                                                    <input name="hot"  type="checkbox" <?php echo $hot ?> disabled >
                                                    دستگاه داغ میکند
                                                </label>
                                            </div>
                                        </div>









                                        <div class="form-group row">
                                            <label> سایر ایرادات </label>
                                            <div class="col-sm-12">
                                                <textarea name="problem" class="form-control" rows="3" disabled><?php echo $problem?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label>توضیحات </label>
                                            <div class="col-sm-12">
                                                <textarea name="description" class="form-control" rows="4" disabled><?php echo $description?></textarea>
                                            </div>
                                        </div>

                                        <br/>

                                    <!-- Input Group  -->
                                    <div class="input-group">
                                        <div class="col-sm-6">
                                        <label>
                                            <input name="service_fee_announcement" value="enable" type="radio" <?php if($service_fee_announcement==1){echo "checked";}else{echo "";}?> disabled>
                                            اعلام هزینه شود
                                        </label>
                                        </div>
                                        <div class="col-sm-6">
                                        <label>
                                            <input name="service_fee_announcement" value="disable" type="radio" <?php if($service_fee_announcement==0){echo"checked";}else{echo "";}?> disabled>
                                            اعلام هزینه نشود
                                        </label>
                                        </div>
                                    </div>
                                    <!-- /Input Group  -->

                                        <hr/>

                                    <!-- Input Group  -->
                                    <div class="input-group">
                                        <div class="col-sm-6">
                                        <label>
                                            <input name="battery_replacement" value="enable"  type="radio" <?php if($battery_replacement==1){echo "checked";}?> disabled>
                                            تعویض باتری انجام گردد
                                        </label>
                                        </div>
                                        <div class="col-sm-6">
                                        <label>
                                            <input name="battery_replacement" value="disable"  type="radio" <?php if($battery_replacement==0){echo "checked";}?> disabled>
                                            تعویض باتری انجام نگردد
                                        </label>
                                        </div>
                                    </div>
                                    <!-- /Input Group  -->

                                        <hr/>

                                    <!-- Input Group  -->
                                    <div class="input-group">
                                        <div class="col-sm-6">
                                        <label>
                                            <input name="input_cable" value="enable"   type="radio" <?php if($input_cable==1){echo "checked";} ?> disabled>
                                            کابل ورودی دارد
                                        </label>
                                        </div>
                                        <div class="col-sm-6">
                                        <label>
                                            <input name="input_cable"  value="disable"  type="radio" <?php if($input_cable==0){echo "checked";} ?> disabled>
                                            کابل ورودی ندارد
                                        </label>
                                        </div>
                                    </div>
                                    <!-- /Input Group  -->

                                    <hr/>


                                        <div class="form-group row">
                                            <label> همکار تحویل گیرنده </label>
                                            <div class="col-sm-12">
                                                <input name="tahvil_girandeh" class="form-control" value="<?php echo $tahvil_girandeh_name ?> " disabled>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label> صادر کننده قبض ورود </label>
                                            <div class="col-sm-12">
                                                <input name="exit_agent" class="form-control" value="<?php echo $agent_name ?> " disabled>
                                            </div>
                                        </div>

                                    <div class="form-actions">
                                        <a href="orders.php">
                                            <button type="button" class="btn btn-warning btn-round">
                                                بازگشت
                                                <i class="icon-close"></i>
                                            </button>
                                        </a>
                                    </div><!-- /.form-actions -->
                                    </div><!-- /.form-body -->
                                </form>


                            </div><!-- /.portlet-body -->
                        </div><!-- /.portlet -->

                    </div><!-- /.col-lg-6 -->


                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /#page-content -->
        <!-- END PAGE CONTENT -->

    </div><!-- /#wrapper -->
    <!-- END WRAPPER -->

    <?php
    $footer = new footer();
    $footer->put_footer();
} else {
    ?>
    <script> location.assign("login.php");  </script> <?php

}
?>