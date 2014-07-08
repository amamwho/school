<!-- BEGIN PAGE LEVEL PLUGINS -->
<!-- BEGIN FILEINPUT -->
<link rel="stylesheet" type="text/css" href="assets/cms/metronic/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<script src="assets/cms/metronic/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<!-- END FILEINPUT -->
<!-- BEGIN PICKER -->
<link rel="stylesheet" type="text/css" href="assets/cms/metronic/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
<script src="assets/cms/metronic/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="assets/cms/metronic/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/cms/metronic/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script type="text/javascript" src="assets/cms/metronic/plugins/jquery.sparkline.min.js"></script>
<script>
    jQuery(document).ready(function() {       
       $('.date-picker').datepicker();
    });   
</script>
<!-- END PICKER -->
<!-- END PAGE LEVEL PLUGINS -->
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-reorder"></i>บุคลากร
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
                        <?php if(empty($staff_category_id)) { ?>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="staff_category_id">กลุ่มสาระ / หมวด *</label>
                                <div class="col-md-6">
                                    <style> option[disabled] { display:none; } </style>
                                    <select class="form-control" name="staff_category_id" id="staff_category_id">
                                        <option disabled <?= (empty($staff_data['staff_category_id'])) ? 'selected' : ''; ?>>เลือกกลุ่มสาระ / หมวด</option>
                                        <?php if(isset($staff_category) and $staff_category) { ?>
                                            <?php foreach ($staff_category as $value_sc) { ?>
                                        <option value="<?= $value_sc['staff_category_id']; ?>" <?= (isset($staff_data['staff_category_id']) and $staff_data['staff_category_id'] == $value_sc['staff_category_id']) ? 'selected' : ''; ?>><?= $value_sc['name']; ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="firstname">ชื่อ *</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="firstname" id="firstname" <?= (isset($staff_data['firstname']) and $staff_data['firstname']) ? 'value="' . $staff_data['firstname'] . '"' : ''; ?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="lastname">นามสกุล *</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="lastname" id="lastname" <?= (isset($staff_data['lastname']) and $staff_data['lastname']) ? 'value="' . $staff_data['lastname'] . '"' : ''; ?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="gender1">เพศ</label>
                            <div class="col-md-6">
                                <div class="radio-list">
                                    <label>
                                        <div class="radio" id="uniform-status1">
                                            <input type="radio" name="gender" value="M" id="gender1" <?= (!isset($staff_data['gender']) or $staff_data['gender'] == 'M') ? 'checked="checked"' : ''; ?>>
                                        </div> ชาย 
                                    </label>
                                    <label>
                                        <div class="radio" id="uniform-status2">
                                            <input type="radio" name="gender" value="F" id="gender2" <?= (isset($staff_data['gender']) and $staff_data['gender'] == 'F') ? 'checked="checked"' : ''; ?>>
                                        </div> หญิง
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="position">ตำแหน่ง</label>
                            <div class="col-md-6">
                                <style> option[disabled] { display:none; } </style>
                                <select class="form-control" name="position" id="position">
                                    <option disabled <?= (empty($staff_data['position'])) ? 'selected' : ''; ?>>เลือก</option>
                                    <?php if(isset($constants_position) and $constants_position) { ?>
                                        <?php foreach ($constants_position as $value_cp) { ?>
                                            <option value="<?= $value_cp['key']; ?>" <?= (isset($staff_data['position']) and $staff_data['position'] == $value_cp['key']) ? 'selected' : ''; ?>><?= $value_cp['value']; ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group position_oth <?= (isset($staff_data['position']) and isset($constants_position) and in_array(array('key' => $staff_data['position'], 'value' => 'อื่นๆ'), $constants_position)) ? '' : 'other'; ?>">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <label class="col-md-1 control-label" for="position_oth">อื่นๆ</label>
                                <div class="col-md-11">
                                    <input type="text" class="form-control" name="position_oth" id="position_oth" <?= (isset($staff_data['position_oth']) and $staff_data['position_oth']) ? 'value="' . $staff_data['position_oth'] . '"' : ''; ?>>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="qualification">วุฒิการศึกษา</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="qualification" id="qualification" <?= (isset($staff_data['qualification']) and $staff_data['qualification']) ? 'value="' . $staff_data['qualification'] . '"' : ''; ?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="major">วิชาเอก</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="major" id="major" <?= (isset($staff_data['major']) and $staff_data['major']) ? 'value="' . $staff_data['major'] . '"' : ''; ?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="class">ประเภทบุคลากร</label>
                            <div class="col-md-6">
                                <style> option[disabled] { display:none; } </style>
                                <select class="form-control" name="class" id="class">
                                    <option disabled <?= (empty($staff_data['class'])) ? 'selected' : ''; ?>>เลือก</option>
                                    <?php if(isset($constants_stafftype) and $constants_stafftype) { ?>
                                        <?php foreach ($constants_stafftype as $value_cs) { ?>
                                            <option value="<?= $value_cs['key']; ?>" <?= (isset($staff_data['class']) and $staff_data['class'] == $value_cs['key']) ? 'selected' : ''; ?>><?= $value_cs['value']; ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group class_oth <?= (isset($staff_data['class']) and isset($constants_stafftype) and in_array(array('key' => $staff_data['class'], 'value' => 'อื่นๆ'), $constants_stafftype)) ? '' : 'other'; ?>">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <label class="col-md-1 control-label" for="class_oth">อื่นๆ</label>
                                <div class="col-md-11">
                                    <input type="text" class="form-control" name="class_oth" id="class_oth" <?= (isset($staff_data['class_oth']) and $staff_data['class_oth']) ? 'value="' . $staff_data['class_oth'] . '"' : ''; ?>>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="major">วันเกิด</label>
                            <div class="col-md-6">
                                <?php $birthday = ''; ?>
                                <?php if(isset($director_data['birthday']) and $director_data['birthday']) { ?>
                                    <?php list($y, $m, $d) = explode('-', $director_data['birthday']); ?>
                                    <?php $birthday = 'value="'.$d.'-'.$m.'-'.$y.'"'; ?>
                                <?php } ?>
                                <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy">
                                    <input type="text" class="form-control" name="birthday" readonly <?= $birthday; ?>>
                                    <span class="input-group-btn">
                                        <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="address">ที่อยู่</label>
                            <div class="col-md-6">
                                <textarea class="form-control" rows="3" name="address" id="address"><?= (isset($staff_data['address']) and $staff_data['address']) ? $staff_data['address'] : ''; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="mobile">เบอร์โทรศัพท์มือถือ</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="mobile" id="mobile" <?= (isset($staff_data['mobile']) and $staff_data['mobile']) ? 'value="' . $staff_data['mobile'] . '"' : ''; ?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="email">อีเมล</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="email" id="email" <?= (isset($staff_data['email']) and $staff_data['email']) ? 'value="' . $staff_data['email'] . '"' : ''; ?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3"></label>
                            <div class="col-md-6">
                                <?= (isset($staff_data['thumb']) and $staff_data['thumb']) ? '<div class="field" id="thumb"><label></label><img class="form-thumb" src="' . getImagePath($this->images_path_staff . $staff_data['thumb']) . '" /><a class="btn red" title="ลบ" id="del_img"><i class="fa fa-trash-o"></i> Delete</a></div><input id="del" type="hidden" name="del" value="0" />' : ''; ?>
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
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="status1">แสดง</label>
                            <div class="col-md-6">
                                <div class="radio-list">
                                    <label>
                                        <div class="radio" id="uniform-status1">
                                            <input type="radio" name="status" value="0" id="status1" <?= (!isset($staff_data['status']) or $staff_data['status'] == 0) ? 'checked="checked"' : ''; ?>>
                                        </div> ไม่ทำงาน 
                                    </label>
                                    <label>
                                        <div class="radio" id="uniform-status2">
                                            <input type="radio" name="status" value="1" id="status2" <?= (isset($staff_data['status']) and $staff_data['status'] == 1) ? 'checked="checked"' : ''; ?>>
                                        </div> ทำงาน
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="sort_order">ลำดับการแสดง</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="sort_order" id="sort_order" value="<?= (isset($staff_data['sort_order']) and $staff_data['sort_order']) ? $staff_data['sort_order'] : '0'; ?>">
                            </div>
                        </div>
                        <div class="form-actions fluid action-full">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">Submit</button>
                                <?php if(isset($staff_category_id) and $staff_category_id) { ?>
                                    <a href="<?= site_url('cms/cms_staff/staffList/'.$staff_category_id); ?>" class="btn default">Cancel</a>
                                <?php } else if(isset($staff_data['staff_category_id']) and $staff_data['staff_category_id']) { ?>
                                    <a href="<?= site_url('cms/cms_staff/staffList/'.$staff_data['staff_category_id']); ?>" class="btn default">Cancel</a>
                                <?php } else { ?>
                                    <a href="<?= site_url('cms/cms_staff'); ?>" class="btn default">Cancel</a>
                                <?php } ?>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $("select#position").change(function(){
            if($("select#position option:selected").html() == 'อื่นๆ') {
                $("div.position_oth").show();
            } else {
                $("div.position_oth").hide();
            }
        });
        $("select#class").change(function(){
            if($("select#class option:selected").html() == 'อื่นๆ') {
                $("div.class_oth").show();
            } else {
                $("div.class_oth").hide();
            }
        });
    });
</script>