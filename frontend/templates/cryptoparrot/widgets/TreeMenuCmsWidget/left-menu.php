<?php
?>
<div class="side-nav-head">
    <button class="fa fa-bars"></button>
    <h4><?= $widget->label; ?></h4>
</div>

<?php if ($models = $widget->activeQuery->all()) : ?>
<ul class="list-group list-group-bordered list-group-noicon uppercase">
    <?php foreach ($models as $model) : ?>
        <?= $this->render("_one-left", [
            "widget"        => $widget,
            "model"         => $model,
        ]); ?>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>
