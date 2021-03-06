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
                        <div class="form-actions fluid action-full">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">Submit</button>
                                <a href="<?= site_url('cms/cms_dashboard'); ?>" class="btn default">Cancel</a>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>