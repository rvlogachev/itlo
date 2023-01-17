<div class="direct-default-index">
    <h1><?= common\modules\bot\modules\consultant\ConsultantModule::getModuleName(); ?></h1>
    <p>
       Модуль преднозначен для  создания и управления рекламными компаниями в Yandex Direct.
    </p>

</div>

<?php
$calcto_lexus = simplexml_load_file('/home/projects/avtomos/common/modules/bot/xml/calcto_lexus.xml');
echo "<table border='1'>\n";

foreach ($calcto_lexus as $cat) { ?>
    <tr>
        <td><?php \yii\helpers\VarDumper::dump($cat,10,true); ?></td>

    </tr>
    <?
}
echo "</table>\n";?>