<?php
?>
<?php if ($subAdminMenuItems) : ?>
    <ul class="nav nav-sidebar">
    <?php foreach ($subAdminMenuItems as $subAdminMenuItem) : ?>
        <?php if ($subAdminMenuItem->isVisible) : ?>
            <li <?= $subAdminMenuItem->isActive ? 'class="active opened sx-start-opened"' : '' ?>>
                <a href="<?= $subAdminMenuItem->url ? $subAdminMenuItem->url : "#" ?>" title="<?= $subAdminMenuItem->name; ?>">
                    <span class="sx-icon">
                        <img src="<?= $subAdminMenuItem->image ? $subAdminMenuItem->image : \common\modules\cms\assets\CmsAsset::getAssetUrl('images/icons/posteditem.png'); ?>" />

                    </span>
                    <span class="txt"><?= $subAdminMenuItem->name; ?></span>
                    <?php if ($subAdminMenuItem->items) : ?>
                        <span class="caret"></span>
                    <?php endif; ?>
                </a>

                <?= $this->render('_admin-menu-sub', [
                    'subAdminMenuItems' => $subAdminMenuItem->items
                ]); ?>

            </li>
        <?php endif; ?>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>
