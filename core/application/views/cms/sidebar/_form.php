<!-- BEGIN PAGE LEVEL PLUGINS -->
<!-- BEGIN EDITOR -->
<link rel="stylesheet" type="text/css" href="assets/cms/metronic/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>
<script type="text/javascript" src="assets/cms/metronic/plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="assets/cms/metronic/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="assets/cms/metronic/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<!-- END EDITOR -->
<!-- END PAGE LEVEL PLUGINS -->
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-reorder"></i>Sidebar
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
                            <label class="col-md-3 control-label" for="name">ชื่อหัวข้อ *</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" id="name" <?= (isset($sidebar_data['name']) and $sidebar_data['name']) ? 'value="' . $sidebar_data['name'] . '"' : ''; ?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="detail">รายละเอียด *</label>
                            <div class="col-md-6">
                                <textarea class="ckeditor form-control" name="detail" rows="6" id="detail"><?= (isset($sidebar_data['detail']) and $sidebar_data['detail']) ? $sidebar_data['detail'] : ''; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="position">ตำแหน่ง</label>
                            <div class="col-md-6">
                                <style> option[disabled] { display:none; } </style>
                                <select class="form-control" name="position" id="position">
                                    <option disabled <?= (empty($sidebar_data['position'])) ? 'selected' : ''; ?>>เลือก</option>
                                    <?php if(isset($constants_sidebar) and $constants_sidebar) { ?>
                                        <?php foreach ($constants_sidebar as $value_cs) { ?>
                                            <option value="<?= $value_cs['key']; ?>" <?= (isset($sidebar_data['position']) and $sidebar_data['position'] == $value_cs['key']) ? 'selected' : ''; ?>><?= $value_cs['value']; ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="status1">แสดง</label>
                            <div class="col-md-6">
                                <div class="radio-list">
                                    <label>
                                        <div class="radio" id="uniform-status1">
                                            <input type="radio" name="status" value="0" id="status1" <?= (!isset($sidebar_data['status']) or $sidebar_data['status'] == 0) ? 'checked="checked"' : ''; ?>>
                                        </div> ไม่ทำงาน 
                                    </label>
                                    <label>
                                        <div class="radio" id="uniform-status2">
                                            <input type="radio" name="status" value="1" id="status2" <?= (isset($sidebar_data['status']) and $sidebar_data['status'] == 1) ? 'checked="checked"' : ''; ?>>
                                        </div> ทำงาน
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="sort_order">ลำดับการแสดง</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="sort_order" id="sort_order" value="<?= (isset($sidebar_data['sort_order']) and $sidebar_data['sort_order']) ? $sidebar_data['sort_order'] : '0'; ?>">
                            </div>
                        </div>
                        <div class="form-actions fluid action-full">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">Submit</button>
                                <a href="<?= site_url('cms/cms_staff'); ?>" class="btn default">Cancel</a>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>