<!-- BEGIN PAGE LEVEL PLUGINS -->
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
<!-- END PAGE LEVEL PLUGINS -->
<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-building-o"></i>ข้อมูลโรงเรียน
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="btn-group">
                        <a class="btn default" href="<?= site_url('cms/cms_school/update'); ?>">
                        <i class="fa fa-pencil"></i>
                        แก้ไขข้อมูล
                    </a>
                    </div>
                </div>
                <?= (isset($do_action) and $do_action == 'update') ? '<form method="post" enctype="multipart/form-data" class="form-horizontal">' : '<div class="form-horizontal">'; ?>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">รหัสโรงเรียน</label>
                            <div class="col-md-6">
                                <?php if(isset($do_action) and $do_action == 'update') { ?>
                                    <input type="text" class="form-control" name="code" <?= (isset($school_data['code']) and $school_data['code']) ? 'value="'.$school_data['code'].'"' : ''; ?>>
                                <?php } else { ?>
                                    <p class="data-desc"><?= (isset($school_data['code']) and $school_data['code']) ? $school_data['code'] : '123456789'; ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">ชื่อสถานศึกษา(ไทย)</label>
                            <div class="col-md-6">
                                <?php if(isset($do_action) and $do_action == 'update') { ?>
                                    <input type="text" class="form-control" name="name_th" <?= (isset($school_data['name_th']) and $school_data['name_th']) ? 'value="'.$school_data['name_th'].'"' : ''; ?>>
                                <?php } else { ?>
                                    <p class="data-desc"><?= (isset($school_data['name_th']) and $school_data['name_th']) ? $school_data['name_th'] : 'xxxxxxxxxxxxx xxxxxxxxxxxxxxx'; ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">ชื่อสถานศึกษา(อังกฤษ)</label>
                            <div class="col-md-6">
                                <?php if(isset($do_action) and $do_action == 'update') { ?>
                                    <input type="text" class="form-control" name="name_en" <?= (isset($school_data['name_en']) and $school_data['name_en']) ? 'value="'.$school_data['name_en'].'"' : ''; ?>>
                                <?php } else { ?>
                                    <p class="data-desc"><?= (isset($school_data['name_en']) and $school_data['name_en']) ? $school_data['name_en'] : 'xxxxxxxxxxxxx xxxxxxxxxxxxxxx'; ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">สังกัด</label>
                            <div class="col-md-6">
                                <?php if(isset($do_action) and $do_action == 'update') { ?>
                                    <input type="text" class="form-control" name="be_under" <?= (isset($school_data['be_under']) and $school_data['be_under']) ? 'value="'.$school_data['be_under'].'"' : ''; ?>>
                                <?php } else { ?>
                                    <p class="data-desc"><?= (isset($school_data['be_under']) and $school_data['be_under']) ? $school_data['be_under'] : 'xxxxxxxxxxxxx xxxxxxxxxxxxxxx'; ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">เขต</label>
                            <div class="col-md-6">
                                <?php if(isset($do_action) and $do_action == 'update') { ?>
                                    <input type="text" class="form-control" name="area_no" <?= (isset($school_data['area_no']) and $school_data['area_no']) ? 'value="'.$school_data['area_no'].'"' : ''; ?>>
                                <?php } else { ?>
                                    <p class="data-desc"><?= (isset($school_data['area_no']) and $school_data['area_no']) ? $school_data['area_no'] : 'xxxxxxxxxxxxx xxxxxxxxxxxxxxx'; ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">ระดับที่เปิดสอน</label>
                            <div class="col-md-6">
                                <?php if(isset($do_action) and $do_action == 'update') { ?>
                                    <input type="text" class="form-control" name="level" <?= (isset($school_data['level']) and $school_data['level']) ? 'value="'.$school_data['level'].'"' : ''; ?>>
                                <?php } else { ?>
                                    <p class="data-desc"><?= (isset($school_data['level']) and $school_data['level']) ? $school_data['level'] : 'xxxxxxxxxxxxx xxxxxxxxxxxxxxx'; ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">วันเดือนปี ที่ก่อตั้ง</label>
                            <div class="col-md-6">
                                <?php $establish_date = ''; ?>
                                <?php if(isset($school_data['establish_date']) and $school_data['establish_date']) { ?>
                                    <?php list($y, $m, $d) = explode('-', $school_data['establish_date']); ?>
                                    <?php $establish_date = 'value="'.$d.'-'.$m.'-'.$y.'"'; ?>
                                <?php } ?>
                                <?php if(isset($do_action) and $do_action == 'update') { ?>
                                    <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy">
                                        <input type="text" class="form-control" name="establish_date" readonly <?= $establish_date; ?>>
                                        <span class="input-group-btn">
                                                <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                        </span>
                                    </div>
                                <?php } else { ?>
                                    <p class="data-desc"><?= (isset($establish_date) and $establish_date) ? $establish_date : 'xx-xx-xxxx'; ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">ที่อยู่</label>
                            <div class="col-md-6">
                                <?php if(isset($do_action) and $do_action == 'update') { ?>
                                    <input type="text" class="form-control" name="address" <?= (isset($school_data['address']) and $school_data['address']) ? 'value="'.$school_data['address'].'"' : ''; ?>>
                                <?php } else { ?>
                                    <p class="data-desc"><?= (isset($school_data['address']) and $school_data['address']) ? $school_data['address'] : 'xxxxxxxxxxxxx xxxxxxxxxxxxxxx'; ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">ตำบล</label>
                            <div class="col-md-6">
                                <?php if(isset($do_action) and $do_action == 'update') { ?>
                                    <input type="text" class="form-control" name="district" <?= (isset($school_data['district']) and $school_data['district']) ? 'value="'.$school_data['district'].'"' : ''; ?>>
                                <?php } else { ?>
                                    <p class="data-desc"><?= (isset($school_data['district']) and $school_data['district']) ? $school_data['district'] : 'xxxxxxxxxxxxx xxxxxxxxxxxxxxx'; ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">อำเภอ</label>
                            <div class="col-md-6">
                                <?php if(isset($do_action) and $do_action == 'update') { ?>
                                    <input type="text" class="form-control" name="city" <?= (isset($school_data['city']) and $school_data['city']) ? 'value="'.$school_data['city'].'"' : ''; ?>>
                                <?php } else { ?>
                                    <p class="data-desc"><?= (isset($school_data['city']) and $school_data['city']) ? $school_data['city'] : 'xxxxxxxxxxxxx xxxxxxxxxxxxxxx'; ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">จังหวัด</label>
                            <div class="col-md-6">
                                <?php if(isset($do_action) and $do_action == 'update') { ?>
                                    <input type="text" class="form-control" name="province" <?= (isset($school_data['province']) and $school_data['province']) ? 'value="'.$school_data['province'].'"' : ''; ?>>
                                <?php } else { ?>
                                    <p class="data-desc"><?= (isset($school_data['province']) and $school_data['province']) ? $school_data['province'] : 'xxxxxxxxxxxxx xxxxxxxxxxxxxxx'; ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">รหัสไปรษณีย์</label>
                            <div class="col-md-6">
                                <?php if(isset($do_action) and $do_action == 'update') { ?>
                                    <input type="text" class="form-control" name="postcode" <?= (isset($school_data['postcode']) and $school_data['postcode']) ? 'value="'.$school_data['postcode'].'"' : ''; ?>>
                                <?php } else { ?>
                                    <p class="data-desc"><?= (isset($school_data['postcode']) and $school_data['postcode']) ? $school_data['postcode'] : 'xxxxxxxxxxxxx xxxxxxxxxxxxxxx'; ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">โทรศัพท์</label>
                            <div class="col-md-6">
                                <?php if(isset($do_action) and $do_action == 'update') { ?>
                                    <input type="text" class="form-control" name="phone" <?= (isset($school_data['phone']) and $school_data['phone']) ? 'value="'.$school_data['phone'].'"' : ''; ?>>
                                <?php } else { ?>
                                    <p class="data-desc"><?= (isset($school_data['phone']) and $school_data['phone']) ? $school_data['phone'] : 'xxxxxxxxxxxxx xxxxxxxxxxxxxxx'; ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">โทรสาร</label>
                            <div class="col-md-6">
                                <?php if(isset($do_action) and $do_action == 'update') { ?>
                                    <input type="text" class="form-control" name="fax" <?= (isset($school_data['fax']) and $school_data['fax']) ? 'value="'.$school_data['fax'].'"' : ''; ?>>
                                <?php } else { ?>
                                    <p class="data-desc"><?= (isset($school_data['fax']) and $school_data['fax']) ? $school_data['fax'] : 'xxxxxxxxxxxxx xxxxxxxxxxxxxxx'; ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">ชื่อผู้บริหาร</label>
                            <div class="col-md-6">
                                <?php if(isset($do_action) and $do_action == 'update') { ?>
                                    <input type="text" class="form-control" name="director_teacher" <?= (isset($school_data['director_teacher']) and $school_data['director_teacher']) ? 'value="'.$school_data['director_teacher'].'"' : ''; ?>>
                                <?php } else { ?>
                                    <p class="data-desc"><?= (isset($school_data['director_teacher']) and $school_data['director_teacher']) ? $school_data['director_teacher'] : 'xxxxxxxxxxxxx xxxxxxxxxxxxxxx'; ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">เบอร์ติดต่อ</label>
                            <div class="col-md-6">
                                <?php if(isset($do_action) and $do_action == 'update') { ?>
                                    <input type="text" class="form-control" name="director_phone" <?= (isset($school_data['director_phone']) and $school_data['director_phone']) ? 'value="'.$school_data['director_phone'].'"' : ''; ?>>
                                <?php } else { ?>
                                    <p class="data-desc"><?= (isset($school_data['director_phone']) and $school_data['director_phone']) ? $school_data['director_phone'] : 'xxxxxxxxxxxxx xxxxxxxxxxxxxxx'; ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">email</label>
                            <div class="col-md-6">
                                <?php if(isset($do_action) and $do_action == 'update') { ?>
                                    <input type="text" class="form-control" name="email" <?= (isset($school_data['email']) and $school_data['email']) ? 'value="'.$school_data['email'].'"' : ''; ?>>
                                <?php } else { ?>
                                    <p class="data-desc"><?= (isset($school_data['email']) and $school_data['email']) ? $school_data['email'] : 'xxxxxxxxxxxxx xxxxxxxxxxxxxxx'; ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Title</label>
                            <div class="col-md-6">
                                <?php if(isset($do_action) and $do_action == 'update') { ?>
                                    <input type="text" class="form-control" name="title" <?= (isset($school_data['title']) and $school_data['title']) ? 'value="'.$school_data['title'].'"' : ''; ?>>
                                <?php } else { ?>
                                    <p class="data-desc"><?= (isset($school_data['title']) and $school_data['title']) ? $school_data['title'] : 'xxxxxxxxxxxxx xxxxxxxxxxxxxxx'; ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Meta tag title</label>
                            <div class="col-md-6">
                                <?php if(isset($do_action) and $do_action == 'update') { ?>
                                    <input type="text" class="form-control" name="meta_title" <?= (isset($school_data['meta_title']) and $school_data['meta_title']) ? 'value="'.$school_data['meta_title'].'"' : ''; ?>>
                                <?php } else { ?>
                                    <p class="data-desc"><?= (isset($school_data['meta_title']) and $school_data['meta_title']) ? $school_data['meta_title'] : 'xxxxxxxxxxxxx xxxxxxxxxxxxxxx'; ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Description</label>
                            <div class="col-md-6">
                                <?php if(isset($do_action) and $do_action == 'update') { ?>
                                    <input type="text" class="form-control" name="desc" <?= (isset($school_data['desc']) and $school_data['desc']) ? 'value="'.$school_data['desc'].'"' : ''; ?>>
                                <?php } else { ?>
                                    <p class="data-desc"><?= (isset($school_data['desc']) and $school_data['desc']) ? $school_data['desc'] : 'xxxxxxxxxxxxx xxxxxxxxxxxxxxx'; ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Meta tag description</label>
                            <div class="col-md-6">
                                <?php if(isset($do_action) and $do_action == 'update') { ?>
                                    <input type="text" class="form-control" name="meta_desc" <?= (isset($school_data['meta_desc']) and $school_data['meta_desc']) ? 'value="'.$school_data['meta_desc'].'"' : ''; ?>>
                                <?php } else { ?>
                                    <p class="data-desc"><?= (isset($school_data['meta_desc']) and $school_data['meta_desc']) ? $school_data['meta_desc'] : 'xxxxxxxxxxxxx xxxxxxxxxxxxxxx'; ?></p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php if(isset($do_action) and $do_action == 'update') { ?>
                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">Submit</button>
                                <a href="<?= site_url('cms/cms_school'); ?>" class="btn default">Cancel</a>
                            </div>
                        </div>
                    <?php } ?>
                <?= (isset($do_action) and $do_action == 'update') ? '</form>' : '</div>'; ?>
            </div>
        </div>
    </div>
</div>