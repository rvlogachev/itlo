<?php
/**
 */
?>
<h2><?= \Yii::t('skeeks/cms', 'Servers to store the files.') ?></h2>
<?php foreach (\Yii::$app->storage->getClusters() as $count => $cluster) : ?>
    <div class="sx-box g-pa-10 sx-bg-primary">
        <div class="row">
            <div class="col-md-12">
                <?php //echo print_r( \Yii::$app->storage->getClusters());die();?>
                <h3><b><?php //echo  $count + 1; ?>. <?php echo $cluster->name; ?></b></h3>
            </div>
            <div class="col-md-6">
                <p><b><?= \Yii::t('skeeks/cms', 'Public file path') ?>: </b> <?= $cluster->publicBaseUrl; ?></p>
                <p><b><?= \Yii::t('skeeks/cms', 'The folder on the server') ?>: </b> <?= $cluster->rootBasePath; ?></p>

                <p><b><?= \Yii::t('skeeks/cms',
                            'Total available space') ?></b>: <?= Yii::$app->formatter->asShortSize($cluster->getTotalSpace()); ?>
                </p>
                <p><b><?= \Yii::t('skeeks/cms',
                            'Used') ?></b>: <?= Yii::$app->formatter->asShortSize($cluster->getUsedSpace()); ?></p>
                <p><b><?= \Yii::t('skeeks/cms',
                            'Free') ?></b>: <?= Yii::$app->formatter->asShortSize($cluster->getFreeSpace()); ?></p>

                <?php if ($cluster instanceof \common\modules\cms\components\storage\ClusterLocal) : ?>
                    <?php if ($cluster->publicBaseUrlIsAbsolute) : ?>
                        <p><b><?= \Yii::t('skeeks/cms', 'Files download from domain') ?>
                                : </b> <?= $cluster->publicBaseUrlIsAbsolute; ?></p>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

            <div class="col-md-6">
                <?php

                $baseOptions =
                    [
                        'title' => ['text' => \Yii::t('skeeks/cms', 'At percent ratio')],
                        'chart' => [
                            'type' => 'pie',

                        ],
                        'plotOptions' =>
                            [
                                'pie' =>
                                    [
                                        'allowPointSelect' => 'true',
                                        'cursor' => "pointer",
                                        'depth' => 35,
                                        'dataLabels' =>
                                            [
                                                'enabled' => 'true',
                                                'format' => '{point.name}',
                                            ]
                                    ]
                            ],
                        'series' => [
                            [
                                'type' => 'pie',
                                'name' => '%',
                                'data' =>
                                    [
                                        [\Yii::t('skeeks/cms', 'Free') . " " . round($cluster->getFreeSpacePct()) . "%", round($cluster->getFreeSpacePct())],
                                        [\Yii::t('skeeks/cms', 'Used') . " " . round($cluster->getUsedSpacePct()) . "%", round($cluster->getUsedSpacePct())],
                                    ]

                            ],
                        ]
                    ];
                echo \common\modules\cms\modules\highcharts\Highcharts::widget(['options' => $baseOptions]);

                ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>
