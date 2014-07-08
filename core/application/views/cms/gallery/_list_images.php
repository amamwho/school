<!-- BEGIN PAGE LEVEL PLUGINS -->
<!-- BEGIN DIALOG -->
<script type="text/javascript" src="assets/cms/metronic/plugins/bootbox/bootbox.min.js"></script>
<!-- END DIALOG -->
<!-- END PAGE LEVEL PLUGINS -->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-camera-retro"></i>Gallery
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="btn-group">
                        <a class="btn btn-primary" href="<?= site_url('cms/cms_gallery/upload/' . $id); ?>">
                            <i class="fa fa-plus"></i>
                            เพิ่มรูปภาพ
                        </a>
                        <a class="btn default" href="<?= site_url('cms/cms_post'); ?>">
                            <i class="fa  fa-angle-left"></i>
                            กลับ
                        </a>
                    </div>
                </div>
                <div class="row">
                    <?php if(isset($gallery_data) and $gallery_data) { ?>
                        <?php foreach ($gallery_data as $value_gallery_data) { ?>
                            <?php if(isset($value_gallery_data['image']) and $value_gallery_data['image']) { ?>
                                <div class="col-sm-6 col-md-2 thumbnail-list" id="gallery_id_<?= $value_gallery_data['gallery_id']; ?>">
                                    <a href="#" class="thumbnail">
                                        <img src="<?= getImagePath($this->images_path_gallery.$value_gallery_data['image']); ?>" alt="100%x180" style="height: 180px; width: 100%; display: block;">
                                    </a>
                                    <div class="thumb-action">
                                        <input type="hidden" id="data-image" value="<?= base_url().getImagePath($this->images_path_gallery.$value_gallery_data['image']); ?>" >
                                        <a class="btn btn-sm yellow view-image" href="#modal-image" data-toggle="modal">
                                            <i class="fa fa-search"></i>
                                            ดู
                                        </a>
                                        <button class="btn btn-sm red" onclick="delGallery('<?= $value_gallery_data['gallery_id']; ?>');">
                                            <i class="fa fa-times"></i>
                                            ลบ
                                        </button>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
</div>
<div id="modal-image" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">รูป</h4>
            </div>
            <div class="modal-body" style="text-align: center;">
                <img class="picture" src="" style="max-width: 598px;">
            </div>
        </div>
    </div>
</div>
<script>
    function delGallery(gallery_id) {
        if(confirm("ลบรูปภาพ?")) {
            $.post("<?= site_url('cms/cms_gallery/deleteImage/'); ?>/"+gallery_id, function(data) {
                if(data[0].sucess) {
                    $('div#gallery_id_'+gallery_id).remove();
                }
            },"json");
        }
    }
    $('.view-image').click(function(){
        $('img.picture').attr('src', $(this).parent().children('input').val());
    });
</script>