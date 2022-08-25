<?php

namespace Plugins;

use Models\NotificationModel;
use Plugins\PushNotificationPlugin;


class NotificationPlugin
{

    public function createNotificationForFilledBreafing($data){
        
        $notificationModel = new NotificationModel();
        $userID = 1;
        $metaValue = $data;
        $notificationTypeID = 1;
        
        $notificationModel->createNotification($notificationTypeID , $metaValue, $userID );
        
        $pushNotificationPlugin = new PushNotificationPlugin();

        $body = "teu briefing acabou de ser preenchido";

        $pushNotificationPlugin->sendPushNotification($notificationTypeID, $body, $data);
    }



}
