<?php

namespace humhub\modules\gallery;

use \Yii;
use \yii\base\Object;

/**
 * The event handler for the gallery module.
 *
 * @package humhub.modules.gallery
 * @since 1.0
 * @author Sebastian Stumpf
 */
class Events extends Object
{

    public static function onSpaceMenuInit($event)
    {
        if ($event->sender->space !== null && $event->sender->space->isModuleEnabled('gallery') && $event->sender->space->isMember()) {
            $event->sender->addItem(array(
                'label' => Yii::t('GalleryModule.base', 'Gallery'),
                'group' => 'modules',
                'url' => $event->sender->space->createUrl('/gallery/list'),
                'icon' => '<i class="fa fa-picture-o"></i>',
                'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'gallery')
            ));
        }
    }

    public static function onProfileMenuInit($event)
    {
        if ($event->sender->user !== null && $event->sender->user->isModuleEnabled('gallery')) {

            //if ($event->sender->user->canAccessPrivateContent()) {
            $event->sender->addItem(array(
                'label' => Yii::t('GalleryModule.base', 'Gallery'),
                'url' => $event->sender->user->createUrl('/gallery/list'),
                'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'gallery')
            ));
            //}
        }
    }

}
