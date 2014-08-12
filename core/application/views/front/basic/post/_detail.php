<h3 class="page-header">
    <?= (isset($post['title']) and $post['title']) ? $post['title'] : ''; ?>
    <br>
    <small>
        โพสเมื่อ : <?= dateTHFormat(getDateFromDateTime($post['date_added'])); ?>
    </small>
</h3>
<?php if (isset($post['vdo']) and $post['vdo'] and $post['vdo_type'] == 'E') { ?>
    <div class="embed-vdo"><?= $post['vdo']; ?></div>
<?php } else if (isset($post['vdo']) and $post['vdo'] and $post['vdo_type'] == 'F') { ?>
    ​<script src="assets/front/plugin/jwplayer/jwplayer.js" ></script>
    <div id="embed-vdo" class="embed-vdo"><?= $post['vdo']; ?></div>
    <script type="text/javascript">
        jwplayer("embed-vdo").setup({
            flashplayer: "assets/front/plugin/jwplayer/jw_player.swf",
            file: "<?= base_url().$this->vdo_path.$post['vdo']; ?>",
            width: "100%",
            aspectratio: "16:9"
        });
    </script>
<?php } ?>
<?php if (isset($post['image']) and $post['image']) { ?>
    <img src="<?= getPostImage($post['image']); ?>" class="img-responsive">
    <hr>
<?php } ?>
<!--<p class="lead"></p>-->
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
