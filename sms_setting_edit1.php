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

    $did = $_GET['id'];

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

                    $sql = "select * from sms_setting where id=?";
                    $arr = array($did);
                    $res = $object->select($sql, $arr);
                    $url = $res[0]['url'];
                    $user = $res[0]['user'];
                    $pass = $res[0]['pass'];

                    ?>


                    <div class="col-lg-6">
                        <div class="portlet box border shadow">
                            <div class="portlet-heading">
                                <div class="portlet-title">
                                    <h3 class="title">
                                        <i class="icon-settings"></i>
                                        ویرایش وضعیت   </h3>
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
                                <form method="post" role="form" action="sms_setting_edit2.php" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label> نام URL</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="icon-user"></i>
                                                </span>
                                                <input name="url" type="text" class="form-control" value="<?php echo $url ?>">
                                            </div><!-- /.input-group -->
                                        </div><!-- /.form-group -->

                                        <div class="form-group">
                                            <label>  نام کاربری پنل پیامک</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="icon-user"></i>
                                                </span>
                                                <input name="user" type="text" class="form-control" value="<?php echo $user ?>">
                                            </div><!-- /.input-group -->
                                        </div><!-- /.form-group -->

                                        <div class="form-group">
                                            <label>  کلمه عبور پنل پیامک</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="icon-user"></i>
                                                </span>
                                                <input name="pass" type="text" class="form-control" value="<?php echo $pass ?>">
                                            </div><!-- /.input-group -->
                                        </div><!-- /.form-group -->


                                        <br/>

                                        <input type="hidden" name="id" value="<?php echo $did ?>">


                                    </div>
                                    <!-- /.form-body -->

                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-info btn-round">
                                            <i class="icon-check"></i>
                                            ثبت
                                        </button>
                                        <a href="status.php">
                                            <button type="button" class="btn btn-warning btn-round">
                                                بازگشت
                                                <i class="icon-close"></i>
                                            </button>
                                        </a>
                                    </div><!-- /.form-actions -->
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