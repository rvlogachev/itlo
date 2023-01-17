<?php
?>

    <div class="col-sm-3 mix category-keyboard">

        <div class="ec-box">
            <div class="ec-box-header"><a href="<?= $model->url; ?>"><?= $model->name; ?></a></div>
            <?php if ($image = $model->image->src) : ?>
                <a href="<?= $model->url; ?>"><img src="<?=$image;?>" alt="" style="width: 210px; min-height: 200px;"></a>
                <div class="ec-box-footer center-block">
                    <a href="<?= $model->url; ?>" class="btn btn-ar btn-success btn-sm center-block"> Подробнее</a>
                </div>
            <?php endif; ?>
        </div>

    </div>
