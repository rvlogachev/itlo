<?php

namespace common\modules\media\models;

use Yii;
use yii\db\Expression;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\base\InvalidArgumentException;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "{{%media_cats}}".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $name
 * @property string $alias
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 */

class Categories extends ActiveRecord
{

    public $route;
    public $url;

    const DEFAULT_CATEGORY_ID = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%media_cats}}';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'created_at',
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at',
                ],
                'value' => new Expression('NOW()'),
            ],
            'blameable' => [
                'class' => BlameableBehavior::class,
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
            'sluggable' =>  [
                'class' => SluggableBehavior::class,
                'attribute' => ['name'],
                'slugAttribute' => 'alias',
                'ensureUnique' => true,
                'skipOnEmpty' => true,
                'immutable' => true,
                'value' => function ($event) {
                    return mb_substr($this->name, 0, 32);
                }
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        $rules = [
            [['name', 'alias'], 'required'],
            [['parent_id'], 'integer'],
            [['name', 'alias'], 'string', 'min' => 3, 'max' => 128],
            [['name', 'alias'], 'string', 'min' => 3, 'max' => 128],
            [['title', 'description', 'keywords'], 'string', 'max' => 255],
            ['alias', 'unique', 'message' => Yii::t('app/modules/media', 'Param attribute must be unique.')],
            ['alias', 'match', 'pattern' => '/^[A-Za-z0-9\-\_]+$/', 'message' => Yii::t('app/modules/media','It allowed only Latin alphabet, numbers and the «-», «_» characters.')],
            [['created_at', 'updated_at'], 'safe'],
        ];

        if (class_exists('\wdmg\users\models\Users')) {
            $rules[] = [['created_by', 'updated_by'], 'safe'];
        }

        return $rules;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app/modules/media', 'ID'),
            'parent_id' => Yii::t('app/modules/media', 'Parent ID'),
            'name' => Yii::t('app/modules/media', 'Name'),
            'alias' => Yii::t('app/modules/media', 'Alias'),
            'title' => Yii::t('app/modules/media', 'Title'),
            'description' => Yii::t('app/modules/media', 'Description'),
            'keywords' => Yii::t('app/modules/media', 'Keywords'),
            'created_at' => Yii::t('app/modules/media', 'Created at'),
            'created_by' => Yii::t('app/modules/media', 'Created by'),
            'updated_at' => Yii::t('app/modules/media', 'Updated at'),
            'updated_by' => Yii::t('app/modules/media', 'Updated by'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function afterFind()
    {
        parent::afterFind();

        if (is_null($this->url))
            $this->url = $this->getUrl();

    }

    public function beforeDelete()
    {
        // Category for uncategorized posts has undeleted
        if ($this->id === self::DEFAULT_CATEGORY_ID)
            return false;

        // Set default uncategorized category for media items
        Media::updateAll(['status' => Media::MEDIA_STATUS_DRAFT, 'cat_id' => self::DEFAULT_CATEGORY_ID], ['cat_id' => $this->id]);

        return parent::beforeDelete();
    }

    /**
     * @return object of \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        if (class_exists('\wdmg\users\models\Users'))
            return $this->hasOne(\wdmg\users\models\Users::class, ['id' => 'created_by']);
        else
            return $this->created_by;
    }

    /**
     * @return object of \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        if (class_exists('\wdmg\users\models\Users'))
            return $this->hasOne(\wdmg\users\models\Users::class, ['id' => 'updated_by']);
        else
            return $this->updated_by;
    }

    /**
     * Returns all media categories
     *
     * @param null $cond sampling conditions
     * @param bool $asArray flag if necessary to return as an array
     * @return array|ActiveRecord|null
     */
    public function getAll($cond = null, $asArray = false) {
        if (!is_null($cond))
            $models = self::find()->where($cond);
        else
            $models = self::find();

        if ($asArray)
            return $models->asArray()->all();
        else
            return $models->all();

    }

    /**
     * Return the public route for categories URL
     * @return string
     */
    private function getRoute($route = null)
    {

        if (is_null($route)) {
            if (isset(Yii::$app->params["media.mediaCategoriesRoute"])) {
                $route = Yii::$app->params["media.mediaCategoriesRoute"];
            } else {

                if (!$module = Yii::$app->getModule('admin/media'))
                    $module = Yii::$app->getModule('media');

                $route = $module->mediaCategoriesRoute;
            }
        }

        if ($this->parent_id) {
            if ($parent = self::find()->where(['id' => intval($this->parent_id)])->one())
                return $parent->getRoute($route) ."/". $parent->alias;

        }

        return $route;
    }

    /**
     *
     * @param $withScheme boolean, absolute or relative URL
     * @return string or null
     */
    public function getCategoryUrl($withScheme = true, $realUrl = false)
    {
        $this->route = $this->getRoute();
        if (isset($this->alias)) {
            return \yii\helpers\Url::to($this->route . '/' .$this->alias, $withScheme);
        } else {
            return null;
        }
    }

    /**
     * Returns the URL to the view of the current media category
     *
     * @return string
     */
    public function getUrl()
    {
        if ($this->url === null)
            $this->url = $this->getCategoryUrl();

        return $this->url;
    }


    /**
     * @param bool $allLabel
     * @param bool $rootLabel
     * @return array
     */
    public function getParentsList($allLabel = true, $rootLabel = false)
    {

        if ($this->id) {
            $subQuery = self::find()->select('id')->where(['parent_id' => $this->id]);
            $query = self::find()->alias('categories')
                ->where(['not in', 'categories.parent_id', $subQuery])
                ->andWhere(['!=', 'categories.parent_id', $this->id])
                ->orWhere(['IS', 'categories.parent_id', null])
                ->andWhere(['!=', 'categories.id', $this->id])
                ->select(['id', 'name']);

            $list = $query->asArray()->all();
        } else {
            $list = self::find()->select(['id', 'name'])->asArray()->all();
        }

        if ($allLabel)
            return ArrayHelper::merge([
                '*' => Yii::t('app/modules/media', '-- All categories --')
            ], ArrayHelper::map($list, 'id', 'name'));
        elseif ($rootLabel)
            return ArrayHelper::merge([
                0 => Yii::t('app/modules/media', '-- Root category --')
            ], ArrayHelper::map($list, 'id', 'name'));
        else
            return ArrayHelper::map($list, 'id', 'name');
    }


    /**
     * @return object of \yii\db\ActiveQuery
     */
    public function getMedia($cat_id = null, $asArray = false) {

        if (!($cat_id === false) && !is_integer($cat_id) && !is_string($cat_id))
            $cat_id = $this->id;

        $query = Media::find()->alias('media')
            ->select(['media.id', 'media.name', 'media.alias', 'media.mime_type', 'media.title', 'media.description'])
            ->leftJoin(['categories' => self::tableName()], '`media`.`cat_id` = `categories`.`id`');

        if (is_integer($cat_id))
            $query->andWhere([
                'categories.id' => intval($cat_id)
            ]);

        if ($asArray)
            return $query->asArray()->all();
        else
            return $query->all();

    }
}
