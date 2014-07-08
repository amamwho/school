<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-file-text-o"></i>Post
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="btn-group">
                        <a class="btn btn-primary" href="<?= site_url('cms/cms_post/insert/'); ?>">
                            <i class="fa fa-file-o"></i>
                            เพิ่ม
                        </a>
                        <a class="btn btn-danger" onclick="if(confirm('ลบข้อมูล!?')) { $('form#post_list').submit(); } else { return false; }">
                            <i class="fa fa-trash-o"></i>
                            ลบ
                        </a>
                    </div>
                </div>
                <form id="post_list" method="post">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead class="flip-content">
                            <tr>
                                <td class="filter"></td>
                                <td class="filter"><input type="text" name="title" class="form-control input-sm" id="title" placeholder="คำที่ต้องการค้นหา" <?= (isset($filter['title']) and $filter['title']) ? 'value="' . $filter['title'] . '"' : ''; ?> /></td>
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
                                    <a href="#" class="btn btn-sm yellow" onclick="filter();">
                                        <i class="fa fa-search"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th width="20px">

                                </th>
                                <th>
                                    หัวข้อ
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
                            <?php if (isset($post_list) and $post_list) { ?>
                                <?php $i = 1; ?>
                                <?php foreach ($post_list as $pl) { ?>
                                    <tr class="<?= ($i % 2 == 1) ? 'odd gradeX' : 'even gradeC'; ?>">
                                        <td><input type="checkbox" name="post[]" value="<?= $pl['post_id']; ?>" /></td>
                                        <td><?= $pl['title']; ?></td>
                                        <td><?= (isset($pl['image']) and $pl['thumb'] and getImagePath($this->images_path_post . $pl['thumb'])) ? '<img class="index-thumb" src="' . getImagePath($this->images_path_post . $pl['thumb']) . '" />' : '-'; ?></td>
                                        <td><?= $pl['sort_order']; ?></td>
                                        <td class="status"><?= ($pl['status']) ? 'ทำงาน' : 'ไม่ทำงาน'; ?></td>
                                        <td class="status">
                                            <a class="btn default" href="<?= site_url('cms/cms_post/update/' . $pl['post_id']); ?>">
                                                <i class="fa fa-edit"></i>
                                                แก้ไข
                                            </a>
                                            <a class="btn default yellow-stripe" href="<?= site_url('cms/cms_gallery/listImage/' . $pl['post_id']); ?>">
                                                <i class="fa fa-camera-retro"></i>
                                                แกลเลอรี่
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
        var current_url = "<?= site_url('cms/cms_post/index'); ?>?";
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