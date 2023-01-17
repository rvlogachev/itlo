<?php

use yii\helpers\Html;
/* @var $this yii\web\View */

if (YII_ENV_DEV) : ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card collapsed-card">
                <div class="card-header">
                    <h5 class="card-title"><?=Yii::t('app/modules/admin','Debug Data');?></h5>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-plus"></i>
                        </button>

                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body" >
                    <div class="row">
                        <dl class="dl-horizontal" style="margin-bottom:0;">
                            <dt><?=Yii::t('app/modules/admin','Module ID');?>:</dt>
                            <dd><code><?= $this->context->module->id ?></code></dd>
                            <dt><?=Yii::t('app/modules/admin','Controller ID');?>:</dt>
                            <dd><code><?= get_class($this->context) ?></code></dd>
                            <dt><?=Yii::t('app/modules/admin','Path URL');?>:</dt>
                            <dd><code> <?= $this->context->action->uniqueId ?> </code></dd>

                            <dt><?=Yii::t('app/modules/admin','Module vendor');?>:</dt>
                            <dd><code><?= $this->context->module->getVendor() ?></code></dd>
                            <dt><?=Yii::t('app/modules/admin','Module version');?>:</dt>
                            <dd><code><?= $this->context->module->version ?></code></dd>

                        </dl>
                    </div>
                </div>
                <div class="card-footer" >
                    <div class="row">
                        <div class="col-sm-3 col-6">
                            <div class="description-block border-right">
<!--                                <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>-->
                                <h5 class="description-header"><?= $this->context->module->routePrefix ?></h5>
                                <span class="description-text"><?=Yii::t('app/modules/admin','Routing prefix');?></span>

                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-3 col-6">
                            <div class="description-block border-right">
<!--                                <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>-->
                                <h5 class="description-header"><?= $this->context->module->id ?></h5>
                                <span class="description-text"><?=Yii::t('app/modules/admin','Module ID');?></span>

                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-3 col-6">
                            <div class="description-block border-right">
<!--                                <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>-->
                                <h5 class="description-header"><?= \Yii::$app->controller->id?></h5>
                                <span class="description-text"><?=Yii::t('app/modules/admin','Controller ID');?></span>

                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-3 col-6">
                            <div class="description-block">
<!--                                <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>-->
                                <h5 class="description-header"><?= $this->context->action->id ?> </h5>
                                <span class="description-text"><?=Yii::t('app/modules/admin','Action ID');?></span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php endif; ?>