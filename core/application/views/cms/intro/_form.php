<!-- BEGIN PAGE LEVEL PLUGINS -->
<!-- BEGIN EDITOR -->
<link rel="stylesheet" type="text/css" href="assets/cms/metronic/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>
<script type="text/javascript" src="assets/cms/metronic/plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="assets/cms/metronic/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="assets/cms/metronic/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<!-- END EDITOR -->
<!-- BEGIN FILEINPUT -->
<link rel="stylesheet" type="text/css" href="assets/cms/metronic/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<script src="assets/cms/metronic/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<!-- END FILEINPUT -->
<!-- END EDITOR -->
<!-- BEGIN COLORPICKER -->
<link rel="stylesheet" type="text/css" href="assets/cms/colpick_jquery_color-picker/css/colpick.css"/>
<script src="assets/cms/colpick_jquery_color-picker/js/colpick.js" type="text/javascript"></script>
<!-- END COLORPICKER -->
<!-- END PAGE LEVEL PLUGINS -->
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-reorder"></i>Intro
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
                                <input type="text" class="form-control" name="title" id="title" <?= (isset($intro_data['title']) and $intro_data['title']) ? 'value="' . $intro_data['title'] . '"' : ''; ?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="description">รายละเอียด</label>
                            <div class="col-md-6">
                                <textarea class="ckeditor form-control" name="description" rows="6" id="content"><?= (isset($intro_data['description']) and $intro_data['description']) ? $intro_data['description'] : ''; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3"></label>
                            <div class="col-md-6">
                                <?= (isset($intro_data['image']) and $intro_data['image']) ? '<div class="field" id="thumb_image"><label></label><img class="form-thumb" src="' . getImagePath($this->images_path_intro . $intro_data['image']) . '" /><a class="btn red" title="ลบ" onclick="deleteImg(\'image\');"><i class="fa fa-trash-o"></i> Delete</a></div><input id="del_image" type="hidden" name="del_image" value="0" />' : ''; ?>
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
                            <label class="col-md-3"></label>
                            <div class="col-md-6">
                                <?= (isset($intro_data['image_btn']) and $intro_data['image_btn']) ? '<div class="field" id="thumb_image_btn"><label></label><img class="form-thumb" src="' . getImagePath($this->images_path_intro . $intro_data['image_btn']) . '" /><a class="btn red" title="ลบ" onclick="deleteImg(\'image_btn\');"><i class="fa fa-trash-o"></i> Delete</a></div><input id="del_image_btn" type="hidden" name="del_image_btn" value="0" />' : ''; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="image_btn">รูปภาพปุ่ม</label>
                            <div class="col-md-6">
                                <?/*<input name="image_btn" type="file" id="image_btn">*/?>
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
                                            <input type="file" name="image_btn" id="image_btn">
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
                            <label class="col-md-3"></label>
                            <div class="col-md-6">
                                <?= (isset($intro_data['image_bg']) and $intro_data['image_bg']) ? '<div class="field" id="thumb_image_bg"><label></label><img class="form-thumb" src="' . getImagePath($this->images_path_intro . $intro_data['image_bg']) . '" /><a class="btn red" title="ลบ" onclick="deleteImg(\'image_bg\');"><i class="fa fa-trash-o"></i> Delete</a></div><input id="del_image_bg" type="hidden" name="del_image_bg" value="0" />' : ''; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="image_bg">รูปพื้นหลัง</label>
                            <div class="col-md-6">
                                <?/*<input name="image_bg" type="file" id="image_bg">*/?>
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
                                            <input type="file" name="image_bg" id="image_bg">
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
                            <label class="col-md-3 control-label" for="bg_color">สีพื้นหลัง</label>
                            <div class="col-md-1">
                                <input type="text" class="form-control" name="bg_color" id="bg_color" <?= (isset($intro_data['bg_color']) and $intro_data['bg_color']) ? 'value="' . $intro_data['bg_color'] . '"' : ''; ?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="status1">แสดง</label>
                            <div class="col-md-6">
                                <div class="radio-list">
                                    <label>
                                        <div class="radio" id="uniform-status1">
                                            <input type="radio" name="status" value="0" id="status1" <?= (!isset($intro_data['status']) or $intro_data['status'] == 0) ? 'checked="checked"' : ''; ?>>
                                        </div> ไม่ทำงาน 
                                    </label>
                                    <label>
                                        <div class="radio" id="uniform-status2">
                                            <input type="radio" name="status" value="1" id="status2" <?= (isset($intro_data['status']) and $intro_data['status'] == 1) ? 'checked="checked"' : ''; ?>>
                                        </div> ทำงาน
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="sort_order">ลำดับการแสดง</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="sort_order" id="sort_order" value="<?= (isset($intro_data['sort_order']) and $intro_data['sort_order']) ? $intro_data['sort_order'] : '0'; ?>">
                            </div>
                        </div>
                        <div class="form-actions fluid action-full">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">Submit</button>
                                <a href="<?= site_url('cms/cms_intro'); ?>" class="btn default">Cancel</a>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <script>
        $(function(){
            $('#bg_color').colpick({
                layout:'hex',
                submit:0,
                onChange:function(hsb,hex,rgb,el,bySetColor) {
                    $(el).css('border-color','#'+hex);
                    if(!bySetColor) $(el).val(hex);
                }
            }).keyup(function(){
                $(this).colpickSetColor(this.value);
            });
        });
    </script>