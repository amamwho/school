<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">อาจารย์/บุคลากร</h2>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <?php if(isset($staff_category) and $staff_category) { ?>
            <ul class="list-staff-cate">
                <?php foreach ($staff_category as $v_staff_category) { ?>
                    <li><span class="glyphicon glyphicon-minus"></span><a href="<?= site_url('staff/category/'.$v_staff_category['staff_category_id']);; ?>"><?= $v_staff_category['name']; ?></a></li>
                <?php } ?>
            </ul>
        <?php } ?>
    </div>
</div>
