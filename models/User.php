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

    /**
     * Returns all Group relations of this user as ActiveQuery
     * @return ActiveQuery
     */
    public function getOrganisationMember()
    {
        return $this->hasOne(OrganisationMember::className(), ['id'=>'user_id']);
    }

    public function getOrganisation()
    {
        return $this->hasOne(Organisation::className(), ['organisation_id' => 'id'])->via('organisationMember');
    }

}
