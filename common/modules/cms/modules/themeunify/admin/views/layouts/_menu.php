<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */
$level = 1;
?>

<?php if ($items = \skeeks\cms\backend\BackendComponent::getCurrent()->menu->items) : ?>
    <!--g-min-height-100vh-->
    <ul id="sideNavMenu" class="u-sidebar-navigation-v1-menu u-side-nav--top-level-menu mb-0
">
        <?php foreach ($items as $adminMenuItem) : ?>
            <?php if ($adminMenuItem->isVisible) : ?>
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--top-level-menu-item
                <?= $adminMenuItem->items ? "u-side-nav--has-sub-menu" : ""; ?>
                <?= $adminMenuItem->items && $adminMenuItem->isActive ? "u-side-nav-opened has-active" : ""; ?>
">

                    <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12 <?= $adminMenuItem->isActive ? "active" : ""; ?>" href="<?= $adminMenuItem->url; ?>"
                        <?= $adminMenuItem->items ? "data-hssm-target='#subMenuLevels{$adminMenuItem->id}'" : "" ?>
                    >
                      <span class="d-flex align-self-center g-pos-rel g-font-size-18 g-mr-18">
                          <?php if ($adminMenuItem->icon) : ?>
                              <i class="<?= $adminMenuItem->icon; ?>"></i>
                          <?php elseif ($adminMenuItem->image) : ?>
                              <img src="<?= $adminMenuItem->image; ?>" style="max-width: 20px;max-height: 20px;"/>
                          <?php else : ?>
                              <i class="far fa-dot-circle"></i>
                          <?php endif; ?>

                        </span>
                        <span class="media-body align-self-center"><?= $adminMenuItem->name; ?></span>

                        <?php if ($adminMenuItem->items) : ?>
                            <span class="d-flex align-self-center u-side-nav--control-icon">
                              <i class="hs-admin-angle-right"></i>
                            </span>
                            <span class="u-side-nav--has-sub-menu__indicator"></span>
                        <?php endif; ?>
                    </a>

                    <?php if ($adminMenuItem->items) : ?>
                        <?= $this->render("@app/views/layouts/_submenu", [
                            'items'  => $adminMenuItem->items,
                            'level'  => $level,
                            'parent' => $adminMenuItem,
                        ]); ?>
                    <?php endif; ?>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

