<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-file-o"></i><?= $page_name; ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="btn-group">
                        <a class="btn btn-primary" href="<?= site_url('cms/cms_document/insert'.ucfirst($type_name)); ?>">
                            <i class="fa fa-file-o"></i>
                            เพิ่ม
                        </a>
                        <a class="btn btn-danger" onclick="if(confirm('ลบข้อมูล!?')) { $('form#intro_list').submit(); } else { return false; }">
                            <i class="fa fa-trash-o"></i>
                            ลบ
                        </a>
                    </div>
                </div>
                <form id="document_list" method="document">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead class="flip-content">
                            <tr>
                                <td class="filter"></td>
                                <td class="filter"><input type="text" name="name" class="form-control input-sm" id="name" placeholder="คำที่ต้องการค้นหา" <?= (isset($filter['name']) and $filter['name']) ? 'value="' . $filter['name'] . '"' : ''; ?> /></td>
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
                                <th class="numeric">
                                    ลิ๊งค์ดาวน์โหลด
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
                            <?php if (isset($document_list) and $document_list) { ?>
                                <?php $i = 1; ?>
                                <?php foreach ($document_list as $dl) { ?>
                                    <tr class="<?= ($i % 2 == 1) ? 'odd gradeX' : 'even gradeC'; ?>">
                                        <td><input type="checkbox" name="document[]" value="<?= $dl['document_id']; ?>" /></td>
                                        <td><?= $dl['name']; ?></td>
                                        <td><?= (isset($dl['file']) and $dl['file']) ? '<a href="'.site_url('loadFile/'.$dl['raw']).'" target="_blank"><i class="fa fa-link"></i> ดาวน์โหลด</a>' : ''; ?></td>
                                        <td class="status"><?= ($dl['status']) ? 'ทำงาน' : 'ไม่ทำงาน'; ?></td>
                                        <td class="status">
                                            <a class="btn default" href="<?= site_url('cms/cms_document/update'.ucfirst($type_name).'/' . $dl['document_id']); ?>">
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
        var current_url = "<?= site_url('cms/cms_document/'.$type_name); ?>?";
        if($('input#name').val()) {
            current_url += 'name='+$('input#name').val()+'&';
        }
        if($("select option:selected").val()) {
            current_url += 'status='+$("select#status option:selected").val()+'&';
        }
        window.location = current_url;
        //alert(current_url);
    }
</script>