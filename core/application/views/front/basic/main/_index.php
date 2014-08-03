<?php if(isset($post_category) and $post_category) { ?>
    <?php foreach ($post_category as $v_post_category) { ?>
        <?php if((isset($v_post_category['post_category_id']) and $v_post_category['post_category_id']) and (isset($post[$v_post_category['post_category_id']]) and $post[$v_post_category['post_category_id']])) { ?>
            <div class="row">
                <h2 class="col-lg-12 category-header"><span class="glyphicon glyphicon-book left"></span><?= $v_post_category['name']; ?></h2>
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
                                <?= (isset($v_post['content']) and $v_post['content']) ? $v_post['content'] : ''; ?>
                            </div>
                            <p><a href="<?= site_url('post/detail/'.$v_post['post_id']); ?>" role="button">อ่านต่อ.. »</a></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    <?php } ?>
<?php } ?>
<div class="row">  
    <h2 class="col-lg-12 category-header"><span class="glyphicon glyphicon-book left"></span>Category Heading</h2>
</div>
<div class="row">
    <div class="col-xs-12">
        <h2>Article Heading</h2>
        <p>Lorem Ipsum คือ เนื้อหาจำลองแบบเรียบๆ ที่ใช้กันในธุรกิจงานพิมพ์หรืองานเรียงพิมพ์ มันได้กลายมาเป็นเนื้อหาจำลองมาตรฐานของธุรกิจดังกล่าวมาตั้งแต่ศตวรรษที่ 16 เมื่อเครื่องพิมพ์โนเนมเครื่องหนึ่งนำรางตัวพิมพ์มาสลับสับตำแหน่งตัวอักษรเพื่อทำหนังสือตัวอย่าง Lorem Ipsum อยู่ยงคงกระพันมาไม่ใช่แค่เพียงห้าศตวรรษ แต่อยู่มาจนถึงยุคที่พลิกโฉมเข้าสู่งานเรียงพิมพ์ด้วยวิธีทางอิเล็กทรอนิกส์ และยังคงสภาพเดิมไว้อย่างไม่มีการเปลี่ยนแปลง มันได้รับความนิยมมากขึ้นในยุค ค.ศ. 1960 เมื่อแผ่น Letraset วางจำหน่ายโดยมีข้อความบนนั้นเป็น Lorem Ipsum และล่าสุดกว่านั้น คือเมื่อซอฟท์แวร์การทำสื่อสิ่งพิมพ์ (Desktop Publishing) อย่าง Aldus PageMaker ได้รวมเอา Lorem Ipsum เวอร์ชั่นต่างๆ เข้าไว้ในซอฟท์แวร์ด้วย</p>
        <p><a href="<?= site_url('main/post'); ?>" role="button">อ่านต่อ.. »</a></p>
        <p class="pull-right"><span class="label label-default">keyword</span> <span class="label label-default">tag</span> <span class="label label-default">post</span></p>
        <ul class="list-inline"><li><a href="#">2 Days Ago</a></li><li><a href="#"><i class="glyphicon glyphicon-comment"></i> 2 Comments</a></li><li><a href="#"><i class="glyphicon glyphicon-share"></i> 14 Shares</a></li></ul>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-xs-12">
        <h2>Article Heading</h2>
        <p>Lorem Ipsum คือ เนื้อหาจำลองแบบเรียบๆ ที่ใช้กันในธุรกิจงานพิมพ์หรืองานเรียงพิมพ์ มันได้กลายมาเป็นเนื้อหาจำลองมาตรฐานของธุรกิจดังกล่าวมาตั้งแต่ศตวรรษที่ 16 เมื่อเครื่องพิมพ์โนเนมเครื่องหนึ่งนำรางตัวพิมพ์มาสลับสับตำแหน่งตัวอักษรเพื่อทำหนังสือตัวอย่าง Lorem Ipsum อยู่ยงคงกระพันมาไม่ใช่แค่เพียงห้าศตวรรษ แต่อยู่มาจนถึงยุคที่พลิกโฉมเข้าสู่งานเรียงพิมพ์ด้วยวิธีทางอิเล็กทรอนิกส์ และยังคงสภาพเดิมไว้อย่างไม่มีการเปลี่ยนแปลง มันได้รับความนิยมมากขึ้นในยุค ค.ศ. 1960 เมื่อแผ่น Letraset วางจำหน่ายโดยมีข้อความบนนั้นเป็น Lorem Ipsum และล่าสุดกว่านั้น คือเมื่อซอฟท์แวร์การทำสื่อสิ่งพิมพ์ (Desktop Publishing) อย่าง Aldus PageMaker ได้รวมเอา Lorem Ipsum เวอร์ชั่นต่างๆ เข้าไว้ในซอฟท์แวร์ด้วย</p>
        <p><a href="<?= site_url('main/post'); ?>" role="button">อ่านต่อ.. »</a></p>
        <p class="pull-right"><span class="label label-default">keyword</span> <span class="label label-default">tag</span> <span class="label label-default">post</span></p>
        <ul class="list-inline"><li><a href="#">4 Days Ago</a></li><li><a href="#"><i class="glyphicon glyphicon-comment"></i> 7 Comments</a></li><li><a href="#"><i class="glyphicon glyphicon-share"></i> 56 Shares</a></li></ul>
    </div>
</div>
<hr>      
<div class="row">
    <div class="col-xs-12">
        <h2>Article Heading</h2>
        <p>Lorem Ipsum คือ เนื้อหาจำลองแบบเรียบๆ ที่ใช้กันในธุรกิจงานพิมพ์หรืองานเรียงพิมพ์ มันได้กลายมาเป็นเนื้อหาจำลองมาตรฐานของธุรกิจดังกล่าวมาตั้งแต่ศตวรรษที่ 16 เมื่อเครื่องพิมพ์โนเนมเครื่องหนึ่งนำรางตัวพิมพ์มาสลับสับตำแหน่งตัวอักษรเพื่อทำหนังสือตัวอย่าง Lorem Ipsum อยู่ยงคงกระพันมาไม่ใช่แค่เพียงห้าศตวรรษ แต่อยู่มาจนถึงยุคที่พลิกโฉมเข้าสู่งานเรียงพิมพ์ด้วยวิธีทางอิเล็กทรอนิกส์ และยังคงสภาพเดิมไว้อย่างไม่มีการเปลี่ยนแปลง มันได้รับความนิยมมากขึ้นในยุค ค.ศ. 1960 เมื่อแผ่น Letraset วางจำหน่ายโดยมีข้อความบนนั้นเป็น Lorem Ipsum และล่าสุดกว่านั้น คือเมื่อซอฟท์แวร์การทำสื่อสิ่งพิมพ์ (Desktop Publishing) อย่าง Aldus PageMaker ได้รวมเอา Lorem Ipsum เวอร์ชั่นต่างๆ เข้าไว้ในซอฟท์แวร์ด้วย</p>
        <p><a href="<?= site_url('main/post'); ?>" role="button">อ่านต่อ.. »</a></p>
        <p class="pull-right"><span class="label label-default">keyword</span> <span class="label label-default">tag</span> <span class="label label-default">post</span></p>
        <ul class="list-inline"><li><a href="#">1 Week Ago</a></li><li><a href="#"><i class="glyphicon glyphicon-comment"></i> 4 Comments</a></li><li><a href="#"><i class="glyphicon glyphicon-share"></i> 34 Shares</a></li></ul>
    </div>
</div>
<hr>