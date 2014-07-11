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
                    <i class="fa fa-file-o"></i><?= $page_name; ?>
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
                                <input type="text" class="form-control" name="name" id="title" <?= (isset($document_data['name']) and $document_data['name']) ? 'value="' . $document_data['name'] . '"' : ''; ?>>
                            </div>
                        </div>
                        <?php if(isset($action) and $action == 'update') { ?>
                            <div class="form-group vdo-file">
                                <label class="col-md-3 control-label" for="file">ไฟล์เอกสาร</label>
                                <div class="col-md-6">
                                    <p class="help-block">
                                        <a href="<?= site_url('loadFile/'.$document_data['raw']);?>" target="_blank"><i class="fa fa-link"></i> <?= $document_data['original_filename']; ?></a>
                                    </p>
                                </div>
                            </div>
                        <?php } else {?>
                            <div class="form-group vdo-file">
                                <label class="col-md-3 control-label" for="file">ไฟล์เอกสาร *</label>
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
                                                <input type="file" name="file" id="file">
                                            </span>
                                            <a href="#" class="input-group-addon btn default fileinput-exists" data-dismiss="fileinput">
                                                Remove
                                            </a>
                                        </div>
                                    </div>
                                    <p class="help-block">เฉพาะไฟล์ .doc|.docx|.xls|.xlsx|.pdf|.ppt|.rar|.zip ขนาดไม่เกิน 3MB</p>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="password">รหัสผ่าน</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="password" id="password" <?= (isset($document_data['password']) and $document_data['password']) ? 'value="' . $this->encrypt->decode($document_data['password']) . '"' : ''; ?>>
                            </div>
                        </div>
                        <?/*<div class="form-group">
                            <label class="col-md-3 control-label" for="link">link</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="link" id="link" <?= (isset($document_data['link']) and $document_data['link']) ? 'value="' . $document_data['link'] . '"' : ''; ?>>
                            <?/*</div>
                        </div>
                        */?>
                        <?php if(isset($type) and $type == 'I') { ?>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="banner_category_id">หมวดหมู่ *</label>
                                <div class="col-md-6">
                                    <style> option[disabled] { display:none; } </style>
                                    <select class="form-control" name="banner_category_id" id="banner_category_id">
                                        <option disabled <?= (empty($document_data['banner_category_id'])) ? 'selected' : ''; ?>>เลือกหมวดหมู่</option>
                                        <?php if(isset($banner_category) and $banner_category) { ?>
                                            <?php foreach ($banner_category as $value_bc) { ?>
                                        <option value="<?= $value_bc['banner_category_id']; ?>" <?= (isset($document_data['banner_category_id']) and $document_data['banner_category_id'] == $value_bc['banner_category_id']) ? 'selected' : ''; ?>><?= $value_bc['cate_name']; ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="status1">แสดง</label>
                            <div class="col-md-6">
                                <div class="radio-list">
                                    <label>
                                        <div class="radio" id="uniform-status1">
                                            <input type="radio" name="status" value="0" id="status1" <?= (!isset($document_data['status']) or $document_data['status'] == 0) ? 'checked="checked"' : ''; ?>>
                                        </div> ไม่ทำงาน 
                                    </label>
                                    <label>
                                        <div class="radio" id="uniform-status2">
                                            <input type="radio" name="status" value="1" id="status2" <?= (isset($document_data['status']) and $document_data['status'] == 1) ? 'checked="checked"' : ''; ?>>
                                        </div> ทำงาน
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions fluid action-full">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">Submit</button>
                                <a href="<?= site_url('cms/cms_document/'.$type_name); ?>" class="btn default">Cancel</a>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>