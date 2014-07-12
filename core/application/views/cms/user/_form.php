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
                    <i class="fa fa-reorder"></i>ผู้ใช้
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
                            <label class="col-md-3 control-label" for="username">username *</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="username" id="username" <?= (isset($user_data['username']) and $user_data['username']) ? 'value="' . $user_data['username'] . '"' : ''; ?>>
                                <p class="help-block">ไม่ต่ำกว่า 5 ตัวอักษร</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="email">email *</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" id="email" <?= (isset($user_data['email']) and $user_data['email']) ? 'value="' . $user_data['email'] . '"' : ''; ?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="password">password <?= (isset($user_data['user_id']) and $user_data['user_id']) ? '' : '*'; ?></label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" id="password" >
                                <p class="help-block">ไม่ต่ำกว่า 6 ตัวอักษร</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="c_password">confirm password <?= (isset($user_data['user_id']) and $user_data['user_id']) ? '' : '*'; ?></label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="c_password" id="c_password" >
                                <p class="help-block">ไม่ต่ำกว่า 6 ตัวอักษร</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="permission">เมนู</label>
                            <div class="col-md-6">
                                <?php $permission = unserialize(CMS_PERMISSION); ?>
                                <select multiple class="form-control" name="permission[]" id="permission">
                                    <?php foreach ($permission as $key_p => $value_p) { ?>
                                        <option value="<?= $key_p; ?>" <?= (isset($user_data['permission']) and in_array($key_p, unserialize($user_data['permission']))) ? 'selected' : ''; ?>><?= $value_p; ?></option>
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
                                            <input type="radio" name="status" value="0" id="status1" <?= (!isset($user_data['status']) or $user_data['status'] == 0) ? 'checked="checked"' : ''; ?>>
                                        </div> ไม่ทำงาน 
                                    </label>
                                    <label>
                                        <div class="radio" id="uniform-status2">
                                            <input type="radio" name="status" value="1" id="status2" <?= (isset($user_data['status']) and $user_data['status'] == 1) ? 'checked="checked"' : ''; ?>>
                                        </div> ทำงาน
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions fluid action-full">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">Submit</button>
                                <a href="<?= site_url('cms/cms_user'); ?>" class="btn default">Cancel</a>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>