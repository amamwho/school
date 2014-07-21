<h3 class="page-header">
    <?= '<a href="'.site_url('staff/category/'.$staff['staff_category_id']).'">'.$staff['name'].'</a> » '.$staff['firstname'].' '.$staff['lastname']; ?>
    <br>
    <small>
        โพสเมื่อ : <?= dateTHFormat(getDateFromDateTime($staff['date_added'])); ?>
    </small>
</h3>
<?php if(isset($staff['image']) and $staff['image']) { ?>
    <div class="profile-img">
        <img src="<?= getStaffThumb($staff['image']); ?>" class="img-responsive">
    </div>
    <hr>
<?php } ?>
<div class="col-sm-12">
    <div class="row profile-detail">
        <label class="col-sm-3">ชื่อ</label>
        <div class="col-sm-9"><?= (isset($staff['mobile']) and $staff['mobile']) ? $staff['firstname'] : '-'; ?></div>
    </div>
    <div class="row profile-detail">
        <label class="col-sm-3">นามสกุล</label>
        <div class="col-sm-9"><?= (isset($staff['mobile']) and $staff['mobile']) ? $staff['lastname'] : '-'; ?></div>
    </div>
    <div class="row profile-detail">
        <label class="col-sm-3">เพศ</label>
        <div class="col-sm-9"><?= (isset($staff['gender']) and $staff['gender'] == 'M') ? 'ชาย' : 'หญิง'; ?></div>
    </div>
    <div class="row profile-detail">
        <label class="col-sm-3">ตำแหน่ง</label>
        <div class="col-sm-9"><?= (isset($staff['position_oth']) and $staff['position_oth']) ? $staff['position_oth'] : $staff['value']; ?></div>
    </div>
    <div class="row profile-detail">
        <label class="col-sm-3">วุฒิการศึกษา</label>
        <div class="col-sm-9"><?= (isset($staff['qualification']) and $staff['qualification']) ? $staff['qualification'] : '-'; ?></div>
    </div>
    <div class="row profile-detail">
        <label class="col-sm-3">วิชาเอก</label>
        <div class="col-sm-9"><?= (isset($staff['major']) and $staff['major']) ? $staff['major'] : '-'; ?></div>
    </div>
    <div class="row profile-detail">
        <label class="col-sm-3">ประเภทบุคลากร</label>
        <div class="col-sm-9"><?= (isset($staff['class_oth']) and $staff['class_oth']) ? $staff['class_oth'] : $staff['class']; ?></div>
    </div>
    <div class="row profile-detail">
        <label class="col-sm-3">วันเกิด</label>
        <div class="col-sm-9"><?= (isset($staff['birthday']) and $staff['birthday'] != '0000-00-00') ? dateTHFormat($staff['birthday']) : '-'; ?></div>
    </div>
    <div class="row profile-detail">
        <label class="col-sm-3">ที่อยู่</label>
        <div class="col-sm-9"><?= (isset($staff['address']) and $staff['address']) ? $staff['address'] : '-'; ?></div>
    </div>
    <div class="row profile-detail">
        <label class="col-sm-3">โทรศัพท์</label>
        <div class="col-sm-9"><?= (isset($staff['mobile']) and $staff['mobile']) ? $staff['mobile'] : '-'; ?></div>
    </div>
    <div class="row profile-detail">
        <label class="col-sm-3">อีเมล</label>
        <div class="col-sm-9"><?= (isset($staff['email']) and $staff['email']) ? $staff['email'] : '-'; ?></div>
    </div>
    <div class="row profile-detail">
        <label class="col-sm-3">รายละเอียด</label>
        <div class="col-sm-9"><?= (isset($staff['description']) and $staff['description']) ? $staff['description'] : '-'; ?></div>
    </div>
</div>