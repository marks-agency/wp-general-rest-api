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


    public function createNotificationForWoocommerceNewOrder($data){
        
        $notificationModel = new NotificationModel();
        $userID = 1;
        $metaValue = $data;
        $notificationTypeID = 2;
        
        $notificationModel->createNotification($notificationTypeID , $metaValue, $userID );
        
        $pushNotificationPlugin = new PushNotificationPlugin();

        $body = "fulano de tal acabou de fazer um novo pedido";

        $pushNotificationPlugin->sendPushNotification($notificationTypeID, $body, $data);
    }

    public function createNotificationDeactivationSite($data){
        
        $notificationModel = new NotificationModel();
        $userID = 1;
        $metaValue = $data;
        $notificationTypeID = 3;
        
        $notificationModel->createNotification($notificationTypeID , $metaValue, $userID );
        
        $pushNotificationPlugin = new PushNotificationPlugin();

        $body = "o site da de teste2 foi desativado";

        $pushNotificationPlugin->sendPushNotification($notificationTypeID, $body, $data);
    }

}
