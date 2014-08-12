<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><span class="glyphicon glyphicon-file category-page-header"></span><?= $type; ?></h3>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <?php if(isset($document_by_type) and $document_by_type) { ?>
            <ul class="list-staff-cate">
                <?php foreach ($document_by_type as $v_document_by_type) { ?>
                    <li><span class="glyphicon glyphicon-save"></span><a href="<?= site_url('loadFile/'.$v_document_by_type['raw']);; ?>"><?= $v_document_by_type['name']; ?></a></li>
                <?php } ?>
            </ul>
        <?php } ?>
    </div>
</div>
<?php if(isset($document_category) and $document_category) { ?>
    <?php foreach ($document_category as $k_document_category => $v_document_category) { ?>
        <?php if(isset($document_by_cate[$v_document_category['key']]) and $document_by_cate[$v_document_category['key']]) { ?>
            <div class="col-lg-12 category-header">
                <h5 class="col-md-12"><span class="glyphicon glyphicon-tag category-header"></span><?= $v_document_category['value']; ?></h5>
            </div>
            <ul class="list-staff-cate">
                <?php foreach ($document_by_cate[$v_document_category['key']] as $v_document_by_cate) { ?>
                    <li><span class="glyphicon glyphicon-save"></span><a href="<?= site_url('loadFile/'.$v_document_by_cate['raw']);; ?>"><?= $v_document_by_cate['name']; ?></a></li>
                <?php } ?>
            </ul>
        <?php } ?>
    <?php } ?>
<?php } ?>
