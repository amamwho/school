<?php if(isset($title) and $title) { ?>
    <title><?= $title; ?></title>
    <meta property='og:title' content='<?= $title; ?>' />
<?php } else { ?>
    <title>โรงเรียน</title>
    <meta property='og:title' content='โรงเรียน' />
<?php } ?>
    
<?php if(isset($description) and $description) { ?>
    <meta name="description" content="<?= $description; ?>" />
    <meta property='og:description' content='<?= $description; ?>' />
<?php } else { ?>
    <meta name="description" content="โรงเรียน" />
    <meta property='og:description' content='โรงเรียน' />
<?php } ?>
    
<?php if(isset($keywords) and $keywords) { ?>
    <meta name="keywords" content="<?= $keywords; ?>" />
<?php } else { ?>
    <meta name="keywords" content="โรงเรียน" />
<?php } ?>
    
<?php if(isset($url) and $url) { ?>
    <meta property='og:url' content='<?= $url; ?>' />
<?php } else { ?>
    <meta property='og:url' content='<?= site_url(); ?>' />
<?php } ?>
    
<?php if(isset($image) and $image) { ?>
    <meta property='og:image' content='<?= $image; ?>' />
<?php } ?>
    
    <meta property='og:site_name' content='<?= site_url(); ?>' />