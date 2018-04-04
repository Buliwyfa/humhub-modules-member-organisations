<?php

/**
 * @link https://www.humanized.it/
 * @copyright Copyright (c) 2018 Humanized
 * @license https://www.humhub.com/licences
 */

namespace humhub\modules\organisations\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 */
class OrganisationMember extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organisation_member';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['organisation_id', 'user_id'], 'required'],
            [['organisation_id', 'user_id'], 'integer'],
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

}
