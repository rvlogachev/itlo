
<li class="nav-item">
<a class="nav-link" data-widget="navbar-search" href="#" role="button">
    <i class="fas fa-search"></i>
</a>
<div class="navbar-search navbar-search-block">
    <?php $searchForm = \yii\bootstrap4\ActiveForm::begin([
        'id' => 'adminSearchForm',
        'method' => 'GET',
        'options' => [
            'style' => 'margin-bottom: 0px !important',
            'class' => 'form-inline'
        ],
        'fieldConfig' => [
            'options' => [
                'tag' => false,
            ],
        ],
    ]); ?>


        <?= $searchForm->field(Yii::$app->dashboard->search, 'query', [
           // 'template' => '{label}<div class="form-control form-control-navbar"><div class="input-group-addon"><span class="fa fa-search"></span></div>{input}</div>{hint}{error}'
            'template' => '<div class="input-group input-group-sm">{input}<div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                  <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                  <i class="fas fa-times"></i>
                                </button>
                              </div>
                            </div>{hint}{error}'
        ])->textInput(['placeholder' => Yii::t('app/modules/admin', 'Type to search...'),
            "autocomplete" => "off",'class'=>'form-control form-control-navbar'])->label(false); ?>
        <div class="search-box">
            <ul class="list-unstyled"></ul>
            <div class="no-search-results" style="display: none;position: absolute;top: 87%;right: 81%;">
                <div class="alert alert-warning" role="alert">
                    <i class="fa fa-exclamation-triangle"></i>
                    <?= Yii::t('app/modules/admin', 'No entry for <strong>`<span class="query"></span>`</strong> was found.') ?>
                </div>
            </div>
        </div>


    <?php \yii\bootstrap4\ActiveForm::end();?>
</div>
</li>

