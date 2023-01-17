<?php
$hasChildrens = $model->children;
$activeClass = '';
if (strpos(\Yii::$app->request->pathInfo, $model->dir) !== false)
{
    $activeClass = ' active';
}
?>
<li class="<?= $activeClass; ?> <?php ($hasChildrens) ?' dropdown':''; ?>">
    <?php if ($hasChildrens) : ?>
        <a href="<?= $model->url; ?>" title="<?= $model->name; ?>" class="dropdown-toggle" data-hover="dropdown">
            <?= $model->name; ?>
        </a>

        <ul class="dropdown-menu">
        <?php foreach($model->getChildren()
                       ->andWhere(['active' => $widget->active])
                       ->orderBy([$widget->orderBy => $widget->order])
                       ->all() as $childTree) : ?>
                <li>
                    <a href="<?= $childTree->url; ?>" title="<?= $childTree->name; ?>"><?= $childTree->name; ?></a>
                </li>
        <?php endforeach; ?>
            </ul>
    <?php else: ?>
        <a href="<?= $model->url; ?>" title="<?= $model->name; ?>"><?= $model->name; ?></a>
    <?php endif; ?>
</li>