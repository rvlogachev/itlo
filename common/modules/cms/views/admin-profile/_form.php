<?php
echo $this->render('@common/modules/cms/views/admin-user/_form', [
    'model' => $model,
    'relatedModel' => $relatedModel,
    'passwordChange' => $passwordChange,
]);
