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
        <link href="assets/front/basic/css/styles.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top" id="navigation" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" rel="home" href="#">Brand</a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
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
            
        <div id="myCarousel" class="carousel slide">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <img class="img-slide" src="assets/front/basic/images/slide1.jpg">
                    <div class="carousel-caption">
                        <h1>Modern Business - A Bootstrap 3 Template</h1>
                    </div>
                </div>
                <div class="item">
                    <img class="img-slide" src="assets/front/basic/images/slide2.jpg">
                    <div class="carousel-caption">
                        <h1>Ready to Style &amp; Add Content</h1>
                    </div>
                </div>
                <div class="item">
                    <img class="img-slide" src="assets/front/basic/images/slide3.jpg">
                    <div class="carousel-caption">
                        <h1>Additional Layout Options at <a href="http://startbootstrap.com">http://startbootstrap.com</a>
                        </h1>
                    </div>
                </div>
            </div>
            
            <!-- Controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="icon-prev"></span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="icon-next"></span>
            </a>
        </div>
        
        <div class="container-fluid">

            <!--left-->
            <div class="col-sm-3 side">
                <div class="panel panel-default">
                    <div class="panel-heading"><span class="glyphicon glyphicon-bookmark"></span>Title</div>
                    <div class="panel-body">Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
                        Aliquam in felis sit amet augue.</div>
                </div>
                <hr>
                <div class="panel panel-default">
                    <div class="panel-heading">Title</div>
                    <div class="panel-body">Content here..</div>
                </div>
                <hr>
                <div class="panel panel-default">
                    <div class="panel-heading">Title</div>
                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
                        Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
                        dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
                        Aliquam in felis sit amet augue.</div>
                </div>
                <hr>
                <div class="panel panel-default">
                    <div class="panel-heading">Title</div>
                    <div class="panel-body">Content here..</div>
                </div>
                <hr>
            </div><!--/left-->

            <!--center-->
            <div class="col-sm-6">
                <?= $content_for_layout; ?>
            </div><!--/center-->

            <!--right-->
            <div class="col-sm-3 side">
                <div class="panel panel-default">
                    <div class="panel-heading">Title</div>
                    <div class="panel-body">Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
                        Aliquam in felis sit amet augue.</div>
                </div>
                <hr>
                <div class="panel panel-default">
                    <div class="panel-heading">Title</div>
                    <div class="panel-body">Content here..</div>
                </div>
                <hr>
                <div class="panel panel-default">
                    <div class="panel-heading">Title</div>
                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
                        Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
                        dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
                        Aliquam in felis sit amet augue.</div>
                </div>
                <hr>
                <div class="panel panel-default">
                    <div class="panel-heading">Title</div>
                    <div class="panel-body">Content here..</div>
                </div>
                <hr>
            </div><!--/right-->
            <hr>
        </div><!--/container-fluid-->
        <!-- script references -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="assets/front/basic/js/bootstrap.min.js"></script>
        <script src="assets/front/basic/js/scripts.js"></script>
    </body>
</html>