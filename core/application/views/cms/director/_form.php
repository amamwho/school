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
<!-- BEGIN PICKER -->
<link rel="stylesheet" type="text/css" href="assets/cms/metronic/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
<script src="assets/cms/metronic/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="assets/cms/metronic/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/cms/metronic/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script type="text/javascript" src="assets/cms/metronic/plugins/jquery.sparkline.min.js"></script>
<script>
    jQuery(document).ready(function() {       
       $('.date-picker').datepicker();
       $('.begindate').datepicker();
       $('.enddate').datepicker();
    });   
</script>
<!-- END PICKER -->
<!-- END PAGE LEVEL PLUGINS -->
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-reorder"></i>ผู้บริหาร
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
                            <label class="col-md-3 control-label" for="firstname">ชื่อ *</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="firstname" id="firstname" <?= (isset($director_data['firstname']) and $director_data['firstname']) ? 'value="' . $director_data['firstname'] . '"' : ''; ?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="lastname">นามสกุล *</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="lastname" id="lastname" <?= (isset($director_data['lastname']) and $director_data['lastname']) ? 'value="' . $director_data['lastname'] . '"' : ''; ?>>
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
                            <label class="col-md-3 control-label" for="major">เข้ารับตำแหน่ง</label>
                            <div class="col-md-6">
                                <?php $begindate = ''; ?>
                                <?php if(isset($director_data['begindate']) and $director_data['begindate']) { ?>
                                    <?php list($y, $m, $d) = explode('-', $director_data['begindate']); ?>
                                    <?php $begindate = 'value="'.$d.'-'.$m.'-'.$y.'"'; ?>
                                <?php } ?>
                                <div class="input-group input-medium date begindate" data-date-format="dd-mm-yyyy">
                                    <input type="text" class="form-control" name="begindate" readonly <?= $begindate; ?>>
                                    <span class="input-group-btn">
                                        <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="major">ออกจากตำแหน่ง</label>
                            <div class="col-md-6">
                                <?php $enddate = ''; ?>
                                <?php if(isset($director_data['enddate']) and $director_data['enddate']) { ?>
                                    <?php list($y, $m, $d) = explode('-', $director_data['enddate']); ?>
                                    <?php $enddate = 'value="'.$d.'-'.$m.'-'.$y.'"'; ?>
                                <?php } ?>
                                <div class="input-group input-medium date enddate" data-date-format="dd-mm-yyyy">
                                    <input type="text" class="form-control" name="enddate" readonly <?= $enddate; ?>>
                                    <span class="input-group-btn">
                                        <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="address">ที่อยู่</label>
                            <div class="col-md-6">
                                <textarea class="form-control" rows="3" name="address" id="address"><?= (isset($director_data['address']) and $director_data['address']) ? $director_data['address'] : ''; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="mobile">เบอร์โทรศัพท์</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="mobile" id="mobile" <?= (isset($director_data['mobile']) and $director_data['mobile']) ? 'value="' . $director_data['mobile'] . '"' : ''; ?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="email">อีเมล</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="email" id="email" <?= (isset($director_data['email']) and $director_data['email']) ? 'value="' . $director_data['email'] . '"' : ''; ?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="description">ข้อมูล</label>
                            <div class="col-md-6">
                                <textarea class="ckeditor form-control" name="description" rows="6" id="description"><?= (isset($director_data['description']) and $director_data['description']) ? $director_data['description'] : ''; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3"></label>
                            <div class="col-md-6">
                                <?= (isset($director_data['thumb']) and $director_data['thumb']) ? '<div class="field" id="thumb"><label></label><img class="form-thumb" src="' . getImagePath($this->images_path_director . $director_data['thumb']) . '" /><a class="btn red" title="ลบ" id="del_img"><i class="fa fa-trash-o"></i> Delete</a></div><input id="del" type="hidden" name="del" value="0" />' : ''; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="image">รูปภาพ</label>
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
                                            <input type="file" name="image" id="image">
                                        </span>
                                        <a href="#" class="input-group-addon btn default fileinput-exists" data-dismiss="fileinput">
                                            Remove
                                        </a>
                                    </div>
                                </div>
                                <p class="help-block">กว้าง400px * สูง300px</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="status1">แสดง</label>
                            <div class="col-md-6">
                                <div class="radio-list">
                                    <label>
                                        <div class="radio" id="uniform-status1">
                                            <input type="radio" name="status" value="0" id="status1" <?= (!isset($director_data['status']) or $director_data['status'] == 0) ? 'checked="checked"' : ''; ?>>
                                        </div> ไม่ทำงาน 
                                    </label>
                                    <label>
                                        <div class="radio" id="uniform-status2">
                                            <input type="radio" name="status" value="1" id="status2" <?= (isset($director_data['status']) and $director_data['status'] == 1) ? 'checked="checked"' : ''; ?>>
                                        </div> ทำงาน
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="sort_order">ลำดับการแสดง</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="sort_order" id="sort_order" value="<?= (isset($director_data['sort_order']) and $director_data['sort_order']) ? $director_data['sort_order'] : '0'; ?>">
                            </div>
                        </div>
                        <div class="form-actions fluid action-full">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">Submit</button>
                                <a href="<?= site_url('cms/cms_director'); ?>" class="btn default">Cancel</a>
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