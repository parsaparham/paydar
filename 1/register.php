<?php
include "lib/classLogin.php";
$header=new header();
$header->put_header();
?>
                    
                    <div class="col-md-12">
                        <p class="text-center m-t-30 m-b-40">
                            <i class="icon-user-following border img-circle font-xxxlg p-20"></i>
                        </p>
                        <h2 class="text-center m-b-20">ثبت نام </h2>
                        <hr>

                        <form id="advanced-form" method="post" action="register2.php">
                            <div class="form-group">
                                <label class="sr-only control-label" for="firstname">نام</label>
                                <div class="input-group round">
                                    <span class="input-group-addon">
                                        <i class="icon-note"></i>
                                    </span>
                                    <input type="text" class="form-control round" id="firstname" name="firstname" placeholder="نام">
                                </div><!-- /.input-group-->
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <label class="sr-only control-label" for="lastname">نام خانوادگی</label>
                                <div class="input-group round">
                                    <span class="input-group-addon">
                                        <i class="icon-note"></i>
                                    </span>
                                    <input type="text" class="form-control round" id="lastname" name="lastname" placeholder="نام خانوادگی" >
                                </div><!-- /.input-group-->
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <label class="sr-only control-label" for="username">نام کاربری</label>
                                <div class="input-group round">
                                    <span class="input-group-addon">
                                        <i class="icon-user"></i>
                                    </span>
                                    <input type="text" class="form-control round" id="username" name="username" placeholder="نام کاربری">
                                </div><!-- /.input-group-->
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <label class="sr-only control-label" for="mobile">تلفن همراه</label>
                                <div class="input-group round">
                                    <span class="input-group-addon">
                                        <i class="icon-user"></i>
                                    </span>
                                    <input type="text" class="form-control round" name="mobile" placeholder="09123334444" required>
                                </div><!-- /.input-group-->
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <label class="sr-only control-label" for="password">رمز عبور</label>
                                <div class="input-group round">
                                    <span class="input-group-addon">
                                        <i class="icon-key"></i>
                                    </span>
                                    <input type="password" class="form-control round ltr text-left" id="password" name="password" placeholder="رمز عبور">
                                </div><!-- /.input-group-->
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <label class="sr-only control-label" for="confirm_password">تکرار رمز عبور</label>
                                <div class="input-group round">
                                    <span class="input-group-addon">
                                        <i class="icon-key"></i>
                                    </span>
                                    <input type="password" class="form-control round ltr text-left" id="confirm_password" name="confirm_password" placeholder="تکرار رمز عبور">
                                </div><!-- /.input-group-->
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <div class="input-group round">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" id="agree" name="agree" value="agree">
                                            <a href="#">قوانین و مقررات</a>
                                            سایت را می پذیرم
                                        </label>
                                    </div><!-- /.checkbox -->
                                </div><!-- /.input-group-->
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-info btn-round btn-block" name="signup" value="Sign up">
                                    <i class="icon-check"></i>       
                                    ثبت نام
                                </button>
                            </div><!-- /.form-group -->
                        </form>

                        <hr class="m-b-30">
                        <a href="forget.php" class="btn btn-default btn-round btn-block m-b-10">
                            <i class="icon-refresh font-lg"></i> 
                            بازیابی رمز  عبور
                        </a>
                        <a href="login.php" class="btn btn-default btn-round btn-block">
                            <i class="icon-user-follow font-lg"></i>
                            ثبت نام کرده اید؟ وارد شوید!   
                        </a>
                    </div><!-- /.col-md-12 -->                    
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /.modal-page -->
        <!-- END WRAPPER -->
        
        <!-- BEGIN JS -->
        <script src="assets/plugins/jquery/dist/jquery-3.1.0.js"></script>
        <script src="assets/plugins/jquery-migrate/jquery-migrate-1.2.1.min.js"></script>
        <script src="assets/plugins/bootstrap/bootstrap5/js/bootstrap.bundle.min.js"></script>
        <script src="assets/plugins/paper-ripple/dist/PaperRipple.min.js"></script>
        <script src="assets/plugins/sweetalert2//dist/sweetalert2.min.js"></script>
        <script src="assets/plugins/iCheck/icheck.min.js"></script>
        <script src="assets/plugins/iCheck/icheck.min.js"></script>
        <script src="assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
        <script src="assets/plugins/jquery-validation/src/localization/messages_fa.js"></script>
        <script src="assets/js/core.js"></script>
        
        <!-- BEGIN PAGE JAVASCRIPT -->
        <script src="assets/js/pages/register.js"></script>
        <!-- END PAGE JAVASCRIPT -->
                
    </body>
</html>