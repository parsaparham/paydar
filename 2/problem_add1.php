<?php
session_start();
include("lib/classDashboard.php");
include("lib/connect.php");
include ("lib/jdf.php");


$object=new class_parent();
$mobile=$_SESSION['mobile'];
$sql="select * from users where mobile=?";
$arr=array($mobile);
$res=$object->select($sql,$arr);
$per_id=$res[0]['per_id'];
if($per_id==3){



$date=jdate('Y/n/d');


$header=new header();
$header->put_header();
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
                                <li><a href="dashboard.php">پیشخوان</a></li>
                            </ul>
                            <div  class="breadcrumb-left">
                                 <?php echo jdate('l,Y/m/d');  ?>
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
ایجاد ایراد پیش فرض جدید                                        </h3>
                                    </div><!-- /.portlet-title -->
                                    <div class="buttons-box">
                                        <a class="btn btn-sm btn-default btn-round btn-fullscreen" rel="tooltip" title="تمام صفحه" href="#">
                                            <i class="icon-size-fullscreen"></i>
                                        </a>
                                        <a class="btn btn-sm btn-default btn-round btn-collapse" rel="tooltip" title="کوچک کردن" href="#">
                                            <i class="icon-arrow-up"></i>
                                        </a>
                                    </div><!-- /.buttons-box -->
                                </div><!-- /.portlet-heading -->
                                <div class="portlet-body">
                                    <form method="post" role="form" action="problem_add2.php" enctype="multipart/form-data">
                                        <div class="form-body">



                                            <div class="form-group">
                                                <label> نام ایراد  </label>
                                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="icon-user"></i>
                                                </span>
                                                    <input name="name" type="text" class="form-control" placeholder="  ">
                                                </div><!-- /.input-group -->
                                            </div><!-- /.form-group -->




                                        </div><!-- /.form-body -->

                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-info btn-round">
                                                <i class="icon-check"></i>
                                                ثبت
                                            </button>
                                            <a href="problems.php"><button type="button" class="btn btn-warning btn-round">
                                                بازگشت
                                                <i class="icon-close"></i>
                                                </button></a>
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
$footer=new footer();
$footer->put_footer();
}
else{
    ?>  <script> location.assign("login.php");  </script> <?php

}
?>