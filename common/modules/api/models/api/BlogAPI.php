<?php

namespace common\modules\api\models\api;

use Yii;
use common\modules\blog\models\Posts;

class BlogAPI extends Posts
{
    private $allowedFields = [
        'id',
        'source_id',
        'name',
        'alias',
        'image',
        'excerpt',
        'content',
        'categories',
        'tags',
        'title',
        'description',
        'keywords',
        'url',
        'locale',
        'status'
    ];

    public function fields()
    {
        if (!$fields = parent::fields())
            $fields = parent::attributes();

        foreach ($fields as $key => $field) {
            if (!in_array($key, $this->allowedFields))
                unset($fields[$key]);
        }

        $fields['url'] = function ($model) {
            return $model->getUrl(true);
        };

        return $fields;
    }

    public function extraFields()
    {
        return [
            'tags' => function() {
                return $this->getTags();
            },
            'categories' => function() {
                return $this->getCategories();
            },
            'created' => function() {
                if ($created = $this->getCreatedBy()->one()) {
                    return [
                        'id' => $created->id,
                        'username' => $created->username,
                        'datetime' => $this->created_at,
                    ];
                }
                return null;
            },
            'updated' => function() {
                if ($updated = $this->getUpdatedBy()->one()) {
                    return [
                        'id' => $updated->id,
                        'username' => $updated->username,
                        'datetime' => $this->updated_at,
                    ];
                }
                return null;
            },
        ];
    }
}