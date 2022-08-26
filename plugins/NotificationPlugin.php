<?php

namespace Plugins;

use Models\NotificationModel;
use Plugins\PushNotificationPlugin;


class NotificationPlugin
{

    public function createNotificationForFilledBreafing($data){
        $notificationTypeID = 1;
        $notificationModel = new NotificationModel();
        
        $notificationModel->createNotification($notificationTypeID , $data, $data["user_id"] );
        
        $pushNotificationPlugin = new PushNotificationPlugin();

        $body = "";

        if(!empty($data['customer_name'])){
            $body = "O briefing ".$data["post_title"]. " foi preenchido por ".$data['customer_name'];
        }else{
            $body = "O briefing ".$data["post_title"]. " foi preenchido";
        }

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

    public function createNotificationPaymentReceived($data){
        
        $notificationModel = new NotificationModel();
        $userID = 1;
        $metaValue = $data;
        $notificationTypeID = 4;
        
        $notificationModel->createNotification($notificationTypeID , $metaValue, $userID );
        
        $pushNotificationPlugin = new PushNotificationPlugin();

        $body = "o site da de teste2 foi desativado";

        $pushNotificationPlugin->sendPushNotification($notificationTypeID, $body, $data);
    }

}
