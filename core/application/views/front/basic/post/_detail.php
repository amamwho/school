<h3 class="page-header">
    <?= (isset($post['title']) and $post['title']) ? $post['title'] : ''; ?>
    <br>
    <small>
        โพสเมื่อ : <?= dateTHFormat(getDateFromDateTime($post['date_added'])); ?>
    </small>
</h3>
<?php if (isset($post['vdo']) and $post['vdo'] and $post['vdo_type'] == 'E') { ?>
    <div class="embed-vdo"><?= $post['vdo']; ?></div>
<?php } ?>
<?php if (isset($post['image']) and $post['image']) { ?>
    <img src="<?= getPostImage($post['image']); ?>" class="img-responsive">
    <hr>
<?php } ?>
<p class="lead">Science cuts two ways, of course; its products can be used for both good and evil. But there's no turning back from science. The early warnings about technological dangers also come from science.</p>
<?= (isset($post['content']) and $post['content']) ? $post['content'] : ''; ?>
<hr>
<?php if(isset($gallery) and $gallery) { ?>
    <div class="row">
        <?php foreach ($gallery as $v_gallery) { ?>
            <div class="col-xs-6 col-md-4">
                <a href="<?= getGalleryImage($v_gallery['image']); ?>" class="thumbnail gallery">
                    <img data-src="holder.js/100%x180" alt="100%x180" src="<?= getGalleryThumb($v_gallery['thumb']); ?>">
                </a>
            </div>
        <?php } ?>
    </div>
<?php } ?>
