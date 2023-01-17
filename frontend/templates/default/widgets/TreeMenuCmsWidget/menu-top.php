<?php
?>
<div class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-right">
        <li class="hidden-md hidden-lg">
            <div class="bg-light-gray">
                <form class="form-horizontal form-light p-15" role="form">
                    <div class="input-group input-group-lg">
                        <input type="text" class="form-control" placeholder="I want to find ...">
                        <span class="input-group-btn">
                            <button class="btn btn-white" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </li>
        <li class="<?= \Yii::$app->request->absoluteUrl == \yii\helpers\Url::home(true) ? 'active' : ''; ?>">
            <a href="<?= \yii\helpers\Url::home(); ?>"><i class="fa fa-home"></i> Главная</a>
        </li>

        <?php if ($trees = $widget->activeQuery->all()) : ?>
            <?php foreach ($trees as $tree) : ?>
                <?php echo $this->render("_one", [
                    "widget"        => $widget,
                    "model"         => $tree,
                ]); ?>
            <?php  endforeach; ?>
        <?php endif; ?>

        <!--<li class="dropdown dropdown-aux animate-click" data-animate-in="animated bounceInUp" data-animate-out="animated fadeOutDown" style="z-index:500;">
            <a href="#" class="dropdown-form-toggle" data-toggle="dropdown"><i class="fa fa-search"></i></a>
            <ul class="dropdown-menu dropdown-menu-user animate-wr">
                <li id="dropdownForm">
                    <div class="dropdown-form">
                        <form class="form-horizontal form-light p-15" role="form">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="I want to find ...">
                                <span class="input-group-btn">
                                    <button class="btn btn-base" type="button">Go</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </li>
            </ul>
        </li>-->
    </ul>
</div>
