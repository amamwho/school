<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <base href="<?= base_url(); ?>">
        <?= (isset($intro['title']) and $intro['title']) ? '<title>'.$intro['title'].'</title>' : ''; ?>
    </head>

    <body style="
          <?= (isset($intro['bg_color']) and $intro['bg_color']) ? 'background-color: #'.$intro['bg_color'].';' : ''; ?>
          <?= (isset($intro['image_bg']) and $intro['image_bg']) ? 'background-image: url('.$this->images_path_intro.$intro['image_bg'].');' : ''; ?>
          ">
        <?php if(isset($intro['image']) and $intro['image']) { ?>
            <div style="text-align: center; margin: 45px 30px;">
                <img src="<?= $this->images_path_intro.$intro['image']; ?>" style="max-width: 100%;">
            </div>
        <?php } ?>
        <?php if(isset($intro['description']) and $intro['description']) { ?>
            <div style="text-align: center; margin: 15px 0;">
                <?= $intro['description']; ?>
            </div>
        <?php } ?>
        <?php if(isset($intro['image_btn']) and $intro['image_btn']) { ?>
            <div style="text-align: center; margin: 15px 0;">
                <img src="<?= $this->images_path_intro.$intro['image_btn']; ?>" style="max-width: 100%; cursor: pointer;" onclick="parent.jQuery.colorbox.close()">
            </div>
        <?php } ?>
    </body>

</html>