<?php

use yii\helpers\Html;
use common\modules\widget\src\ChartJS;
use common\modules\helpers\src\StringHelper;

/* @var $this yii\web\View */

$this->title = $this->context->module->name;
$this->params['breadcrumbs'][] = $this->title;

?>


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><?= Html::encode($this->title) ?>  </h5>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                            <i class="fas fa-wrench"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                            <a href="/admin/admin/modules" class="dropdown-item">Модули</a>
                            <a class="dropdown-divider"></a>
                            <a class="dropdown-item"><?= $this->context->module->id ?> <small class="text-muted pull-right">[v.<?= $this->context->module->version ?>]</small></a>
                        </div>
                    </div>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <!--
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Online Store Visitors</h3>
                                    <a href="javascript:void(0);">View Report</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <p class="d-flex flex-column">
                                        <span class="text-bold text-lg">820</span>
                                        <span>Visitors Over Time</span>
                                    </p>
                                    <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 12.5%
                    </span>
                                        <span class="text-muted">Since last week</span>
                                    </p>
                                </div>


                                <div class="position-relative mb-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                    <canvas id="visitors-chart" height="200" width="729" style="display: block; width: 729px; height: 200px;" class="chartjs-render-monitor"></canvas>
                                </div>

                                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This Week
                  </span>

                                    <span>
                    <i class="fas fa-square text-gray"></i> Last Week
                  </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header border-0">
                                <h3 class="card-title">Online Store Overview</h3>
                                <div class="card-tools">
                                    <a href="#" class="btn btn-sm btn-tool">
                                        <i class="fas fa-download"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-tool">
                                        <i class="fas fa-bars"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                    <p class="text-success text-xl">
                                        <i class="ion ion-ios-refresh-empty"></i>
                                    </p>
                                    <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <i class="ion ion-android-arrow-up text-success"></i> 12%
                    </span>
                                        <span class="text-muted">CONVERSION RATE</span>
                                    </p>
                                </div>

                                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                    <p class="text-warning text-xl">
                                        <i class="ion ion-ios-cart-outline"></i>
                                    </p>
                                    <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <i class="ion ion-android-arrow-up text-warning"></i> 0.8%
                    </span>
                                        <span class="text-muted">SALES RATE</span>
                                    </p>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-0">
                                    <p class="text-danger text-xl">
                                        <i class="ion ion-ios-people-outline"></i>
                                    </p>
                                    <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <i class="ion ion-android-arrow-down text-danger"></i> 1%
                    </span>
                                        <span class="text-muted">REGISTRATION RATE</span>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                -->

                <?php if (isset($counters['users'])) { ?>
                <div class="row">
                <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3 class="count"> <?= $counters['users']['count']; ?> </h3>
                                <p><?= Yii::t('app/modules/users', 'New users for the last 24 hours') ?></p>
                                <h3 class="count subcount" data-label="online:"> <?= $counters['users']['online']; ?> </h3>
                                <p><?= Yii::t('app/modules/users', 'Users online now') ?></p>
                                <h3 class="count total" data-label="total:"> <?= $counters['users']['total']; ?> </h3>
                                <p><?= Yii::t('app/modules/users', 'Users in system') ?></p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="<?= \yii\helpers\Url::to("/backend/web/admin/users");?>" class="small-box-footer"><?= Yii::t('app/modules/users', 'Go to users') ?> <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!--
                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>53<sup style="font-size: 20px">%</sup></h3>

                                <p>Bounce Rate</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>150</h3>

                                <p>New Orders</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>65</h3>

                                <p>Unique Visitors</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    -->
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>



<div class="admin-index">
    <div class="row flex-row">

        <?php if (isset($counters['orders'])) { ?>
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="panel panel-counter panel-success">
                <div class="panel-heading">
                    <?= Yii::t('app/modules/store', 'New orders for the last 24 hours') ?>
                    <a href="javascript:{};" class="btn btn-link btn-menu">
                        <em class="fa fa-ellipsis-v"></em>
                    </a>
                </div>
                <div class="panel-body">
                    <span class="count"><?= $counters['orders']['count']; ?></span>
                    <span class="count total" data-label="total:"><?= $counters['orders']['total']; ?></span>
                    <span class="icon">
                        <em class="fa fa-fw fa-shopping-bag"></em>
                    </span>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php if (isset($counters['comments_and_reviews'])) { ?>
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="panel panel-counter panel-warning">
                <div class="panel-heading">
                    <?= Yii::t('app/modules/comments', 'New comments and reviews for the last 24 hours') ?>
                    <a href="javascript:{};" class="btn btn-link btn-menu">
                        <em class="fa fa-ellipsis-v"></em>
                    </a>
                </div>
                <div class="panel-body">
                    <span class="count"><?= $counters['comments_and_reviews']['count']; ?></span>
                    <span class="count total" data-label="comments:"><?= $counters['comments_and_reviews']['comments']; ?></span>
                    <span class="count total" data-label="reviews:"><?= $counters['comments_and_reviews']['reviews']; ?></span>
                    <span class="icon">
                        <em class="fa fa-fw fa-comments"></em>
                    </span>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php if (isset($counters['transactions'])) { ?>
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="panel panel-counter panel-danger">
                <div class="panel-heading">
                    <?= Yii::t('app/modules/billing', 'Transactions made in the last 24 hours') ?>
                    <a href="javascript:{};" class="btn btn-link btn-menu">
                        <em class="fa fa-ellipsis-v"></em>
                    </a>
                </div>
                <div class="panel-body">
                    <span class="count"><?= $counters['transactions']['count']; ?></span>
                    <span class="count total" data-label="total:"><?= $counters['transactions']['total']; ?></span>
                    <span class="icon">
                        <em class="fa fa-fw fa-wallet"></em>
                    </span>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php if (isset($counters['newsletters'])) { ?>
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="panel panel-counter panel-default">
                <div class="panel-heading">
                    <?= Yii::t('app/modules/newsletters', 'Mailings made in the last 24 hours') ?>
                    <a href="javascript:{};" class="btn btn-link btn-menu">
                        <em class="fa fa-ellipsis-v"></em>
                    </a>
                </div>
                <div class="panel-body">
                    <span class="count"><?= $counters['newsletters']['count']; ?></span>
                    <span class="count total" data-label="total:"><?= $counters['newsletters']['total']; ?></span>
                    <span class="icon">
                        <em class="fa fa-fw fa-mail-bulk"></em>
                    </span>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php if (isset($counters['subscribers'])) { ?>
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="panel panel-counter panel-info">
                <div class="panel-heading">
                    <?= Yii::t('app/modules/subscribers', 'New subscribers in the last 24 hours') ?>
                    <a href="javascript:{};" class="btn btn-link btn-menu">
                        <em class="fa fa-ellipsis-v"></em>
                    </a>
                </div>
                <div class="panel-body">
                    <span class="count"><?= $counters['subscribers']['count']; ?></span>
                    <span class="count total" data-label="total:"><?= $counters['subscribers']['total']; ?></span>
                    <span class="icon">
                        <em class="fa fa-fw fa-address-card"></em>
                    </span>
                </div>
            </div>
        </div>
        <?php } ?>
        <!--
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="panel panel-counter panel-pink">
                <div class="panel-heading">
                    <?= Yii::t('app/modules/admin', 'Panel heading title') ?>
                    <a href="javascript:{};" class="btn btn-link btn-menu">
                        <em class="fa fa-ellipsis-v"></em>
                    </a>
                </div>
                <div class="panel-body">
                    <span class="count">+99</span>
                    <span class="count total" data-label="total:">1.2K</span>
                    <span class="icon">
                    <em class="fa fa-fw fa-address-card"></em>
                </span>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="panel panel-counter panel-violet">
                <div class="panel-heading">
                    <?= Yii::t('app/modules/admin', 'Panel heading title') ?>
                    <a href="javascript:{};" class="btn btn-link btn-menu">
                        <em class="fa fa-ellipsis-v"></em>
                    </a>
                </div>
                <div class="panel-body">
                    <span class="count">+99</span>
                    <span class="count total" data-label="total:">1.2K</span>
                    <span class="icon">
                    <em class="fa fa-fw fa-address-card"></em>
                </span>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="panel panel-counter panel-dark">
                <div class="panel-heading">
                    <?= Yii::t('app/modules/admin', 'Panel heading title') ?>
                    <a href="javascript:{};" class="btn btn-link btn-menu">
                        <em class="fa fa-ellipsis-v"></em>
                    </a>
                </div>
                <div class="panel-body">
                    <span class="count">+99</span>
                    <span class="count total" data-label="total:">1.2K</span>
                    <span class="icon">
                    <em class="fa fa-fw fa-address-card"></em>
                </span>
                </div>
            </div>
        </div>
        -->
    </div>
    <div class="row flex-row">
        <?php
            if ($intance = $module->moduleLoaded('admin/pages', true)) {
        ?>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="panel panel-widget">
                    <div class="panel-heading">
                        <?= Yii::t('app/modules/pages', 'Pages') ?>
                    </div>
                    <?php

                        if (isset($widgets['recentPages'])) {
                            if (count($widgets['recentPages']) > 0) {
                                echo '<ul class="panel-body list-group">';
                                foreach ($widgets['recentPages'] as $item) {
                                    $username = isset($item['user']['username']) ? $item['user']['username'].', ' : '';
                                    echo '<li class="list-group-item">'.Html::a($item['name'], ['pages/pages/update', 'id' => $item['id']]);
                                    echo Html::tag('small', $username . Yii::$app->formatter->asDate($item['updated_at']), ['class' => 'pull-right text-muted']);
                                    echo '</li>';
                                }
                                echo '</ul>';
                            } else {
                                echo '<div class="panel-body">';
                                echo '<p class="text-center text-muted align-center">'.Yii::t('app/modules/pages', 'No pages available for display').'</p>';
                                echo '</div>';
                            }
                        } else {
                            echo '<div class="panel-body">';
                            echo '<p class="text-center text-warning align-center">'.Yii::t('app/modules/pages', 'An error occurred while retrieving the page list').'</p>';
                            echo '</div>';
                        }
                    ?>
                    <div class="panel-footer">
                        <?= Html::a(Yii::t('app/modules/admin', 'View all'), ['pages/pages'], ['class' => 'text-muted']) ?>
                        <?= Html::a('<span class="fa fa-plus"></span> ' . Yii::t('app/modules/pages', 'Add new page'), ['pages/pages/create'], ['class' => 'pull-right']) ?>
                    </div>
                </div>
            </div>
        <?php
            }
        ?>

        <?php
            if ($intance = $module->moduleLoaded('admin/news', true)) {
        ?>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="panel panel-widget">
                    <div class="panel-heading">
                        <?= Yii::t('app/modules/news', 'News') ?>
                    </div>
                    <?php
                        if (isset($widgets['recentNews'])) {
                            if (count($widgets['recentNews']) > 0) {
                                echo '<ul class="panel-body list-group">';
                                foreach ($widgets['recentNews'] as $item) {
                                    $username = isset($item['user']['username']) ? $item['user']['username'].', ' : '';
                                    echo '<li class="list-group-item">'.Html::a($item['name'], ['news/news/update', 'id' => $item['id']]);
                                    echo Html::tag('small', $username . Yii::$app->formatter->asDate($item['updated_at']), ['class' => 'pull-right text-muted']);
                                    echo '</li>';
                                }
                                echo '</ul>';
                            } else {
                                echo '<div class="panel-body">';
                                echo '<p class="text-center text-muted align-center">'.Yii::t('app/modules/news', 'No news available').'</p>';
                                echo '</div>';
                            }
                        } else {
                            echo '<div class="panel-body">';
                            echo '<p class="text-center text-warning align-center">'.Yii::t('app/modules/news', 'An error occurred while retrieving the news list').'</p>';
                            echo '</div>';
                        }
                    ?>
                    <div class="panel-footer">
                        <?= Html::a(Yii::t('app/modules/admin', 'View all'), ['news/news'], ['class' => 'text-muted']) ?>
                        <?= Html::a('<span class="fa fa-plus"></span> ' . Yii::t('app/modules/news', 'Add news item'), ['news/news/create'], ['class' => 'pull-right']) ?>
                    </div>
                </div>
            </div>
        <?php
            }
        ?>

        <?php
            if ($intance = $module->moduleLoaded('admin/blog', true)) {
        ?>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="panel panel-widget">
                    <div class="panel-heading">
                        <?= Yii::t('app/modules/blog', 'Blog') ?>
                    </div>
                    <?php
                        if (isset($widgets['recentPosts'])) {
                            if (count($widgets['recentPosts']) > 0) {
                                echo '<ul class="panel-body list-group">';
                                foreach ($widgets['recentPosts'] as $item) {
                                    $username = isset($item['user']['username']) ? $item['user']['username'].', ' : '';
                                    echo '<li class="list-group-item">'.Html::a($item['name'], ['blog/posts/update', 'id' => $item['id']]);
                                    echo Html::tag('small', $username . Yii::$app->formatter->asDate($item['updated_at']), ['class' => 'pull-right text-muted']);
                                    echo '</li>';
                                }
                                echo '</ul>';
                            } else {
                                echo '<div class="panel-body">';
                                echo '<p class="text-center text-muted align-center">'.Yii::t('app/modules/blog', 'No posts available').'</p>';
                                echo '</div>';
                            }
                        } else {
                            echo '<div class="panel-body">';
                            echo '<p class="text-center text-warning align-center">'.Yii::t('app/modules/blog', 'An error occurred while retrieving the blog posts').'</p>';
                            echo '</div>';
                        }
                    ?>
                    <div class="panel-footer">
                        <?= Html::a(Yii::t('app/modules/admin', 'View all'), ['blog/posts'], ['class' => 'text-muted']) ?>
                        <?= Html::a('<span class="fa fa-plus"></span> ' . Yii::t('app/modules/blog', 'Add new post'), ['blog/posts/create'], ['class' => 'pull-right']) ?>
                    </div>
                </div>
            </div>
        <?php
            }
        ?>

        <?php
            if ($intance = $module->moduleLoaded('backend/users', true)) {
        ?>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="panel panel-widget">
                    <div class="panel-heading">
                        <?= Yii::t('app/modules/users', 'Users') ?>
                    </div>
                    <?php
                        if (isset($widgets['lastUsers'])) {
                            if (count($widgets['lastUsers']) > 0) {
                                echo '<ul class="panel-body list-group">';
                                foreach ($widgets['lastUsers'] as $item) {
                                    echo '<li class="list-group-item">'.Html::a($item['username'], ['./users/users/update', 'id' => $item['id']]);
                                    echo Html::tag('small', \Yii::$app->formatter->asDate($item['created_at']), ['class' => 'pull-right text-muted']);
                                    echo '</li>';
                                }
                                echo '</ul>';
                            } else {
                                echo '<div class="panel-body">';
                                echo '<p class="text-center text-muted align-center">'.Yii::t('app/modules/users', 'No users available').'</p>';
                                echo '</div>';
                            }
                        } else {
                            echo '<div class="panel-body">';
                            echo '<p class="text-center text-warning align-center">'.Yii::t('app/modules/users', 'An error occurred while retrieving the users list').'</p>';
                            echo '</div>';
                        }
                    ?>
                    <div class="panel-footer">
                        <?= Html::a(Yii::t('app/modules/admin', 'View all'), ['users/users'], ['class' => 'text-muted']) ?>
                        <?= Html::a('<span class="fa fa-plus"></span> ' . Yii::t('app/modules/users', 'Add new user'), ['users/users/create'], ['class' => 'pull-right']) ?>
                    </div>
                </div>
            </div>
        <?php
            }
        ?>

        <?php
            if ($intance = $module->moduleLoaded('admin/activity', true)) {
        ?>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="panel panel-widget">
                    <div class="panel-heading">
                        <?= Yii::t('app/modules/activity', 'Activity') ?>
                    </div>
                    <?php
                    if (isset($widgets['recentActivity'])) {
                        if (count($widgets['recentActivity']) > 0) {
                            echo '<ul class="panel-body list-group">';
                            foreach ($widgets['recentActivity'] as $item) {
                                $username = isset($item['user']['username']) ? $item['user']['username'].', ' : '';

                                $class = ' list-group-item-info';
                                if ($item['type'] == 'danger')
                                    $class = ' list-group-item-danger';
                                elseif ($item['type'] == 'warning')
                                    $class = ' list-group-item-warning';
                                elseif ($item['type'] == 'success')
                                    $class = ' list-group-item-success';

                                echo '<li class="list-group-item' . $class . '">';
                                    echo '<div style="padding: 0 10px">' . $item['message'];
                                    echo Html::tag('small', $username . Yii::$app->formatter->asDate($item['created_at']), ['class' => 'pull-right text-muted']);
                                    echo '</div>';
                                echo '</li>';
                            }
                            echo '</ul>';
                        } else {
                            echo '<div class="panel-body">';
                            echo '<p class="text-center text-muted align-center">'.Yii::t('app/modules/pages', 'No activity available for display').'</p>';
                            echo '</div>';
                        }
                    } else {
                        echo '<div class="panel-body">';
                        echo '<p class="text-center text-warning align-center">'.Yii::t('app/modules/pages', 'An error occurred while retrieving the list of activity').'</p>';
                        echo '</div>';
                    }
                    ?>
                    <div class="panel-footer">
                        <?= Html::a(Yii::t('app/modules/admin', 'View all'), ['activity/list'], ['class' => 'text-muted']) ?>
                    </div>
                </div>
            </div>
        <?php
            }
        ?>

        <?php
            if ($intance = $module->moduleLoaded('admin/reviews', true)) {
        ?>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="panel panel-widget">
                    <div class="panel-heading">
                        <?= Yii::t('app/modules/reviews', 'Reviews') ?>
                    </div>
                    <?php
                        if (isset($widgets['recentReviews'])) {
                            if (count($widgets['recentReviews']) > 0) {
                                echo '<ul class="panel-body list-group">';
                                /*foreach ($widgets['recentReviews'] as $item) {
                                    echo '<li class="list-group-item">'.Html::a($item['name'], ['./reviews/reviews/update', 'id' => $item['id']]);
                                    echo Html::tag('small', \Yii::$app->formatter->asDatetime($item['created_at']), ['class' => 'pull-right text-muted']);
                                    echo '</li>';
                                }*/
                                echo '</ul>';
                            } else {
                                echo '<div class="panel-body">';
                                echo '<p class="text-center text-muted align-center">'.Yii::t('app/modules/reviews', 'No reviews available').'</p>';
                                echo '</div>';
                            }
                        } else {
                            echo '<div class="panel-body">';
                            echo '<p class="text-center text-warning align-center">'.Yii::t('app/modules/reviews', 'An error occurred while retrieving the reviews list').'</p>';
                            echo '</div>';
                        }
                    ?>
                    <div class="panel-footer">
                        <?= Html::a(Yii::t('app/modules/admin', 'View all'), ['./reviews'], ['class' => 'text-muted']) ?>
                    </div>
                </div>
            </div>
        <?php
            }
        ?>

        <?php
            if ($intance = $module->moduleLoaded('admin/comments', true)) {
        ?>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="panel panel-widget">
                    <div class="panel-heading">
                        <?= Yii::t('app/modules/comments', 'Comments') ?>
                    </div>
                    <?php
                        if (isset($widgets['recentComments'])) {
                            if (count($widgets['recentComments']) > 0) {
                                echo '<ul class="panel-body list-group">';
                                foreach ($widgets['recentComments'] as $item) {
                                    $comment = StringHelper::stripTags($item['comment']);
                                    $comment = StringHelper::stringShorter($comment, 96);
                                    echo '<li class="list-group-item">' . Html::tag('i', Html::encode($comment));
                                    echo Html::tag('small', "by " .Html::a($item['name'], ['./comments/comments/update', 'id' => $item['id']]) . " " . \Yii::$app->formatter->asDatetime($item['created_at']), ['class' => 'pull-right text-muted']);
                                    echo '</li>';
                                }
                                echo '</ul>';
                            } else {
                                echo '<div class="panel-body">';
                                echo '<p class="text-center text-muted align-center">'.Yii::t('app/modules/comments', 'No comments available').'</p>';
                                echo '</div>';
                            }
                        } else {
                            echo '<div class="panel-body">';
                            echo '<p class="text-center text-warning align-center">'.Yii::t('app/modules/comments', 'An error occurred while retrieving the comments list').'</p>';
                            echo '</div>';
                        }
                    ?>
                    <div class="panel-footer">
                        <?= Html::a(Yii::t('app/modules/admin', 'View all'), ['./comments'], ['class' => 'text-muted']) ?>
                    </div>
                </div>
            </div>
        <?php
            }
        ?>

        <?php
            if ($intance = $module->moduleLoaded('admin/stats', true)) {
        ?>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="panel panel-widget">
                    <div class="panel-heading">
                        <?= Yii::t('app/modules/stats', 'Statistics') ?>
                    </div>
                    <?php
                        if (isset($widgets['recentStats'])) {
                            if (count($widgets['recentStats']) > 0) {
                                echo ChartJS::widget([
                                    'type' => 'line',
                                    'options' => [
                                        'height' => 248
                                    ],
                                    'data' => $widgets['recentStats']
                                ]);
                            } else {
                                echo '<div class="panel-body">';
                                echo '<p class="text-center text-muted align-center">'.Yii::t('app/modules/stats', 'No stats data available').'</p>';
                                echo '</div>';
                            }
                        } else {
                            echo '<div class="panel-body">';
                            echo '<p class="text-center text-warning align-center">'.Yii::t('app/modules/stats', 'An error occurred while retrieving the stats data').'</p>';
                            echo '</div>';
                        }
                    ?>
                    <div class="panel-footer">
                        <?= Html::a(Yii::t('app/modules/admin', 'View all'), ['./stats'], ['class' => 'text-muted']) ?>
                    </div>
                </div>
            </div>
            <?php if (isset($widgets['recentLoads'])) { ?>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="panel panel-widget">
                        <div class="panel-heading">
                            <?= Yii::t('app/modules/stats', 'Load') ?>
                        </div>
                        <?php
                            if (isset($widgets['recentLoads'])) {
                                if (count($widgets['recentLoads']) > 0) {
                                    echo ChartJS::widget([
                                        'type' => 'line',
                                        'options' => [
                                            'height' => 248
                                        ],
                                        'data' => $widgets['recentLoads']
                                    ]);
                                } else {
                                    echo '<div class="panel-body">';
                                    echo '<p class="text-center text-muted align-center">'.Yii::t('app/modules/stats', 'No loads data available').'</p>';
                                    echo '</div>';
                                }
                            } else {
                                echo '<div class="panel-body">';
                                echo '<p class="text-center text-warning align-center">'.Yii::t('app/modules/stats', 'An error occurred while retrieving the loads data').'</p>';
                                echo '</div>';
                            }
                        ?>
                        <div class="panel-footer">
                            <?= Html::a(Yii::t('app/modules/admin', 'View all'), ['./stats/load'], ['class' => 'text-muted']) ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php
            }
        ?>
    </div>
</div>

<?php echo $this->render('../_debug'); ?>
