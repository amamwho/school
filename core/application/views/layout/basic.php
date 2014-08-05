<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Portal Template</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <?php if (isset($header) and $header) { ?>
            <?= $header; ?>
        <?php } else { ?>
            <?= $this->load->view('frontend/basic/header/_header_tag', NULL, true); ?>
        <?php } ?>
        <base href="<?= base_url(); ?>"/>
        <link href="assets/front/basic/css/bootstrap.min.css" rel="stylesheet">
        <!--[if lt IE 9]>
                <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <!-- ########################### Plugin ########################### -->
        <!-- ########################## Calendar ########################## -->
        <link href="assets/front/plugin/bootstrap-calendar/css/calendar.css" rel="stylesheet">
        <!-- ########################## Calendar ########################## -->
        <!-- ########################## ColorBox ########################## -->
        <link href="assets/front/plugin/colorbox/theme/2/colorbox.css" rel="stylesheet">
        <!-- ########################## ColorBox ########################## -->
        <!-- ########################### Plugin ########################### -->
        <link href="assets/front/basic/css/styles.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top" id="navigation" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" rel="home" href="<?= base_url(); ?>"><span class="glyphicon glyphicon-home"></span> โรงเรียน - ของเรา</a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="<?= site_url('director'); ?>">ผู้บริหาร</a></li>
                    <li><a href="<?= site_url('staff'); ?>">อาจารย์/บุคลากร</a></li>
                    <li><a href="#">Link</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                            <li class="divider"></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
            
        <div class="container header-img">
            <img class="col-sm-12" src="assets/front/basic/images/header.jpg">
        </div>
        
        <div class="container basic">

            <!--left-->
            <div class="col-sm-3 side">
                <?php if(isset($left_banner) and $left_banner) { ?>
                    <div class="panel panel-default">
                        <div class="panel-heading"><span class="glyphicon glyphicon-bookmark"></span>หน่วยงานที่เกี่ยวข้อง</div>
                        <div class="panel-body sidebar-banner">
                            <?php foreach($left_banner as $v_left_banner) { ?>
                                <?php if(isset($v_left_banner['link']) and $v_left_banner['link']) { ?>
                                    <a href="<?= addhttp($v_left_banner['link']); ?>" target="_blank"><img class="col-sm-12 banner" src="<?= getSideBannerImage($v_left_banner['image']); ?>"></a>
                                <?php } else { ?>
                                    <img class="col-sm-12 banner" src="<?= $this->images_path_banner.$v_left_banner['image']; ?>">
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                    <hr>
                <?php } ?>
                <?php if(isset($left_sidebar) and $left_sidebar) { ?>
                    <?php foreach($left_sidebar as $v_left_sidebar) { ?>
                        <div class="panel panel-default">
                            <div class="panel-heading"><span class="glyphicon glyphicon-bookmark"></span><?= $v_left_sidebar['name']; ?></div>
                            <div class="panel-body"><?= $v_left_sidebar['detail']; ?></div>
                        </div>
                        <hr>
                    <?php } ?>
                <?php } ?>
                <div class="panel panel-default">
                    <div class="panel-heading"><span class="glyphicon glyphicon-bookmark"></span>Title</div>
                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
                        Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
                        dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
                        Aliquam in felis sit amet augue.</div>
                </div>
                <hr>
                <div class="panel panel-default">
                    <div class="panel-heading"><span class="glyphicon glyphicon-bookmark"></span>Title</div>
                    <div class="panel-body">Content here..</div>
                </div>
                <hr>
            </div><!--/left-->

            <!--center-->
            <div class="col-sm-6">
                <?= $content_for_layout; ?>
                <?php if($this->router->fetch_class().'/'.$this->router->fetch_method() == 'main/index') { ?>
                    <?php if(isset($center_sidebar) and $center_sidebar) { ?>
                        <?php foreach($center_sidebar as $v_center_sidebar) { ?>
                            <div class="row">  
                                <h2 class="col-lg-12 category-header"><span class="glyphicon glyphicon-book left"></span><?= $v_center_sidebar['name']; ?></h2>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 center-sidebar">
                                    <?= $v_center_sidebar['detail']; ?>
                                </div>
                            </div>
                            <hr>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            </div><!--/center-->

            <!--right-->
            <div class="col-sm-3 side">
                <div class="panel panel-default">
                    <div class="panel-heading"><span class="glyphicon glyphicon-bookmark"></span>ผุ้อำนวยการโรงเรียน</div>
                    <div class="panel-body director">
                        <a href="<?= site_url('director/profile/'.$latest_director['director_id']); ?>">
                            <img class="col-sm-12" src="<?= $this->images_path_director.$latest_director['image']; ?>">
                            <h4><?= $latest_director['firstname'].' '.$latest_director['lastname']; ?></h4>
                        </a>
                    </div>
                </div>
                <hr>
                <div class="panel panel-default">
                    <div class="panel-heading"><span class="glyphicon glyphicon-bookmark"></span>ปฏิทินกิจกรรม</div>
                    <div class="panel-body">
                        <div class="pull-right form-inline">
                            <div class="btn-group">
                                <span class="btn btn-primary" data-calendar-nav="prev"><span class="glyphicon glyphicon-chevron-left"></span></span>
                                <span class="btn btn-primary" data-calendar-nav="next"><span class="glyphicon glyphicon-chevron-right"></span></span>
                            </div>
                        </div>

                        <h3 class="calendar"></h3>
                        <div id="calendar"></div>
                    </div>
                </div>
                <hr>
                <?php if(isset($right_banner) and $right_banner) { ?>
                    <div class="panel panel-default">
                        <div class="panel-heading"><span class="glyphicon glyphicon-bookmark"></span>สิ่งที่หน้าสนใจ</div>
                        <div class="panel-body sidebar-banner">
                            <?php foreach($right_banner as $v_right_banner) { ?>
                                <?php if(isset($v_right_banner['link']) and $v_right_banner['link']) { ?>
                                    <a href="<?= addhttp($v_right_banner['link']); ?>" target="_blank"><img class="col-sm-12 banner" src="<?= getSideBannerImage($v_right_banner['image']); ?>"></a>
                                <?php } else { ?>
                                    <img class="col-sm-12 banner" src="<?= $this->images_path_banner.$v_right_banner['image']; ?>">
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                    <hr>
                <?php } ?>
                <?php if(isset($right_sidebar) and $right_sidebar) { ?>
                    <?php foreach($right_sidebar as $v_right_sidebar) { ?>
                        <div class="panel panel-default">
                            <div class="panel-heading"><span class="glyphicon glyphicon-bookmark"></span><?= $v_right_sidebar['name']; ?></div>
                            <div class="panel-body"><?= $v_right_sidebar['detail']; ?></div>
                        </div>
                        <hr>
                    <?php } ?>
                <?php } ?>
                <div class="panel panel-default">
                    <div class="panel-heading"><span class="glyphicon glyphicon-bookmark"></span>Title</div>
                    <div class="panel-body">Content here..</div>
                </div>
                <hr>
                <div class="panel panel-default">
                    <div class="panel-heading"><span class="glyphicon glyphicon-bookmark"></span>Title</div>
                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
                        Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
                        dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
                        Aliquam in felis sit amet augue.</div>
                </div>
                <hr>
                <div class="panel panel-default">
                    <div class="panel-heading"><span class="glyphicon glyphicon-bookmark"></span>Title</div>
                    <div class="panel-body">Content here..</div>
                </div>
                <hr>
            </div><!--/right-->
            <hr>
        </div><!--/container-fluid-->
        <!-- script references -->
        <script src="assets/front/basic/js/jquery2.0.2.min.js"></script>
        <script src="assets/front/basic/js/bootstrap.min.js"></script>
        <!-- ########################### Plugin ########################### -->
        <!-- ########################## Calendar ########################## -->
        <script src="assets/front/plugin/bootstrap-calendar/components/underscore/underscore-min.js"></script>
        <script src="assets/front/plugin/bootstrap-calendar/js/calendar.js"></script>
        <script src="assets/front/plugin/bootstrap-calendar/js/language/th-TH.js"></script>
        <!-- ########################## Calendar ########################## -->
        <!-- ########################## ColorBox ########################## -->
        <script src="assets/front/plugin/colorbox/jquery.colorbox.js"></script>
        <!-- ########################## ColorBox ########################## -->
        <!-- ########################### Plugin ########################### -->
        
        <script src="assets/front/basic/js/scripts.js"></script>
        <?php $session_intro = $this->session->userdata('intro'); ?>
        <?php if((isset($intro) and $intro) and empty($session_intro)) { ?>
            <?php $this->session->set_userdata('intro', 'true'); ?>
            <a class="intro" href="<?= site_url('intro/detail/'.$intro['intro_id']); ?>"></a>
            <script>
                $(function(){
                    $('.intro').click();
                });
            </script>
        <?php } ?>
    </body>
</html>