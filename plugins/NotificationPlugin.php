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
        
        //$overrideTitle="";
        $overrideTitle = "📩 Briefing prenchido";

        $pushNotificationPlugin->sendPushNotification($notificationTypeID, $body, $data, $overrideTitle);
    }


    public function createNotificationForWoocommerceNewOrder($data){
        
        $notificationTypeID = 2;

        $notificationModel = new NotificationModel();

        $notificationModel->createNotification($notificationTypeID , $data, $data["user_id"] );
        
        $pushNotificationPlugin = new PushNotificationPlugin();

        $body = "";

        if(!empty($data['customer_name'])){
            $body = "Cliente ".$data['customer_name']." acabou de fazer um novo pedido 😍";
        }else{
            $body = "Um novo pedido acabou se ser feito 😍";
        }

        //$overrideTitle="";
        $overrideTitle = "Novo pedido: #".$data["post_id"];

        $pushNotificationPlugin->sendPushNotification($notificationTypeID, $body, $data,  $overrideTitle);
    }

    public function createNotificationDeactivationSite($data){
        
        $notificationModel = new NotificationModel();
        $userID = 1;
        $metaValue = $data;
        $notificationTypeID = 3;
        
        $notificationModel->createNotification($notificationTypeID , $metaValue, $userID );
        
        $pushNotificationPlugin = new PushNotificationPlugin();

        $body = "o site da de teste2 foi desativado ⚠️ 🚫 ⛔️";

        $pushNotificationPlugin->sendPushNotification($notificationTypeID, $body, $data);
    }

    public function createNotificationPaymentReceived($data){
        
        $notificationTypeID = 2;

        $notificationModel = new NotificationModel();

        $notificationModel->createNotification($notificationTypeID , $data, $data["user_id"] );
        
        $pushNotificationPlugin = new PushNotificationPlugin();

        $body = "";

        if(!empty($data['customer_name'])){
            $body = "Cliente ".$data['customer_name']." acabou de fazer pagamento 💵";
        }else{
            $body = "O pagamento do pedido acabou de ser realizado 💵";
        }

        //$overrideTitle="";
        $overrideTitle = "💰 Pagamento do pedido: #".$data["post_id"];

        $pushNotificationPlugin->sendPushNotification($notificationTypeID, $body, $data,  $overrideTitle);
    }

}
