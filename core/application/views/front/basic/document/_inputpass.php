<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><span class="glyphicon glyphicon-save category-page-header"></span>ดาวน์โหลด</h3>
    </div>
    <div class="col-lg-12">
        <?php if (isset($error) and $error == 1) { ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                <strong>Warning!</strong> กรุณากรอกรหัสผ่าน*
            </div>
        <?php } else if (isset($error) and $error == 2) { ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                <strong>Warning!</strong> รหัสผ่านไม่ถูกต้อง*
            </div>
        <?php } ?>
        <form role="form" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">กรอกรหัสผ่านเพื่อดาวน์โหลดเอกสาร*</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="รหัสผ่าน">
            </div>
            <button type="submit" class="btn btn-default">ยืนยัน</button>
        </form>
    </div>
</div>