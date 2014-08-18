<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><span class="glyphicon glyphicon-book category-page-header"></span><?= $post_category['name']; ?></h3>
    </div>
</div>
<?php if(isset($post) and $post) { ?>
    <?php foreach ($post as $v_post) { ?>
        <div class="row">
            <div class="col-lg-4 col-md-4 thumbnail no-border">
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
            <div class="col-lg-8 col-md-8">
                <a href="<?= site_url('post/detail/'.$v_post['post_id']); ?>" role="button"><h4><?= (isset($v_post['title']) and $v_post['title']) ? $v_post['title'] : ''; ?></h4></a>
                <div>
                    <?= (isset($v_post['content']) and $v_post['content']) ? cutCaption(stripHTMLTags($v_post['content'], 220)) : ''; ?>
                </div>
                <p><a href="<?= site_url('post/detail/'.$v_post['post_id']); ?>" role="button">อ่านต่อ.. »</a></p>
            </div>
        </div>
        <hr>
    <?php } ?>
<?php } else { ?>
    <p>ไม่พบข้อมูล</p>
<?php } ?>
<div class="row">
    <div class="col-lg-12 row-pagination">
        <?= $this->pagination->create_custom_links_front(); ?>
    </div>
</div>