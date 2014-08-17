<!-- BEGIN PAGE LEVEL PLUGINS -->
<!-- BEGIN EDITOR -->
<link rel="stylesheet" type="text/css" href="assets/cms/metronic/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>
<script type="text/javascript" src="assets/cms/metronic/plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="assets/cms/metronic/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="assets/cms/metronic/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<!-- END EDITOR -->
<!-- BEGIN FILEINPUT -->
<link rel="stylesheet" type="text/css" href="assets/cms/metronic/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<script type="text/javascript" src="assets/cms/metronic/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<!-- END FILEINPUT -->
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
                            <label class="col-md-3 control-label" for="title">หัวข้อ *</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" id="title" <?= (isset($post_data['title']) and $post_data['title']) ? 'value="' . $post_data['title'] . '"' : ''; ?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="content">เนื้อหา *</label>
                            <div class="col-md-6">
                                <textarea class="ckeditor form-control" name="content" rows="6" id="content"><?= (isset($post_data['content']) and $post_data['content']) ? $post_data['content'] : ''; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="meta_title">Meta tag title</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="meta_title" id="meta_title" <?= (isset($post_data['meta_title']) and $post_data['meta_title']) ? 'value="' . $post_data['meta_title'] . '"' : ''; ?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="meta_desc">Meta tag description</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="meta_desc" id="meta_desc" <?= (isset($post_data['meta_desc']) and $post_data['meta_desc']) ? 'value="' . $post_data['meta_desc'] . '"' : ''; ?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3"></label>
                            <div class="col-md-6">
                                <?= (isset($post_data['thumb']) and $post_data['thumb']) ? '<div class="field" id="thumb"><label></label><img class="form-thumb" src="' . getImagePath($this->images_path_post . $post_data['thumb']) . '" /><a class="btn red" title="ลบ" id="del_img"><i class="fa fa-trash-o"></i> Delete</a></div><input id="del" type="hidden" name="del" value="0" />' : ''; ?>
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
                                <p class="help-block">กว้าง554px * สูง312px</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="vdo_type">ประเภท VDO</label>
                            <div class="col-md-6">
                                <select class="form-control" name="vdo_type" id="vdo_type">
                                    <option value="">เลือกประเภท</option>
                                    <option value="F" <?= (isset($post_data['vdo_type']) and $post_data['vdo_type'] == 'F') ? 'selected' : ''; ?>>File</option>
                                    <option value="E" <?= (isset($post_data['vdo_type']) and $post_data['vdo_type'] == 'E') ? 'selected' : ''; ?>>Embed</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group vdo-file">
                            <label class="col-md-3"></label>
                            <div class="col-md-6">
                                <?= ((isset($post_data['vdo_type']) and $post_data['vdo_type'] == 'F') and (isset($post_data['vdo']) and $post_data['vdo'])) ? '<div class="field" id="vdo"><label></label><a class="link-vdo" href="' . $this->vdo_path . $post_data['vdo'] . '" target="_blank">' . $post_data['vdo'] . '</a><a class="btn red" title="ลบ" id="del_vdo"><i class="fa fa-trash-o"></i> Delete</a></div><input id="del_vdo" type="hidden" name="del_vdo" value="0" />' : ''; ?>
                            </div>
                        </div>
                        <div class="form-group vdo-file">
                            <label class="col-md-3 control-label" for="vdo_file">VDO File</label>
                            <div class="col-md-6">
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
                                            <input type="file" name="" id="vdo_file">
                                        </span>
                                        <a href="#" class="input-group-addon btn default fileinput-exists" data-dismiss="fileinput">
                                            Remove
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group vdo-embed">
                            <label class="col-md-3 control-label" for="vdo-embed">VDO Embed</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="" id="vdo_embed" <?= ((isset($post_data['vdo_type']) and $post_data['vdo_type'] == 'E') and (isset($post_data['vdo']) and $post_data['vdo'])) ? 'value="' . htmlentities($post_data['vdo']) . '"' : ''; ?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="type">ประเภท</label>
                            <div class="col-md-6">
                                <style> option[disabled] { display:none; } </style>
                                <select class="form-control" name="type" id="type">
                                    <option disabled <?= (empty($post_data['type'])) ? 'selected' : ''; ?>>เลือกประเภท</option>
                                    <option value="post" <?= (isset($post_data['type']) and $post_data['type'] == 'post') ? 'selected' : ''; ?>>Post</option>
                                    <option value="page" <?= (isset($post_data['type']) and $post_data['type'] == 'page') ? 'selected' : ''; ?>>Page</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group post_category_id <?= (isset($post_data['type']) and $post_data['type'] == 'post') ? '' : 'other'; ?>">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <label class="col-md-2 control-label" for="post_category_id">ประเภทโพส</label>
                                <div class="col-md-10">
                                    <style> option[disabled] { display:none; } </style>
                                    <select class="form-control" name="post_category_id" id="post_category_id">
                                        <option disabled <?= (empty($post_data['post_category_id'])) ? 'selected' : ''; ?>>เลือกกลุ่มสาระ / หมวด</option>
                                        <?php if(isset($post_category) and $post_category) { ?>
                                            <?php foreach ($post_category as $value_pc) { ?>
                                                <option value="<?= $value_pc['post_category_id']; ?>" <?= (isset($post_data['post_category_id']) and $post_data['post_category_id'] == $value_pc['post_category_id']) ? 'selected' : ''; ?>><?= $value_pc['name']; ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="status1">แสดง</label>
                            <div class="col-md-6">
                                <div class="radio-list">
                                    <label>
                                        <div class="radio" id="uniform-status1">
                                            <input type="radio" name="status" value="0" id="status1" <?= (!isset($post_data['status']) or $post_data['status'] == 0) ? 'checked="checked"' : ''; ?>>
                                        </div> ไม่ทำงาน 
                                    </label>
                                    <label>
                                        <div class="radio" id="uniform-status2">
                                            <input type="radio" name="status" value="1" id="status2" <?= (isset($post_data['status']) and $post_data['status'] == 1) ? 'checked="checked"' : ''; ?>>
                                        </div> ทำงาน
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="sort_order">ลำดับการแสดง</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="sort_order" id="sort_order" value="<?= (isset($post_data['sort_order']) and $post_data['sort_order']) ? $post_data['sort_order'] : '0'; ?>">
                            </div>
                        </div>
                        <div class="form-actions fluid action-full">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">Submit</button>
                                <a href="<?= site_url('cms/cms_post'); ?>" class="btn default">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('div.vdo-file').hide();
    $('input#vdo_file').attr('name', '');
    $('div.vdo-embed').hide();
    $('input#vdo_embed').attr('name', '');
    <?php if(isset($post_data['vdo_type']) and $post_data['vdo_type'] == 'F') { ?>
        $('div.vdo-file').show();
        $('input#vdo_file').attr('name', 'vdo');
    <?php } else if (isset($post_data['vdo_type']) and $post_data['vdo_type'] == 'E') { ?>
        $('div.vdo-embed').show();
        $('input#vdo_embed').attr('name', 'vdo');
    <?php } ?>
    $('#vdo_type').change(function(){
        if($('#vdo_type option:selected').val() == '') {
            $('div.vdo-file').hide();
            $('input#vdo_file').attr('name', '');
            $('div.vdo-embed').hide();
            $('input#vdo_embed').attr('name', '');
        } else if($('#vdo_type option:selected').val() == 'F') {
            $('div.vdo-embed').hide();
            $('input#vdo_embed').attr('name', '');
            $('div.vdo-file').show();
            $('input#vdo_file').attr('name', 'vdo');
        } else if($('#vdo_type option:selected').val() == 'E') {
            $('div.vdo-file').hide();
            $('input#vdo_file').attr('name', '');
            $('div.vdo-embed').show();
            $('input#vdo_embed').attr('name', 'vdo');
        }
    });
    $("select#type").change(function(){
        if($("select#type option:selected").val() == 'post') {
            $("div.post_category_id").show();
        } else {
            $("div.post_category_id").hide();
        }
    });
</script>