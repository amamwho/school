<!-- BEGIN PAGE LEVEL PLUGINS -->
<!-- BEGIN FILEINPUT -->
<script src="assets/cms/metronic/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<!-- END FILEINPUT -->
<!-- END PAGE LEVEL PLUGINS -->
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-sitemap"></i>ประเภทโพส
                </div>
            </div>
            <div class="portlet-body form">
                <?php if (validation_errors()) { ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                        <strong>Warning!</strong> <?= validation_errors(); ?>
                    </div>
                <?php } ?>
                <form method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="name">ชื่อ *</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" id="name" <?= (isset($post_category_data['name']) and $post_category_data['name']) ? 'value="' . $post_category_data['name'] . '"' : ''; ?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="sort_order">ลำดับการแสดง</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="sort_order" id="sort_order" value="<?= (isset($post_category_data['sort_order']) and $post_category_data['sort_order']) ? $post_category_data['sort_order'] : '0'; ?>">
                            </div>
                        </div>
                        <div class="form-actions fluid action-full">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">Submit</button>
                                <a href="<?= site_url('cms/cms_post_category'); ?>" class="btn default">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>