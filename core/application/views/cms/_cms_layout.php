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
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="author"/>
        <base href="<?= base_url(); ?>"/>
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
        <link href="assets/cms/metronic/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/cms/metronic/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/cms/metronic/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
        <link href="assets/cms/metronic/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
        <link href="assets/cms/metronic/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css"/>
        <link href="assets/cms/metronic/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
        <link href="assets/cms/metronic/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css"/>
        <link href="assets/cms/metronic/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css"/>
        <!-- END PAGE LEVEL PLUGIN STYLES -->
        <!-- BEGIN THEME STYLES -->
        <link href="assets/cms/metronic/css/style-metronic.css" rel="stylesheet" type="text/css"/>
        <link href="assets/cms/metronic/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="assets/cms/metronic/css/style-responsive.css" rel="stylesheet" type="text/css"/>
        <link href="assets/cms/metronic/css/plugins.css" rel="stylesheet" type="text/css"/>
        <link href="assets/cms/metronic/css/pages/tasks.css" rel="stylesheet" type="text/css"/>
        <link href="assets/cms/metronic/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
        <link href="assets/cms/metronic/css/print.css" rel="stylesheet" type="text/css" media="print"/>
        <link href="assets/cms/metronic/css/custom.css" rel="stylesheet" type="text/css"/>
        <!-- END THEME STYLES -->
        
        <link href="assets/cms/metronic/css/overwrite-style.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="favicon.ico"/>
        
        <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        <!-- BEGIN CORE PLUGINS -->
        <!--[if lt IE 9]>
        <script src="assets/cms/metronic/plugins/respond.min.js"></script>
        <script src="assets/cms/metronic/plugins/excanvas.min.js"></script> 
        <![endif]-->
        <script src="assets/cms/metronic/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
        <script src="assets/cms/metronic/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
        <!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
        <script src="assets/cms/metronic/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
        <script src="assets/cms/metronic/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/cms/metronic/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="assets/cms/metronic/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/cms/metronic/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/cms/metronic/plugins/jquery.cokie.min.js" type="text/javascript"></script>
        <script src="assets/cms/metronic/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="assets/cms/metronic/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
        <script src="assets/cms/metronic/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
        <script src="assets/cms/metronic/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
        <script src="assets/cms/metronic/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
        <script src="assets/cms/metronic/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
        <script src="assets/cms/metronic/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
        <script src="assets/cms/metronic/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
        <script src="assets/cms/metronic/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
        <script src="assets/cms/metronic/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
        <script src="assets/cms/metronic/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
        <script src="assets/cms/metronic/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
        <script src="assets/cms/metronic/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>
        <script src="assets/cms/metronic/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
        <script src="assets/cms/metronic/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <script src="assets/cms/metronic/plugins/clockface/js/clockface.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets/cms/metronic/scripts/core/app.js" type="text/javascript"></script>
        <!--<script src="assets/cms/metronic/scripts/custom/index.js" type="text/javascript"></script>
        <script src="assets/cms/metronic/scripts/custom/tasks.js" type="text/javascript"></script>-->
        <!-- END PAGE LEVEL SCRIPTS -->
        <script src="assets/cms/metronic/scripts/main.js" type="text/javascript"></script>
        <script>
            jQuery(document).ready(function() {    
                App.init(); // initlayout and core plugins
                /*Index.init();
                Index.initJQVMAP(); // init index page's custom scripts
                Index.initCalendar(); // init index page's custom scripts
                Index.initCharts(); // init index page's custom scripts
                Index.initChat();
                Index.initMiniCharts();
                Index.initDashboardDaterange();
                Index.initIntro();
                Tasks.initDashboardWidget();*/
            });
        </script>
        <!-- END JAVASCRIPTS -->
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="page-header-fixed">
        <!-- BEGIN HEADER -->
        <div class="header navbar navbar-fixed-top">
            <!-- BEGIN TOP NAVIGATION BAR -->
            <div class="header-inner">
                <!-- BEGIN LOGO -->
                <a class="navbar-brand" href="<?= site_url('cms/cms_dashboard'); ?>">
                    <h3 style="margin: -8px 0 0 15px">
                        <span style="color: #fff;">CMS | </span><span style="color: #FF3333">School</span>
                    </h3>
                </a>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <img src="assets/cms/metronic/img/menu-toggler.png" alt=""/>
                </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <ul class="nav navbar-nav pull-right">
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <li class="dropdown user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="fa fa-user" style="font-size: 20px; margin-top: 9px;"></i>
                            <span class="username">
                                <?= (isset($authen['username']) and $authen['username']) ? $authen['username'] : ''; ?>
                            </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?= site_url('cms/cms_profile'); ?>">
                                    <i class="fa fa-user"></i> My Profile
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" id="trigger_fullscreen">
                                    <i class="fa fa-arrows"></i> Full Screen
                                </a>
                            </li>
                            <li>
                                <a href="<?= site_url('cms/cms_authen/logout'); ?>">
                                    <i class="fa fa-key"></i> Log Out
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                </ul>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END TOP NAVIGATION BAR -->
        </div>
        <!-- END HEADER -->
        <div class="clearfix">
        </div>
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- add "navbar-no-scroll" class to disable the scrolling of the sidebar menu -->
                    <!-- BEGIN SIDEBAR MENU -->
                    <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
                        <li class="sidebar-toggler-wrapper">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler hidden-phone">
                            </div>
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                        </li>
                        <li class="<?= (isset($menu_active) and $menu_active == 'dashboard') ? 'active' : ''; ?>">
                            <a href="<?= site_url('cms/cms_dashboard'); ?>">
                                <i class="fa fa-home"></i>
                                <span class="title">Dashboard</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <?php $permission_authen = (isset($authen['permission']) and $authen['permission'] != 'admin') ? unserialize($authen['permission']) : array($authen['permission']); ?>
                        <?php if(in_array(CMS_PATH . '/cms_school', $permission_authen) or in_array('admin', $permission_authen)) { ?>
                            <li class="<?= (isset($menu_active) and $menu_active == 'school_detail') ? 'active' : ''; ?>">
                                <a href="<?= site_url('cms/cms_school'); ?>">
                                    <i class="fa fa-building-o"></i>
                                    <span class="title">ข้อมูลโรงเรียน</span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if(in_array(CMS_PATH . '/cms_intro', $permission_authen) or in_array('admin', $permission_authen)) { ?>
                            <li class="<?= (isset($menu_active) and $menu_active == 'intro') ? 'active' : ''; ?>">
                                <a href="<?= site_url('cms/cms_intro'); ?>">
                                    <i class="fa fa-bookmark-o"></i>
                                    <span class="title">Intro</span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if(in_array(CMS_PATH . '/cms_banner', $permission_authen) or in_array('admin', $permission_authen)) { ?>
                            <li class="<?= (isset($menu_active) and $menu_active == 'banner') ? 'active' : ''; ?>">
                                <a href="<?= site_url('cms/cms_banner'); ?>">
                                    <i class="fa fa-picture-o"></i>
                                    <span class="title">Banner</span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if(in_array(CMS_PATH . '/cms_post_category', $permission_authen) or in_array(CMS_PATH . '/cms_post', $permission_authen) or in_array('admin', $permission_authen)) { ?>
                            <li class="<?= (isset($menu_active) and $menu_active == 'post') ? 'active' : ''; ?>">
                                <a href="javascript:;">
                                    <i class="fa fa-edit"></i>
                                    <span class="title">โพส</span>
                                    <span class="arrow ">
                                    </span>
                                </a>
                                <ul class="sub-menu">
                                    <?php if(in_array(CMS_PATH . '/cms_post_category', $permission_authen) or in_array('admin', $permission_authen)) { ?>
                                        <li class="<?= (isset($sub_menu_active) and $sub_menu_active == 'post_category') ? 'active' : ''; ?>">
                                            <a href="<?= site_url('cms/cms_post_category'); ?>">
                                                <i class="fa fa-sitemap"></i>
                                                <span class="title">ประเภทโพส</span>
                                                <span class="selected"></span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <?php if(in_array(CMS_PATH . '/cms_post', $permission_authen) or in_array('admin', $permission_authen)) { ?>
                                        <li class="<?= (isset($sub_menu_active) and $sub_menu_active == 'post') ? 'active' : ''; ?>">
                                            <a href="<?= site_url('cms/cms_post'); ?>">
                                                <i class="fa fa-file-text-o"></i>
                                                <span class="title">โพส</span>
                                                <span class="selected"></span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if(in_array(CMS_PATH . '/cms_director', $permission_authen) or in_array(CMS_PATH . '/cms_staff', $permission_authen) or in_array('admin', $permission_authen)) { ?>
                            <li class="<?= (isset($menu_active) and $menu_active == 'human') ? 'active' : ''; ?>">
                                <a href="javascript:;">
                                    <i class="fa fa-group"></i>
                                    <span class="title">ระบบบุคลาการ</span>
                                    <span class="arrow ">
                                    </span>
                                </a>
                                <ul class="sub-menu">
                                    <?php if(in_array(CMS_PATH . '/cms_director', $permission_authen) or in_array('admin', $permission_authen)) { ?>
                                        <li class="<?= (isset($sub_menu_active) and $sub_menu_active == 'director') ? 'active' : ''; ?>">
                                            <a href="<?= site_url('cms/cms_director'); ?>">
                                                <i class="fa fa-user"></i>
                                                <span class="title">ผู้บริหาร</span>
                                                <span class="selected"></span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <?php if(in_array(CMS_PATH . '/cms_staff', $permission_authen) or in_array('admin', $permission_authen)) { ?>
                                        <li class="<?= (isset($sub_menu_active) and $sub_menu_active == 'staff') ? 'active' : ''; ?>">
                                            <a href="<?= site_url('cms/cms_staff'); ?>">
                                                <i class="fa fa-user"></i>
                                                <span class="title">บุคลาการ</span>
                                                <span class="selected"></span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if(in_array(CMS_PATH . '/cms_document', $permission_authen) or in_array('admin', $permission_authen)) { ?>
                            <li class="<?= (isset($menu_active) and $menu_active == 'document') ? 'active' : ''; ?>">
                                <a href="javascript:;">
                                    <i class="fa fa-folder-open-o"></i>
                                    <span class="title">เอกสาร</span>
                                    <span class="arrow ">
                                    </span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="<?= (isset($sub_menu_active) and $sub_menu_active == 'download') ? 'active' : ''; ?>">
                                        <a href="<?= site_url('cms/cms_document/download'); ?>">
                                            <i class="fa fa-file-o"></i>
                                            <span class="title">เอกสารดาวน์โหลด</span>
                                            <span class="selected"></span>
                                        </a>
                                    </li>
                                    <li class="<?= (isset($sub_menu_active) and $sub_menu_active == 'inside') ? 'active' : ''; ?>">
                                        <a href="<?= site_url('cms/cms_document/inside'); ?>">
                                            <i class="fa fa-file-o"></i>
                                            <span class="title">เอกสารภายใน</span>
                                            <span class="selected"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if(in_array(CMS_PATH . '/cms_event', $permission_authen) or in_array('admin', $permission_authen)) { ?>
                            <li class="<?= (isset($menu_active) and $menu_active == 'event') ? 'active' : ''; ?>">
                                <a href="<?= site_url('cms/cms_event'); ?>">
                                    <i class="fa fa-calendar"></i>
                                    <span class="title">กิจกรรม</span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if(in_array(CMS_PATH . '/cms_user', $permission_authen) or in_array('admin', $permission_authen)) { ?>
                            <li class="<?= (isset($menu_active) and $menu_active == 'user') ? 'active' : ''; ?>">
                                <a href="<?= site_url('cms/cms_user'); ?>">
                                    <i class="fa fa-smile-o"></i>
                                    <span class="title">ผู้ใช้</span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                    <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Modal title</h4>
                                </div>
                                <div class="modal-body">
                                    Widget settings form goes here
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn blue">Save changes</button>
                                    <button type="button" class="btn default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                    <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                    <!-- BEGIN PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                            <h3 class="page-title">
                                <?= $page_title; ?> 
                            </h3>
                            <ul class="page-breadcrumb breadcrumb">
                                <li>
                                    <i class="fa fa-home"></i>
                                    <a href="<?= site_url('cms/cms_dashboard'); ?>">
                                        Home
                                    </a>
                                    <?= (isset($breadcrumb) and $breadcrumb) ? '<i class="fa fa-angle-right"></i>' : ''; ?>
                                </li>
                                <?php if(isset($breadcrumb) and $breadcrumb) { ?>
                                    <?php foreach ($breadcrumb as $k_breadcrumb => $v_breadcrumb) { ?>
                                        <li>
                                            <a <?= (isset($v_breadcrumb['link']) and $v_breadcrumb['link']) ? 'href="' . $v_breadcrumb['link'].'"' : ''; ?>>
                                                <?= (isset($v_breadcrumb['name']) and $v_breadcrumb['name']) ? $v_breadcrumb['name'] : ''; ?>
                                            </a>
                                            <?= ($k_breadcrumb + 1 != count($breadcrumb)) ? '<i class="fa fa-angle-right"></i>' : ''; ?>
                                        </li>
                                    <?php } ?>
                            <?php } ?>
                            </ul>
                            <!-- END PAGE TITLE & BREADCRUMB-->
                        </div>
                    </div>
                    <!-- END PAGE HEADER-->
                    <?= $content_for_layout; ?>
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="footer">
            <div class="footer-inner">
                2014 &copy; Metronic by keenthemes.
            </div>
            <div class="footer-tools">
                <span class="go-top">
                    <i class="fa fa-angle-up"></i>
                </span>
            </div>
        </div>
        <!-- END FOOTER -->
    </body>
    <!-- END BODY -->
</html>