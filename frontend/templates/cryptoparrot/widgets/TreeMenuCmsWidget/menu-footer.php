<?php
?>
<h4 ><?= $widget->label; ?></h4>
<ul class="footer-links list-unstyled">
    <?php if ($trees = $widget->activeQuery->all()) : ?>
        <?php foreach ($trees as $tree) : ?>
            <?= $this->render("_one-footer", [
                "widget"        => $widget,
                "model"         => $tree,
            ]); ?>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>
