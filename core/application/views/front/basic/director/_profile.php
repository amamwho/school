<h3 class="page-header">
    <?= '<a href="'.site_url('director').'">ทำเนียบผู้บริหาร</a> » '.$director['firstname'].' '.$director['lastname']; ?>
    <br>
    <small>
        โพสเมื่อ : <?= dateTHFormat(getDateFromDateTime($director['date_added'])); ?>
    </small>
</h3>
<?php if(isset($director['image']) and $director['image']) { ?>
    <div class="profile-img">
        <img src="<?= $this->images_path_director.$director['image']; ?>" class="img-responsive">
    </div>
    <hr>
<?php } ?>
<div class="col-sm-12">
    <div class="row profile-detail">
        <label class="col-sm-3">ชื่อ</label>
        <div class="col-sm-9"><?= (isset($director['mobile']) and $director['mobile']) ? $director['firstname'] : '-'; ?></div>
    </div>
    <div class="row profile-detail">
        <label class="col-sm-3">นามสกุล</label>
        <div class="col-sm-9"><?= (isset($director['mobile']) and $director['mobile']) ? $director['lastname'] : '-'; ?></div>
    </div>
    <div class="row profile-detail">
        <label class="col-sm-3">เข้ารับตำแหน่ง</label>
        <div class="col-sm-9"><?= (isset($director['begindate']) and $director['begindate'] != '0000-00-00') ? dateTHFormat($director['begindate']) : '-'; ?></div>
    </div>
    <div class="row profile-detail">
        <label class="col-sm-3">หมดวาระ</label>
        <div class="col-sm-9"><?= (isset($director['enddate']) and $director['enddate'] != '0000-00-00') ? dateTHFormat($director['enddate']) : '-'; ?></div>
    </div>
    <div class="row profile-detail">
        <label class="col-sm-3">วันเกิด</label>
        <div class="col-sm-9"><?= (isset($director['birthday']) and $director['birthday'] != '0000-00-00') ? dateTHFormat($director['birthday']) : '-'; ?></div>
    </div>
    <div class="row profile-detail">
        <label class="col-sm-3">ที่อยู่</label>
        <div class="col-sm-9"><?= (isset($director['address']) and $director['address']) ? $director['address'] : '-'; ?></div>
    </div>
    <div class="row profile-detail">
        <label class="col-sm-3">โทรศัพท์</label>
        <div class="col-sm-9"><?= (isset($director['mobile']) and $director['mobile']) ? $director['mobile'] : '-'; ?></div>
    </div>
    <div class="row profile-detail">
        <label class="col-sm-3">อีเมล</label>
        <div class="col-sm-9"><?= (isset($director['email']) and $director['email']) ? $director['email'] : '-'; ?></div>
    </div>
    <div class="row profile-detail">
        <label class="col-sm-3">รายละเอียด</label>
        <div class="col-sm-9"><?= (isset($director['description']) and $director['description']) ? $director['description'] : '-'; ?></div>
    </div>
</div>