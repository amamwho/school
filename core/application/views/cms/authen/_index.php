<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>CMS | School</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="author"/>
        <base href="<?= base_url(); ?>"/>

        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
        <link href="assets/cms/metronic/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/cms/metronic/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/cms/metronic/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link rel="stylesheet" type="text/css" href="assets/cms/metronic/plugins/select2/select2.css"/>
        <link rel="stylesheet" type="text/css" href="assets/cms/metronic/plugins/select2/select2-metronic.css"/>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME STYLES -->
        <link href="assets/cms/metronic/css/style-metronic.css" rel="stylesheet" type="text/css"/>
        <link href="assets/cms/metronic/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="assets/cms/metronic/css/style-responsive.css" rel="stylesheet" type="text/css"/>
        <link href="assets/cms/metronic/css/plugins.css" rel="stylesheet" type="text/css"/>
        <link href="assets/cms/metronic/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
        <link href="assets/cms/metronic/css/pages/login.css" rel="stylesheet" type="text/css"/>
        <link href="assets/cms/metronic/css/custom.css" rel="stylesheet" type="text/css"/>
        <!-- END THEME STYLES -->
        <link rel="shortcut icon" href="favicon.ico"/>
    </head>
    <!-- BEGIN BODY -->
    <body class="login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <h1>
                <span style="color: #fff;">CMS | </span><span style="color: #FF3333">School</span>
            </h1>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form" method="post">
                <h3 class="form-title">เข้าสู่ระบบ</h3>
                <?php if(isset($fail) and $fail == true) { ?>
                    <div class="alert alert-danger">
                        <button class="close" data-close="alert"></button>
                        <span>Username หรือ Password ไม่ถูกต้อง</span>
                        <br>
                        <span>กรุณาลองใหม่อีกครั้ง</span>
                    </div>
                <?php } ?>
                <div class="form-group <?= (isset($fail) and $fail == true) ? 'has-error' : ''; ?>">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username"/>
                    </div>
                </div>
                <div class="form-group <?= (isset($fail) and $fail == true) ? 'has-error' : ''; ?>">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/>
                    </div>
                </div>
                <div class="form-actions" style="border-bottom: none;">
                    <?/*<label class="checkbox"><input type="checkbox" name="remember" value="1"/> จดจำ </label>*/?>
                    <button type="submit" class="btn green pull-right">
                        ยืนยัน <i class="m-icon-swapright m-icon-white"></i>
                    </button>
                </div>
            </form>
            <!-- END LOGIN FORM -->
        </div>
        <!-- END LOGIN -->
        <!-- BEGIN COPYRIGHT -->
        <div class="copyright">
            2014 &copy; Metronic. Admin Dashboard Template.
        </div>
        <!-- END COPYRIGHT -->
        <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        <!-- BEGIN CORE PLUGINS -->
        <!--[if lt IE 9]>
                <script src="assets/cms/metronic/plugins/respond.min.js"></script>
                <script src="assets/cms/metronic/plugins/excanvas.min.js"></script> 
                <![endif]-->
        <script src="assets/cms/metronic/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
        <script src="assets/cms/metronic/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
        <script src="assets/cms/metronic/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/cms/metronic/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="assets/cms/metronic/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/cms/metronic/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/cms/metronic/plugins/jquery.cokie.min.js" type="text/javascript"></script>
        <script src="assets/cms/metronic/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="assets/cms/metronic/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="assets/cms/metronic/plugins/select2/select2.min.js"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets/cms/metronic/scripts/core/app.js" type="text/javascript"></script>
        <script src="assets/cms/metronic/scripts/custom/login.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <script>
            jQuery(document).ready(function() {     
                App.init();
                //Login.init();
            });
        </script>
        <!-- END JAVASCRIPTS -->
    </body>
    <!-- END BODY -->
</html>