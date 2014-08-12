<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><?= $staff_category['name']; ?></h3>
    </div>
</div>
<?php if(isset($staff) and $staff) { ?>
    <?php foreach ($staff as $v_staff) { ?>
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <a href="<?= site_url('staff/profile/'.$v_staff['staff_id']); ?>">
                    <img class="img-responsive" src="<?= getStaffThumb($v_staff['thumb']); ?>" alt="<?= $v_staff['firstname'].' '.$v_staff['lastname']; ?>">
                </a>
            </div>
            <div class="col-lg-8 col-md-8">
                <h4>ชื่อ : <?= $v_staff['firstname'].' '.$v_staff['lastname']; ?></h4>
                <h6>ตำแหน่ง : <?= (isset($v_staff['position_oth']) and $v_staff['position_oth']) ? $v_staff['position_oth'] : $v_staff['value']; ?></h6>
                <h6>วุฒิ : <?= (isset($v_staff['qualification']) and $v_staff['qualification']) ? $v_staff['qualification'] : '-'; ?></h6>
                <a href="<?= site_url('staff/profile/'.$v_staff['staff_id']); ?>" role="button">รายละเอียด.. »</a>
            </div>
        </div>
        <hr>
    <?php } ?>
<?php } else { ?>
    <p>ไม่พบข้อมูล</p>
<?php } ?>
<div class="row">
    <div class="col-lg-12 row-pagination">
        <?= $this->pagination->create_custom_links_front(); ?>
    </div>
</div>