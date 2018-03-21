<?php

/**
 * @link https://www.humanized.it/
 * @copyright Copyright (c) 2018 Humanized
 * @license https://www.humhub.com/licences
 */

namespace humhub\modules\organisation\models;

use Yii;
use humhub\modules\gallery\models\Media;

/**
 * This is the model class for table "profile".
 *
 * @property integer $user_id

 */
class Organisation extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organisation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'mail_slug'], 'string'],
            [['gallery_media_id'], 'integer'],
            [['gallery_media_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        $labels = [];
        return $labels;
    }

    public function getMedia()
    {
        return $this->hasOne(Media::className(), ['id' => 'gallery_media_id']);
    }

}
