<?php
/**
 * @author Roman Logachev
 * @link http://itlo.ru/
 * @copyright 2018-2021 ITLO (CMS)
 * @date 15.11.2021
 * @since 0.0.1
 */

namespace common\modules\cms\models\behaviors\traits;

use common\modules\cms\relatedProperties\models\RelatedElementPropertyModel;
use common\modules\cms\relatedProperties\models\RelatedPropertiesModel;
use common\modules\cms\relatedProperties\models\RelatedPropertyModel;
use common\modules\cms\relatedProperties\PropertyType;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @method ActiveQuery getRelatedElementProperties()
 * @method ActiveQuery getRelatedProperties()
 * @method RelatedPropertiesModel getRelatedPropertiesModel()
 *
 * @property RelatedElementPropertyModel[] relatedElementProperties
 * @property RelatedPropertyModel[] relatedProperties
 * @property RelatedPropertiesModel relatedPropertiesModel
 */
trait HasRelatedPropertiesTrait
{
    /**
     *
     * @param ActiveQuery $activeQuery
     * @param RelatedPropertyModel|null $relatedPropertyModel
     * @param $value
     * @return null
     */
    public static function filterByProperty(
        ActiveQuery $activeQuery,
        RelatedPropertyModel $relatedPropertyModel = null,
        $value
    ) {
        if (!$relatedPropertyModel) {
            return null;
        }

        $activeQuery->joinWith('relatedElementProperties map');

        if (in_array($relatedPropertyModel->property_type, [PropertyType::CODE_STRING])) {
            $activeQuery
                ->andWhere(['map.property_id' => $relatedPropertyModel->id])
                ->andWhere(['map.value_string' => $value]);
        } else {
            if (in_array($relatedPropertyModel->property_type, [
                PropertyType::CODE_ELEMENT
                ,
                PropertyType::CODE_TREE
                ,
                PropertyType::CODE_LIST
                ,
                PropertyType::CODE_NUMBER
            ])) {
                $activeQuery
                    ->andWhere(['map.property_id' => $relatedPropertyModel->id])
                    ->andWhere(['map.value_enum' => $value]);
            } else {
                //TODO: медленно
                $activeQuery
                    ->andWhere(['map.property_id' => $relatedPropertyModel->id])
                    ->andWhere(['map.value' => $value]);
            }
        }
    }
}