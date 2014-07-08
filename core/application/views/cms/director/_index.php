<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>ผู้บริหาร
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="btn-group">
                        <a class="btn btn-primary" href="<?= site_url('cms/cms_director/insert'); ?>">
                            <i class="fa fa-file-o"></i>
                            เพิ่ม
                        </a>
                        <a class="btn btn-danger" onclick="if(confirm('ลบข้อมูล!?')) { $('form#director_list').submit(); } else { return false; }">
                            <i class="fa fa-trash-o"></i>
                            ลบ
                        </a>
                    </div>
                </div>
                <form id="director_list" method="post">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead class="flip-content">
                            <tr>
                                <td class="filter"></td>
                                <td class="filter"><input type="text" name="firstname" class="form-control input-sm" id="firstname" placeholder="คำที่ต้องการค้นหา" <?= (isset($filter['firstname']) and $filter['firstname']) ? 'value="' . $filter['firstname'] . '"' : ''; ?> /></td>
                                <td class="filter"><input type="text" name="lastname" class="form-control input-sm" id="lastname" placeholder="คำที่ต้องการค้นหา" <?= (isset($filter['lastname']) and $filter['lastname']) ? 'value="' . $filter['lastname'] . '"' : ''; ?> /></td>
                                <td class="filter"></td>
                                <td class="filter"></td>
                                <td class="status filter">
                                    <select name="status" class="form-control input-sm" id="status">
                                        <option value=""></option>
                                        <option value="1" <?= (isset($filter['status']) and $filter['status'] == 1) ? 'selected="selected"' : ''; ?> >ทำงาน</option>
                                        <option value="0"  <?= (isset($filter['status']) and $filter['status'] == 0) ? 'selected="selected"' : ''; ?> >ไม่ทำงาน</option>
                                    </select>
                                </td>
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
                                <th>
                                    นามสกุล
                                </th>
                                <th class="numeric">
                                    รูป
                                </th>
                                <th class="numeric">
                                    ลำดับการแสดง
                                </th>
                                <th class="numeric">
                                    สถานะ
                                </th>
                                <th class="numeric">
                                    การกระทำ
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($director_list) and $director_list) { ?>
                                <?php $i = 1; ?>
                                <?php foreach ($director_list as $dl) { ?>
                                    <tr class="<?= ($i % 2 == 1) ? 'odd gradeX' : 'even gradeC'; ?>">
                                        <td><input type="checkbox" name="director[]" value="<?= $dl['director_id']; ?>" /></td>
                                        <td><?= $dl['firstname']; ?></td>
                                        <td><?= $dl['lastname']; ?></td>
                                        <td><?= (isset($dl['image']) and $dl['thumb'] and getImagePath($this->images_path_director . $dl['thumb'])) ? '<img class="index-thumb" src="' . getImagePath($this->images_path_director . $dl['thumb']) . '" />' : '-'; ?></td>
                                        <td><?= $dl['sort_order']; ?></td>
                                        <td class="status"><?= ($dl['status']) ? 'ทำงาน' : 'ไม่ทำงาน'; ?></td>
                                        <td class="status">
                                            <a class="btn default" href="<?= site_url('cms/cms_director/update/' . $dl['director_id']); ?>">
                                                <i class="fa fa-edit"></i>
                                                แก้ไข
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
        var current_url = "<?= site_url('cms/cms_director'); ?>?";
        if($('input#firstname').val()) {
            current_url += 'firstname='+$('input#firstname').val()+'&';
        }
        if($('input#lastname').val()) {
            current_url += 'lastname='+$('input#lastname').val()+'&';
        }
        if($("select#status option:selected").val()) {
            current_url += 'status='+$("select#status option:selected").val()+'&';
        }
        window.location = current_url;
        //alert(current_url);
    }
</script>