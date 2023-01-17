<?php

namespace common\modules\bot\models;

use Yii;

/**
 * This is the model class for table "bot_img_id".
 *
 * @property int $id
 * @property int $vk_id
 * @property int $user_id в боте 
 * @property int $user_backend_id
 * @property int $order
 * @property int $img_id
 * @property int $album_id
 * @property int $owner_id
 * @property string $sizes
 * @property string $prim
 * @property string $path
 * @property string $base_url
 * @property string $type
 * @property int $size
 * @property string $name
 * @property int $created_at
 * @property string $url
 *
 * @property BotMessageImage $img
 */
class BotImgId extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bot_img_id';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vk_id', 'user_id', 'user_backend_id', 'order', 'img_id', 'album_id', 'owner_id', 'size', 'created_at'], 'integer'],
            [['sizes', 'prim','url'], 'string'],
            [['path', 'base_url', 'type', 'name'], 'string', 'max' => 255],
            [['img_id'], 'exist', 'skipOnError' => true, 'targetClass' => BotMessageImage::className(), 'targetAttribute' => ['img_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vk_id' => 'Vk ID',
            'user_id' => 'в боте ',
            'user_backend_id' => 'User Backend ID',
            'order' => 'Order',
            'img_id' => 'Img ID',
            'album_id' => 'Album ID',
            'owner_id' => 'Owner ID',
            'sizes' => 'Sizes',
            'prim' => 'Prim',
            'path' => 'Path',
            'base_url' => 'Base Url',
            'type' => 'Type',
            'size' => 'Size',
            'name' => 'Name',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImg()
    {
        return $this->hasOne(BotMessageImage::className(), ['id' => 'img_id']);
    }

    /**
     * @inheritdoc
     * @return BotImgIdQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BotImgIdQuery(get_called_class());
    }
}
