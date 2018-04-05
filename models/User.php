<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace humhub\modules\organisations\models;

/**
 * Description of User
 *
 * @author Jeffrey Geyssens <jeffrey@humanized.be>
 */
class User extends \humhub\modules\user\models\User
{

 

    public function getOrganisation()
    {
        return $this->hasOne(Organisation::className(),['id'=>'organisation_id'])->viaTable('organisation_member',['user_id'=>'id']);
    }

}
