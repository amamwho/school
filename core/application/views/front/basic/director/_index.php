<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">ทำเนียบผู้บริหาร</h2>
    </div>
</div>
<?php if(isset($director) and $director) { ?>
    <?php foreach ($director as $v_director) { ?>
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <a href="<?= site_url('director/profile/'.$v_director['director_id']); ?>">
                    <img class="img-responsive" src="<?= getDirectorThumb($v_director['thumb']); ?>" alt="<?= $v_director['firstname'].' '.$v_director['lastname']; ?>">
                </a>
            </div>
            <div class="col-lg-8 col-md-8">
                <h4>ชื่อ : <?= $v_director['firstname'].' '.$v_director['lastname']; ?></h4>
                <h6>เข้ารับตำแหน่ง : <?= (isset($v_director['begindate']) and $v_director['begindate'] != '0000-00-00') ? dateTHFormat($v_director['begindate']) : '-'; ?></h6>
                <h6>หมดวาระ : <?= (isset($v_director['enddate']) and $v_director['enddate'] != '0000-00-00') ? dateTHFormat($v_director['enddate']) : '-'; ?></h6>
                <a href="<?= site_url('director/profile/'.$v_director['director_id']); ?>" role="button">รายละเอียด.. »</a>
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