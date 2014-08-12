<!-- BEGIN PAGE LEVEL PLUGINS -->
<!-- END PAGE LEVEL PLUGINS -->
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-file-text-o"></i>Post
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
                            <label class="col-md-3 control-label" for="post_id">หน้า *</label>
                            <div class="col-md-6">
                                <select class="form-control" name="post_id" id="post_id" <?= (isset($action) and $action == 'update') ? 'disabled' : ''; ?>>
                                    <option value="">เลือกหน้า</option>
                                    <?php if(isset($action) and $action == 'update') { ?>
                                        <option value="<?= $post_data['post_id']; ?>" selected><?= $post_data['title']; ?></option>
                                    <?php } else if(isset($post_list) and $post_list) { ?>
                                        <?php foreach ($post_list as $value_pl) { ?>
                                            <option value="<?= $value_pl['post_id']; ?>" <?= (isset($post_data['post_id']) and $post_data['post_id'] == $value_pl['post_id']) ? 'selected' : ''; ?>><?= $value_pl['title']; ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="menu_parent">หน้าหลัก</label>
                            <div class="col-md-6">
                                <select class="form-control" name="menu_parent" id="menu_parent">
                                    <option value="">เลือกหน้าหลัก</option>
                                    <?php if(isset($parent_list) and $parent_list) { ?>
                                        <?php foreach ($parent_list as $value_pl) { ?>
                                            <option value="<?= $value_pl['post_id']; ?>" <?= (isset($post_data['menu_parent']) and $post_data['menu_parent'] == $value_pl['post_id']) ? 'selected' : ''; ?>><?= $value_pl['title']; ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="menu_order">ลำดับการแสดง</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="menu_order" id="sort_order" value="<?= (isset($post_data['menu_order']) and $post_data['menu_order']) ? $post_data['menu_order'] : '0'; ?>">
                            </div>
                        </div>
                        <div class="form-actions fluid action-full">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">Submit</button>
                                <a href="<?= site_url('cms/cms_menu'); ?>" class="btn default">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
</script>