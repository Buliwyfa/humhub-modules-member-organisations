<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2017 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\modules\organisations\widgets;

use humhub\libs\Html;
use yii\helpers\Url;
use humhub\components\Widget;

/**
 * UserTagList displays the user tags on the directory page
 *
 * @since 1.2
 * @author Luke
 */
class UserTagList extends Widget
{

    /**
     * @var \humhub\modules\user\models\User
     */
    public $user;

    /**
     * @var int number of max. displayed tags
     */
    public $maxTags = 5;

    /**
     * @inheritdoc
     */
    public function run()
    {
        $organisation = $this->user->organisation;
        $organisationTag = isset($organisation) ? [$organisation->name] : [];
        $tags = array_merge($organisationTag, $this->user->getTags());
        $count = count($tags);

        if ($count === 0) {
            return;
        } elseif ($count > $this->maxTags) {
            $tags = array_slice($tags, 0, $this->maxTags);
        }

        $html = '';
        $printOrganisation = !empty($organisationTag) ? true : false;
        foreach ($tags as $tag) {
            $url = ['/directory/directory/members', 'keyword' => $tag];
            $labelClass = 'label-default';
            if ($printOrganisation && $tag == $organisationTag[0]) {
                $printOrganisation = false;
                $labelClass='label-primary';
                if (isset($organisation->media) && isset($organisation->media->href) && $organisation->media->href != '') {
                    $url = $organisation->media->href;
                }
            }

            $html .= Html::a(Html::encode($tag), Url::to($url), ['class' => 'label ' . $labelClass]) . "&nbsp";
        }

        return $html;
    }

}
