<h3 class="page-header">
    <?= (isset($post['title']) and $post['title']) ? $post['title'] : ''; ?>
    <br>
    <small>
        โพสเมื่อ : <?= dateTHFormat(getDateFromDateTime($post['date_added'])); ?>
    </small>
</h3>
<?php if(isset($post['vdo']) and $post['vdo'] and $post['vdo_type'] == 'E') { ?>
    <div class="embed-vdo"><?= $post['vdo']; ?></div>
<?php } ?>
<?php if(isset($post['image']) and $post['image']) { ?>
    <img src="<?= getPostImage($post['image']); ?>" class="img-responsive">
    <hr>
<?php } ?>
<p class="lead">Science cuts two ways, of course; its products can be used for both good and evil. But there's no turning back from science. The early warnings about technological dangers also come from science.</p>
<?= (isset($post['content']) and $post['content']) ? $post['content'] : ''; ?>
<hr>
<div class="row">
    <div class="col-xs-6 col-md-4">
      <a href="assets/front/basic/images/image800-533.jpg" title="1" class="thumbnail gallery">
        <img data-src="holder.js/100%x180" alt="100%x180" src="assets/front/basic/images/image800-533.jpg">
      </a>
    </div>
    <div class="col-xs-6 col-md-4">
      <a href="assets/front/basic/images/image800-533.jpg" title="2" class="thumbnail gallery">
        <img data-src="holder.js/100%x180" alt="100%x180" src="assets/front/basic/images/image800-533.jpg">
      </a>
    </div>
    <div class="col-xs-6 col-md-4">
      <a href="assets/front/basic/images/image800-533.jpg" title="3" class="thumbnail gallery">
        <img data-src="holder.js/100%x180" alt="100%x180" src="assets/front/basic/images/image800-533.jpg">
      </a>
    </div>
    <div class="col-xs-6 col-md-4">
      <a href="assets/front/basic/images/image800-533.jpg" title="4" class="thumbnail gallery">
        <img data-src="holder.js/100%x180" alt="100%x180" src="assets/front/basic/images/image800-533.jpg">
      </a>
    </div>
    <div class="col-xs-6 col-md-4">
      <a href="assets/front/basic/images/image800-533.jpg" title="5" class="thumbnail gallery">
        <img data-src="holder.js/100%x180" alt="100%x180" src="assets/front/basic/images/image800-533.jpg">
      </a>
    </div>
    <div class="col-xs-6 col-md-4">
      <a href="assets/front/basic/images/image800-533.jpg" title="6" class="thumbnail gallery">
        <img data-src="holder.js/100%x180" alt="100%x180" src="assets/front/basic/images/image800-533.jpg">
      </a>
    </div>
  </div>
