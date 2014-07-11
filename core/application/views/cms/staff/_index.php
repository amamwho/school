<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>กลุ่มสาระ / หมวด
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="btn-group">
                        <a class="btn btn-primary" href="<?= site_url('cms/cms_staff/staffCategoryInsert'); ?>">
                            <i class="fa fa-file-o"></i>
                            เพิ่ม
                        </a>
                        <a class="btn btn-danger" onclick="if(confirm('ลบข้อมูล!?')) { $('form#staff_category_list').submit(); } else { return false; }">
                            <i class="fa fa-trash-o"></i>
                            ลบ
                        </a>
                    </div>
                </div>
                <form id="staff_category_list" method="post">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead class="flip-content">
                            <tr>
                                <td class="filter"></td>
                                <td class="filter"><input type="text" name="title" class="form-control input-sm" id="title" placeholder="คำที่ต้องการค้นหา" <?= (isset($filter['title']) and $filter['title']) ? 'value="' . $filter['title'] . '"' : ''; ?> /></td>
                                <td class="status filter">
                                    <a class="btn btn-sm yellow" onclick="filter();">
                                        <i class="fa fa-search"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th width="20px">

                                </th>
                                <th>
                                    ชื่อ
                                </th>
                                <th class="numeric">
                                    การกระทำ
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($staff_category_list) and $staff_category_list) { ?>
                                <?php $i = 1; ?>
                                <?php foreach ($staff_category_list as $scl) { ?>
                                    <tr class="<?= ($i % 2 == 1) ? 'odd gradeX' : 'even gradeC'; ?>">
                                        <td><input type="checkbox" name="staff_category[]" value="<?= $scl['staff_category_id']; ?>" /></td>
                                        <td><?= $scl['name']; ?></td>
                                        <td class="status">
                                            <a class="btn default" href="<?= site_url('cms/cms_staff/staffCategoryUpdate/' . $scl['staff_category_id']); ?>">
                                                <i class="fa fa-edit"></i>
                                                แก้ไข
                                            </a>
                                            <a class="btn default yellow-stripe" href="<?= site_url('cms/cms_staff/staffList/' . $scl['staff_category_id']); ?>">
                                                <i class="fa fa-user"></i>
                                                บุคลากร
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </form>
                <div class="row row-pagination">
                    <?= $this->pagination->create_custom_links_cms(); ?>
                </div>
            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
</div>
<script type="text/javascript">
    function filter() {
        var current_url = "<?= site_url('cms/cms_banner/index'); ?>?";
        if($('input#title').val()) {
            current_url += 'title='+$('input#title').val()+'&';
        }
        window.location = current_url;
        //alert(current_url);
    }
</script>