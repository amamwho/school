<!-- BEGIN PAGE LEVEL PLUGINS -->
<!-- BEGIN FILEINPUT -->
<link rel="stylesheet" type="text/css" href="assets/cms/metronic/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<script src="assets/cms/metronic/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<!-- END FILEINPUT -->
<!-- END PAGE LEVEL PLUGINS -->
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-reorder"></i>Banner
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
                            <label class="col-md-3 control-label" for="title">หัวข้อ *</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" id="title" <?= (isset($banner_data['title']) and $banner_data['title']) ? 'value="' . $banner_data['title'] . '"' : ''; ?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="banner_category_id">หมวดหมู่ *</label>
                            <div class="col-md-6">
                                <style> option[disabled] { display:none; } </style>
                                <select class="form-control" name="banner_category_id" id="banner_category_id">
                                    <option disabled <?= (empty($banner_data['banner_category_id'])) ? 'selected' : ''; ?>>เลือกหมวดหมู่</option>
                                    <?php if(isset($banner_category) and $banner_category) { ?>
                                        <?php foreach ($banner_category as $value_bc) { ?>
                                    <option value="<?= $value_bc['banner_category_id']; ?>" <?= (isset($banner_data['banner_category_id']) and $banner_data['banner_category_id'] == $value_bc['banner_category_id']) ? 'selected' : ''; ?>><?= $value_bc['cate_name']; ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3"></label>
                            <div class="col-md-6">
                                <?= (isset($banner_data['thumb']) and $banner_data['thumb']) ? '<div class="field" id="thumb"><label></label><img class="form-thumb" src="' . getImagePath($this->images_path_banner . $banner_data['thumb']) . '" /><a class="btn red" title="ลบ" id="del_img"><i class="fa fa-trash-o"></i> Delete</a></div><input id="del" type="hidden" name="del" value="0" />' : ''; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="image">รูปภาพ</label>
                            <div class="col-md-6">
                                <?/*<input name="image" type="file" id="image">*/?>
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="input-group">
                                        <div class="form-control uneditable-input span3" data-trigger="fileinput">
                                            <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                            <span class="fileinput-filename">
                                            </span>
                                        </div>
                                        <span class="input-group-addon btn default btn-file">
                                            <span class="fileinput-new">
                                                Select file
                                            </span>
                                            <span class="fileinput-exists">
                                                Change
                                            </span>
                                            <input type="file" name="image" id="image">
                                        </span>
                                        <a href="#" class="input-group-addon btn default fileinput-exists" data-dismiss="fileinput">
                                            Remove
                                        </a>
                                    </div>
                                </div>
                                <p class="help-block">917px * 375px</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="link">link</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="link" id="link" <?= (isset($banner_data['link']) and $banner_data['link']) ? 'value="' . $banner_data['link'] . '"' : ''; ?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="short_description">คำอธิบายสั้นๆ</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="short_description" id="short_description" <?= (isset($banner_data['short_description']) and $banner_data['short_description']) ? 'value="' . $banner_data['short_description'] . '"' : ''; ?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="description">รายละเอียด</label>
                            <div class="col-md-6">
                                <textarea class="form-control" rows="3" name="description" id="description"><?= (isset($banner_data['description']) and $banner_data['description']) ? $banner_data['description'] : ''; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="status1">แสดง</label>
                            <div class="col-md-6">
                                <div class="radio-list">
                                    <label>
                                        <div class="radio" id="uniform-status1">
                                            <input type="radio" name="status" value="0" id="status1" <?= (!isset($banner_data['status']) or $banner_data['status'] == 0) ? 'checked="checked"' : ''; ?>>
                                        </div> ไม่ทำงาน 
                                    </label>
                                    <label>
                                        <div class="radio" id="uniform-status2">
                                            <input type="radio" name="status" value="1" id="status2" <?= (isset($banner_data['status']) and $banner_data['status'] == 1) ? 'checked="checked"' : ''; ?>>
                                        </div> ทำงาน
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="sort_order">ลำดับการแสดง</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="sort_order" id="sort_order" value="<?= (isset($banner_data['sort_order']) and $banner_data['sort_order']) ? $banner_data['sort_order'] : '0'; ?>">
                            </div>
                        </div>
                        <div class="form-actions fluid action-full">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">Submit</button>
                                <a href="<?= site_url('cms/cms_banner'); ?>" class="btn default">Cancel</a>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>