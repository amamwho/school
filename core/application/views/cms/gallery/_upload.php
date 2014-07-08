<!-- BEGIN PAGE LEVEL PLUGINS -->
<!-- BEGIN FILE UPLOAD -->
<link rel="stylesheet" type="text/css" media="screen" href="assets/cms/blueimp_ci/css/fileupload/bootstrap-image-gallery.min.css"/>
<link rel="stylesheet" type="text/css" media="screen" href="assets/cms/blueimp_ci/css/fileupload/jquery.fileupload-ui.css"/>
<script  type="text/javascript" src="assets/cms/blueimp_ci/js/fileupload/vendor/jquery.ui.widget.js" ></script>
<script  type="text/javascript" src="assets/cms/blueimp_ci/js/fileupload/tmpl.js" ></script>
<script  type="text/javascript" src="assets/cms/blueimp_ci/js/fileupload/load-image.js" ></script>
<script  type="text/javascript" src="assets/cms/blueimp_ci/js/fileupload/canvas-to-blob.js" ></script>
<script  type="text/javascript" src="assets/cms/blueimp_ci/js/fileupload/bootstrap.min.js" ></script>
<script  type="text/javascript" src="assets/cms/blueimp_ci/js/fileupload/bootstrap-image-gallery.min.js" ></script>
<script  type="text/javascript" src="assets/cms/blueimp_ci/js/fileupload/jquery.iframe-transport.js" ></script>
<script  type="text/javascript" src="assets/cms/blueimp_ci/js/fileupload/jquery.fileupload.js" ></script>
<script  type="text/javascript" src="assets/cms/blueimp_ci/js/fileupload/jquery.fileupload-ip.js" ></script>
<script  type="text/javascript" src="assets/cms/blueimp_ci/js/fileupload/jquery.fileupload-ui.js" ></script>
<script  type="text/javascript" src="assets/cms/blueimp_ci/js/fileupload/locale.js" ></script>
<script  type="text/javascript" src="assets/cms/blueimp_ci/js/fileupload/main.js" ></script>
<!-- END FILE UPLOAD -->
<!-- END PAGE LEVEL PLUGINS -->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-upload"></i>Upload
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="btn-group">
                        <a class="btn default" href="<?= site_url('cms/cms_gallery/listImage/' . $id); ?>">
                            <i class="fa  fa-angle-left"></i>
                            กลับ
                        </a>
                    </div>
                </div>
                <div class="row">
                    <form id="fileupload" class="col-xs-12" action="<?= site_url('cms/cms_gallery/upload_img/' . $id); ?>" method="POST" enctype="multipart/form-data">
                        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                        <div class="row fileupload-buttonbar" style="margin: 0;">
                            <div class="span7">
                                <!-- The fileinput-button span is used to style the file input field as button -->
                                <span class="btn btn-success fileinput-button">
                                    <span><i class="fa fa-plus"></i> Add files...</span>
                                    <input type="file" name="userfile" multiple>
                                </span>
                                <button type="submit" class="btn btn-primary start">
                                    <i class="fa fa-upload"></i> Start upload
                                </button>
                                <button type="reset" class="btn btn-warning cancel">
                                    <i class="icon-ban-circle icon-white"></i> Cancel upload
                                </button>
                                <button type="button" class="btn btn-danger delete">
                                    <i class="icon-trash icon-white"></i> Delete
                                </button>
                                <input type="checkbox" class="toggle">
                            </div>
                            <div class="span5">
                                <!-- The global progress bar -->
                                <div class="progress progress-success progress-striped active fade">
                                    <div class="bar" style="width:0%;"></div>
                                </div>
                            </div>
                        </div>
                        <!-- The loading indicator is shown during image processing -->
                        <div class="fileupload-loading"></div>
                        <br>
                        <!-- The table listing the files available for upload/download -->
                        <table class="table table-striped"><tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery"></tbody></table>
                    </form>
                </div>
            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
</div>
<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
    {% for (var i=0, files=o.files, l=files.length, file=files[0]; i< l; file=files[++i]) { %}
    <tr class="template-upload fade">
        <td class="preview"><span class="fade"></span></td>
        <td class="name">{%=file.name%}</td>
        <td class="size">{%=o.formatFileSize(file.size)%}</td>
        {% if (file.error) { %}
        <td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
        {% } else if (o.files.valid && !i) { %}
        <td>
            <div class="progress progress-success progress-striped active"><div class="bar" style="width:0%;"></div></div>
        </td>
        <td class="start">{% if (!o.options.autoUpload) { %}
            <button class="btn btn-primary btn-sm">
                <i class="icon-upload icon-white"></i> {%=locale.fileupload.start%}
            </button>
            {% } %}</td>
        {% } else { %}
        <td colspan="2"></td>
        {% } %}
        <td class="cancel">
            {% if (!i) { %}
            <button class="btn btn-warning btn-sm">
                <i class="icon-ban-circle icon-white"></i> {%=locale.fileupload.cancel%}
            </button>
            {% } %}
        </td>
    </tr>
    {% } %}
</script>
    
<div id="download-files">
    <!-- The template to display files available for download -->
    <script id="template-download" type="text/x-tmpl">
        {% for (var i=0, files=o.files, l=files.length, file=files[0]; i< l; file=files[++i]) { %}
        <tr class="template-download fade">
            {% if (file.error) { %}
                <td></td>
                <td class="name">{%=file.name%}</td>
                <td class="size">{%=o.formatFileSize(file.size)%}</td>
                <td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
            {% } else { %}
                <td class="preview">
                    {% if (file.thumbnail_url) { %}
                        <a><img src="{%=file.thumbnail_url%}"></a>
                    {% } %}
                    </td>
                <td class="name">
                    <span>{%=file.name%}</span>
                </td>
                <td class="size">{%=file.size%} KB</td>
                <td colspan="2"></td>
            {% } %}
            <td class="delete">
                <button class="btn btn-danger btn-sm" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}">
                    <i class="icon-trash icon-white"></i> {%=locale.fileupload.destroy%}
                </button>
                <input type="checkbox" name="delete" value="1">
            </td>
        </tr>
        {% } %}
    </script>
</div>