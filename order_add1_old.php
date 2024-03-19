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
                                        ورود دستگاه </h3>
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
                            <div class="portlet-body">
                                <form method="post" role="form" action="order_add2.php"
                                      enctype="multipart/form-data">
                                    <div class="form-body">

                                            <div class="portlet-body">
                                                <div class="form-group">
                                                    <label>انتخاب مشتری </label>
                                                    <select class="form-control select2" name="customer">
                                                        <?php
                                                        $sql="select * from users where per_id!=3 order by id desc ";
                                                        $res=$object->select($sql);
                                                        foreach ($res as $row){
                                                            $name=$row['name'];

                                                        ?>
                                                        <option><?php echo $name?></option>
                                                    <?php }  ?>
                                                    </select>
                                                </div><!-- /.form-group -->
                                            </div>


                                        <div class="form-group row">
                                            <label> شرح دستگاه</label>
                                            <div class="col-sm-12">
                                                <textarea name="device" class="form-control" rows="2" placeholder=" "></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label> سریال دستگاه</label>
                                            <div class="col-sm-12">
                                                <input name="serial" class="form-control" placeholder=" "></input>
                                            </div>
                                        </div>


                                            <label> ایرادات مطرح شده</label>



                                        <div class="input-group">
                                            <div class="col-sm-6">
                                                <label>
                                                    <input name="no_output"   type="checkbox" >
                                                    خروجی ندارد
                                                </label>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>
                                                    <input name="connection"  type="checkbox" >
                                                    اتصالی دارد
                                                </label>
                                            </div>
                                        </div>

                                        <div class="input-group">
                                            <div class="col-sm-6">
                                                <label>
                                                    <input name="fuse"   type="checkbox" >
                                                    فیوز ورودی را قطع می کند
                                                </label>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>
                                                    <input name="burning" type="checkbox" >
                                                     بوی سوختگی می دهد
                                                </label>
                                            </div>
                                        </div>

                                        <div class="input-group">
                                            <div class="col-sm-6">
                                                <label>
                                                    <input name="battery"  type="checkbox" >
                                                    باتری خراب است
                                                </label>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>
                                                    <input name="charger"  type="checkbox" >
                                                    شارژر خراب است
                                                </label>
                                            </div>
                                        </div>

                                        <div class="input-group">
                                            <div class="col-sm-6">
                                                <label>
                                                    <input name="inverter"   type="checkbox" >
                                                    اینورتر خراب است
                                                </label>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>
                                                    <input name="rectifier"  type="checkbox"  >
                                                    رکتیفایر خراب است
                                                </label>
                                            </div>
                                        </div>

                                        <div class="input-group">
                                            <div class="col-sm-6">
                                                <label>
                                                    <input name="volt_high"   type="checkbox" >
                                                    ولتاژ خروجی بالا است
                                                </label>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>
                                                    <input name="volt_low"  type="checkbox" >
                                                    ولتاژ خروجی پایین است
                                                </label>
                                            </div>
                                        </div>

                                        <div class="input-group">
                                            <div class="col-sm-6">
                                                <label>
                                                    <input name="fan"  type="checkbox" >
                                                    فن خراب است
                                                </label>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>
                                                    <input name="hot"  type="checkbox" >
                                                    دستگاه داغ میکند
                                                </label>
                                            </div>
                                        </div>









                                        <div class="form-group row">
                                            <label> سایر ایرادات </label>
                                            <div class="col-sm-12">
                                                <textarea name="problem" class="form-control" rows="3" placeholder=" "></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label>توضیحات </label>
                                            <div class="col-sm-12">
                                                <textarea name="description" class="form-control" rows="4" placeholder=" "></textarea>
                                            </div>
                                        </div>

                                        <br/>

                                        <!-- Input Group  -->
                                        <div class="input-group">
                                            <div class="col-sm-6">
                                                <label>
                                                    <input name="warranty" value="enable"  type="radio" >
                                                      گارانتی دارد
                                                </label>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>
                                                    <input name="warranty" value="disable" type="radio" checked>
                                                    گارانتی ندارد
                                                </label>
                                            </div>
                                        </div>
                                        <!-- /Input Group  -->

                                        <br/>

                                    <!-- Input Group  -->
                                    <div class="input-group">
                                        <div class="col-sm-6">
                                        <label>
                                            <input name="service_fee_announcement" value="enable"  type="radio" >
                                            اعلام هزینه شود
                                        </label>
                                        </div>
                                        <div class="col-sm-6">
                                        <label>
                                            <input name="service_fee_announcement" value="disable" type="radio" checked>
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
                                            <input name="battery_replacement" value="enable"  type="radio" >
                                            تعویض باتری انجام گردد
                                        </label>
                                        </div>
                                        <div class="col-sm-6">
                                        <label>
                                            <input name="battery_replacement" value="disable" type="radio" checked>
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
                                            <input name="input_cable" value="enable"  type="radio" >
                                            کابل ورودی دارد
                                        </label>
                                        </div>
                                        <div class="col-sm-6">
                                        <label>
                                            <input name="input_cable" value="disable" type="radio" checked>
                                            کابل ورودی ندارد
                                        </label>
                                        </div>
                                    </div>
                                    <!-- /Input Group  -->

                                        <hr/>

                                        <div class="portlet-body">
                                            <div class="form-group">
                                                <label> همکار تحویل گیرنده </label>
                                                <select class="form-control select2" name="tahvil_girandeh">
                                                    <?php
                                                    $sql="select * from users where per_id=3 ";
                                                    $res=$object->select($sql);
                                                    foreach ($res as $row){
                                                        $name=$row['name'];

                                                        ?>
                                                        <option><?php echo $name?></option>
                                                    <?php }  ?>
                                                </select>
                                            </div><!-- /.form-group -->
                                        </div>

                                        <hr/>


                                        <div class="form-group row">
                                            <label> کد ورود </label>
                                            <div class="col-sm-12">
                                                <input name="EntryCode" class="form-control" placeholder=" "></input>
                                            </div>
                                        </div>



                                    <hr/>

                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-info btn-round">
                                            <i class="icon-check"></i>
                                            ثبت
                                        </button>
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