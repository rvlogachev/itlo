<?php

use yii\helpers\Html;
use yii\web\View;
use yii\web\HttpException;

?>
<?php
if (isset($statuses[$code])) {
    $this->title = $code ." " . $statuses[$code];
} else {
    $this->title = $code;
}
?>
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><?= $this->title ?></h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="error-content   ">
                <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>

                <div class="admin-error">
                    <div class="alert alert-<?= $type ?>">
                        <?= $message ?>
                    </div>
                </div>

                    <div class="input-group   ">
                        <a href="/backend/web/admin/admin/index"  class="btn btn-warning">Go To Dashboard</i>
                        </a>
                    </div>

            </div>
        </div>
        <div class="card-footer">

        </div>
    </div>
</section>


<?php echo $this->render('../_debug'); ?>
