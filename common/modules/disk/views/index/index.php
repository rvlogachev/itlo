<?php

/**
 * @var $this yii\web\View
 */

$this->title = Yii::t('app/modules/disk', 'Disk');

$this->params['breadcrumbs'][] = $this->title;

?>
<div class="row">
    <div class="col-sm-12">

        <?php
        $info = $yandexDisk->getInfo();
        print_r($info,true);
        $result =  \Leonied7\Yandex\Disk\Collection\ResultList::getInstance()->getLast();

        /** @var \Leonied7\Yandex\Disk\Collection\PropertyCollection $spaceCollection */
        $spaceCollection = $yandexDisk->spaceInfo();
        //поиск в коллекции свойство с имененем 'quota-available-bytes'
        /** @var \Leonied7\Yandex\Disk\Property\Immutable $available */
        $available = $spaceCollection->find('quota-available-bytes');
        echo "Свободного места ".$available->getValue()."\r\n"; //свободное места

        /** @var \Leonied7\Yandex\Disk\Property\Immutable $used */
        $used = $spaceCollection->find('quota-used-bytes');
        echo "Занятого места ".$used->getValue()."\r\n"; //занятое места

        $directory = $yandexDisk->directory('/');
        // дальнейшая работа с директорией
        echo "<pre>";
        print_r($directory->getChildren() );
        //$this->assertNotEmpty($info, $result->getActualResult());
        //$this->assertTrue($result->isSuccess(), $result->getActualResult());
        ?>
    </div>
</div>
