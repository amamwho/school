<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-folder-open-o"></i>โฟลเดอร์
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="btn-group">
                        <a class="btn btn-primary" href="<?= site_url('cms/cms_file/folderInsert'); ?>">
                            <i class="fa fa-file-o"></i>
                            เพิ่ม
                        </a>
                        <a class="btn btn-danger" onclick="if(confirm('ลบข้อมูล!?')) { $('form#intro_list').submit(); } else { return false; }">
                            <i class="fa fa-trash-o"></i>
                            ลบ
                        </a>
                    </div>
                </div>
                <div class="tiles">
                    <div class="tile btn default tile-account">
                        <a href="#">
                            <div class="tile-body">
                                <i class="fa fa-folder-open-o"></i>
                            </div>
                        </a>
                        <div class="tile-object">
                            <div class="date">xxxxxx</div>
                            <div class="action">
                                <a href="#" class="del-confirm"><i class="fa fa-trash-o"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="tile btn default tile-account">
                        <a href="#">
                            <div class="tile-body">
                                <i class="fa fa-folder-open-o"></i>
                            </div>
                        </a>
                        <div class="tile-object">
                            <div class="date">xxxxxx</div>
                            <div class="action">
                                <a href="#" class="del-confirm"><i class="fa fa-trash-o"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="tile btn default tile-account">
                        <a href="#">
                            <div class="tile-body">
                                <i class="fa fa-folder-open-o"></i>
                            </div>
                        </a>
                        <div class="tile-object">
                            <div class="date">xxxxxx</div>
                            <div class="action">
                                <a href="#" class="del-confirm"><i class="fa fa-trash-o"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-folder-open-o"></i>เอกสาร
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="btn-group">
                        <a class="btn btn-primary" href="<?= site_url('cms/cms_file/folderInsert'); ?>">
                            <i class="fa fa-file-o"></i>
                            เพิ่ม
                        </a>
                        <a class="btn btn-danger" onclick="if(confirm('ลบข้อมูล!?')) { $('form#intro_list').submit(); } else { return false; }">
                            <i class="fa fa-trash-o"></i>
                            ลบ
                        </a>
                    </div>
                </div>
                <div class="tiles">
                    <div class="tile btn default tile-account">
                        <a href="#">
                            <div class="tile-body">
                                <i class="fa fa-folder-open-o"></i>
                            </div>
                        </a>
                        <div class="tile-object">
                            <div class="date">xxxxxx</div>
                            <div class="action">
                                <a href="#" class="del-confirm"><i class="fa fa-trash-o"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="tile btn default tile-account">
                        <a href="#">
                            <div class="tile-body">
                                <i class="fa fa-file-text-o"></i>
                            </div>
                        </a>
                        <div class="tile-object">
                            <div class="date">xxxxxx</div>
                            <div class="action">
                                <a href="#" class="del-confirm"><i class="fa fa-trash-o"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="tile btn default tile-account">
                        <a href="#">
                            <div class="tile-body">
                                <i class="fa fa-picture-o"></i>
                            </div>
                        </a>
                        <div class="tile-object">
                            <div class="date">xxxxxx</div>
                            <div class="action">
                                <a href="#" class="del-confirm"><i class="fa fa-trash-o"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
</div>
<script type="text/javascript">
    function filter() {
        var current_url = "<?= site_url('cms/cms_intro/index'); ?>?";
        if($('input#title').val()) {
            current_url += 'title='+$('input#title').val()+'&';
        }
        if($("select option:selected").val()) {
            current_url += 'status='+$("select#status option:selected").val()+'&';
        }
        window.location = current_url;
        //alert(current_url);
    }
</script>