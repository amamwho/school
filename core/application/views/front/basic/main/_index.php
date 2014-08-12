<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <?php if(isset($main_banner) and $main_banner) { ?>
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php foreach($main_banner as $key_main_banner => $v_main_banner) { ?>
                <li data-target="#myCarousel" data-slide-to="<?= $key_main_banner; ?>" <?= ($key_main_banner == 0) ? 'class="active"' : ''; ?>></li>
            <?php } ?>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <?php foreach($main_banner as $key_main_banner => $v_main_banner) { ?>
                <div class="item <?= ($key_main_banner === 0) ? 'active' : ''; ?>">
                    <?php if(isset($v_main_banner['image']) and $v_main_banner['image']) { ?>
                        <img class="img-slide" src="<?= getSideBannerImage($v_main_banner['image']); ?>">
                    <?php } ?>
                    <?php if(isset($v_main_banner['short_description']) and $v_main_banner['short_description']) { ?>
                        <div class="carousel-caption">
                            <h1><?= $v_main_banner['short_description']; ?></h1>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    <?php } ?>
</div>
<?php if(isset($post_category) and $post_category) { ?>
    <?php foreach ($post_category as $k_post_category => $v_post_category) { ?>
        <?php if((isset($v_post_category['post_category_id']) and $v_post_category['post_category_id']) and (isset($post[$v_post_category['post_category_id']]) and $post[$v_post_category['post_category_id']])) { ?>
            <?php if($k_post_category == 0) { ?>
                <div class="row first-category">
                    <?php $first_post = array_shift($post[$v_post_category['post_category_id']]); ?>
                    <?php if(isset($first_post) and $first_post) { ?>
                        <div class="col-md-7 first-post">
                            <div class="img">
                                <a href="<?= site_url('post/detail/'.$first_post['post_id']); ?>" role="button">
                                    <?php if(isset($first_post['vdo_type']) and $first_post['vdo_type'] == 'E') { ?>
                                        <?php if(preg_match_all('/embed\/(.*?)\"/',$first_post['vdo'],$match)) { ?>    
                                            <img src="http://i.ytimg.com/vi/<?= $match[1][0]; ?>/mqdefault.jpg">      
                                        <?php } else { ?>
                                            <img src="<?= getPostThumb($first_post['thumb']); ?>">
                                        <?php } ?>
                                    <?php } else { ?>
                                        <img src="<?= getPostThumb($first_post['thumb']); ?>">
                                    <?php } ?>
                                </a>
                                <div class="caption">
                                    <div class="ani">
                                        <a href="<?= site_url('post/detail/'.$first_post['post_id']); ?>" role="button"><p><?= (isset($first_post['title']) and $first_post['title']) ? cutCaption($first_post['title'], 90) : ''; ?></p></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if(isset($post[$v_post_category['post_category_id']]) and $post[$v_post_category['post_category_id']]) { ?>
                        <div class="col-md-5">
                            <div class="row">
                                <h4 class="first-category"><span class="glyphicon glyphicon-book category-page-header"></span><?= $v_post_category['name']; ?></h4>
                                <?php foreach ($post[$v_post_category['post_category_id']] as $v_post) { ?>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="img">
                                                <a href="<?= site_url('post/detail/'.$v_post['post_id']); ?>" role="button">
                                                    <?php if(isset($v_post['vdo_type']) and $v_post['vdo_type'] == 'E') { ?>
                                                        <?php if(preg_match_all('/embed\/(.*?)\"/',$v_post['vdo'],$match)) { ?>    
                                                            <img src="http://i.ytimg.com/vi/<?= $match[1][0]; ?>/mqdefault.jpg">      
                                                        <?php } else { ?>
                                                            <img src="<?= getPostThumb($v_post['thumb']); ?>">
                                                        <?php } ?>
                                                    <?php } else { ?>
                                                        <img src="<?= getPostThumb($v_post['thumb']); ?>">
                                                    <?php } ?>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-8 content-list">
                                            <a href="<?= site_url('post/detail/'.$v_post['post_id']); ?>"><p><?= (isset($v_post['title']) and $v_post['title']) ? $v_post['title'] : ''; ?></p></a>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="col-md-12 view-all-category"><a href="<?= site_url('post/category/'.$v_post_category['post_category_id']); ?>">ดูทั้งหมด</a></div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } else { ?>
                <div class="row">
                    <div class="col-lg-12 category-header">
                        <h3 class="col-md-10"><span class="glyphicon glyphicon-book category-header"></span><?= $v_post_category['name']; ?></h3>
                        <div class="col-md-2 view-all-category"><a href="<?= site_url('post/category/'.$v_post_category['post_category_id']); ?>">ดูทั้งหมด</a></div>
                    </div>
                    <?php foreach ($post[$v_post_category['post_category_id']] as $v_post) { ?>
                        <div class="col-lg-4">
                            <div class="thumbnail no-border">
                                <a href="<?= site_url('post/detail/'.$v_post['post_id']); ?>" role="button">
                                    <?php if(isset($v_post['vdo_type']) and $v_post['vdo_type'] == 'E') { ?>
                                        <?php if(preg_match_all('/embed\/(.*?)\"/',$v_post['vdo'],$match)) { ?>    
                                            <img src="http://i.ytimg.com/vi/<?= $match[1][0]; ?>/mqdefault.jpg">      
                                        <?php } else { ?>
                                            <img src="<?= getPostThumb($v_post['thumb']); ?>">
                                        <?php } ?>
                                    <?php } else { ?>
                                        <img src="<?= getPostThumb($v_post['thumb']); ?>">
                                    <?php } ?>
                                </a>
                                <a href="<?= site_url('post/detail/'.$v_post['post_id']); ?>" role="button"><h3><?= (isset($v_post['title']) and $v_post['title']) ? $v_post['title'] : ''; ?></h3></a>
                                <div>
                                    <?= (isset($v_post['content']) and $v_post['content']) ? cutCaption($v_post['content']) : ''; ?>
                                </div>
                                <p><a href="<?= site_url('post/detail/'.$v_post['post_id']); ?>" role="button">อ่านต่อ.. »</a></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        <?php } ?>
    <?php } ?>
<?php } ?>
<?/*<div class="row">  
    <h2 class="col-lg-12 category-header"><span class="glyphicon glyphicon-book left"></span>Category Heading</h2>
</div>
<div class="row">
    <div class="col-xs-12">
        <h2>Article Heading</h2>
        <p>Lorem Ipsum คือ เนื้อหาจำลองแบบเรียบๆ ที่ใช้กันในธุรกิจงานพิมพ์หรืองานเรียงพิมพ์ มันได้กลายมาเป็นเนื้อหาจำลองมาตรฐานของธุรกิจดังกล่าวมาตั้งแต่ศตวรรษที่ 16 เมื่อเครื่องพิมพ์โนเนมเครื่องหนึ่งนำรางตัวพิมพ์มาสลับสับตำแหน่งตัวอักษรเพื่อทำหนังสือตัวอย่าง Lorem Ipsum อยู่ยงคงกระพันมาไม่ใช่แค่เพียงห้าศตวรรษ แต่อยู่มาจนถึงยุคที่พลิกโฉมเข้าสู่งานเรียงพิมพ์ด้วยวิธีทางอิเล็กทรอนิกส์ และยังคงสภาพเดิมไว้อย่างไม่มีการเปลี่ยนแปลง มันได้รับความนิยมมากขึ้นในยุค ค.ศ. 1960 เมื่อแผ่น Letraset วางจำหน่ายโดยมีข้อความบนนั้นเป็น Lorem Ipsum และล่าสุดกว่านั้น คือเมื่อซอฟท์แวร์การทำสื่อสิ่งพิมพ์ (Desktop Publishing) อย่าง Aldus PageMaker ได้รวมเอา Lorem Ipsum เวอร์ชั่นต่างๆ เข้าไว้ในซอฟท์แวร์ด้วย</p>
        <p><a href="" role="button">อ่านต่อ.. »</a></p>
        <p class="pull-right"><span class="label label-default">keyword</span> <span class="label label-default">tag</span> <span class="label label-default">post</span></p>
        <ul class="list-inline"><li><a href="#">2 Days Ago</a></li><li><a href="#"><i class="glyphicon glyphicon-comment"></i> 2 Comments</a></li><li><a href="#"><i class="glyphicon glyphicon-share"></i> 14 Shares</a></li></ul>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-xs-12">
        <h2>Article Heading</h2>
        <p>Lorem Ipsum คือ เนื้อหาจำลองแบบเรียบๆ ที่ใช้กันในธุรกิจงานพิมพ์หรืองานเรียงพิมพ์ มันได้กลายมาเป็นเนื้อหาจำลองมาตรฐานของธุรกิจดังกล่าวมาตั้งแต่ศตวรรษที่ 16 เมื่อเครื่องพิมพ์โนเนมเครื่องหนึ่งนำรางตัวพิมพ์มาสลับสับตำแหน่งตัวอักษรเพื่อทำหนังสือตัวอย่าง Lorem Ipsum อยู่ยงคงกระพันมาไม่ใช่แค่เพียงห้าศตวรรษ แต่อยู่มาจนถึงยุคที่พลิกโฉมเข้าสู่งานเรียงพิมพ์ด้วยวิธีทางอิเล็กทรอนิกส์ และยังคงสภาพเดิมไว้อย่างไม่มีการเปลี่ยนแปลง มันได้รับความนิยมมากขึ้นในยุค ค.ศ. 1960 เมื่อแผ่น Letraset วางจำหน่ายโดยมีข้อความบนนั้นเป็น Lorem Ipsum และล่าสุดกว่านั้น คือเมื่อซอฟท์แวร์การทำสื่อสิ่งพิมพ์ (Desktop Publishing) อย่าง Aldus PageMaker ได้รวมเอา Lorem Ipsum เวอร์ชั่นต่างๆ เข้าไว้ในซอฟท์แวร์ด้วย</p>
        <p><a href="" role="button">อ่านต่อ.. »</a></p>
        <p class="pull-right"><span class="label label-default">keyword</span> <span class="label label-default">tag</span> <span class="label label-default">post</span></p>
        <ul class="list-inline"><li><a href="#">4 Days Ago</a></li><li><a href="#"><i class="glyphicon glyphicon-comment"></i> 7 Comments</a></li><li><a href="#"><i class="glyphicon glyphicon-share"></i> 56 Shares</a></li></ul>
    </div>
</div>
<hr>      
<div class="row">
    <div class="col-xs-12">
        <h2>Article Heading</h2>
        <p>Lorem Ipsum คือ เนื้อหาจำลองแบบเรียบๆ ที่ใช้กันในธุรกิจงานพิมพ์หรืองานเรียงพิมพ์ มันได้กลายมาเป็นเนื้อหาจำลองมาตรฐานของธุรกิจดังกล่าวมาตั้งแต่ศตวรรษที่ 16 เมื่อเครื่องพิมพ์โนเนมเครื่องหนึ่งนำรางตัวพิมพ์มาสลับสับตำแหน่งตัวอักษรเพื่อทำหนังสือตัวอย่าง Lorem Ipsum อยู่ยงคงกระพันมาไม่ใช่แค่เพียงห้าศตวรรษ แต่อยู่มาจนถึงยุคที่พลิกโฉมเข้าสู่งานเรียงพิมพ์ด้วยวิธีทางอิเล็กทรอนิกส์ และยังคงสภาพเดิมไว้อย่างไม่มีการเปลี่ยนแปลง มันได้รับความนิยมมากขึ้นในยุค ค.ศ. 1960 เมื่อแผ่น Letraset วางจำหน่ายโดยมีข้อความบนนั้นเป็น Lorem Ipsum และล่าสุดกว่านั้น คือเมื่อซอฟท์แวร์การทำสื่อสิ่งพิมพ์ (Desktop Publishing) อย่าง Aldus PageMaker ได้รวมเอา Lorem Ipsum เวอร์ชั่นต่างๆ เข้าไว้ในซอฟท์แวร์ด้วย</p>
        <p><a href="" role="button">อ่านต่อ.. »</a></p>
        <p class="pull-right"><span class="label label-default">keyword</span> <span class="label label-default">tag</span> <span class="label label-default">post</span></p>
        <ul class="list-inline"><li><a href="#">1 Week Ago</a></li><li><a href="#"><i class="glyphicon glyphicon-comment"></i> 4 Comments</a></li><li><a href="#"><i class="glyphicon glyphicon-share"></i> 34 Shares</a></li></ul>
    </div>
</div>
<hr>*/?>