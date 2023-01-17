<?php

namespace common\modules\tickets\models;

use Yii;
use \common\modules\base\models\ActiveRecord;
use \yii\behaviors\TimeStampBehavior;

/**
 * This is the model class for table "tickets_messages".
 *
 * @property int $id
 * @property int $ticket_id
 * @property int $sender_id
 * @property string $message
 * @property string $created_at
 * @property string $updated_at
 * @property int $attachment_id
 *
 * @property TicketsAttachments $attachment
 * @property Tickets $ticket
 */
class TicketsMessages extends ActiveRecord
{

    /**
     * @var Instance of current module
     */
    private $_module;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%tickets_messages}}';
    }

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        $this->_module = parent::getModule(true);
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
                    self::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    self::EVENT_BEFORE_UPDATE => 'updated_at',
                ],
                'value' => function() {
                    return date("Y-m-d H:i:s");
                }
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ticket_id'], 'required'],
            [['ticket_id', 'sender_id', 'attachment_id'], 'integer'],
            [['message'], 'string'],
            [['attachment', 'created_at', 'updated_at'], 'safe'],
            [['attachment_id'], 'exist', 'skipOnError' => true, 'targetClass' => TicketsAttachments::class, 'targetAttribute' => ['attachment_id' => 'id']],
            [['ticket_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tickets::class, 'targetAttribute' => ['ticket_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app/modules/tickets', 'ID'),
            'ticket_id' => Yii::t('app/modules/tickets', 'Ticket ID'),
            'sender_id' => Yii::t('app/modules/tickets', 'Sender ID'),
            'message' => Yii::t('app/modules/tickets', 'Message'),
            'created_at' => Yii::t('app/modules/tickets', 'Created At'),
            'updated_at' => Yii::t('app/modules/tickets', 'Updated At'),
            'attachment' => Yii::t('app/modules/tickets', 'Attachment'),
            'attachment_id' => Yii::t('app/modules/tickets', 'Attachment ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttachment()
    {
        return $this->hasOne(TicketsAttachments::class, ['id' => 'attachment_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicket()
    {
        return $this->hasOne(Tickets::class, ['id' => 'ticket_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSender()
    {
        if(class_exists('\common\modules\users\models\Users') && $this->_module->moduleLoaded('users'))
            return $this->hasOne(\common\modules\users\models\Users::class, ['id' => 'sender_id']);
        else
            return null;
    }
}
