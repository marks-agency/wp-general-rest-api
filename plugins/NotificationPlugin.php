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

        $pushNotificationPlugin->sendGroupMessage($notificationTypeID, $body, $data, $overrideTitle);
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

        $pushNotificationPlugin->sendGroupMessage($notificationTypeID, $body, $data, $overrideTitle);
        $pushNotificationPlugin->sendPushNotification($notificationTypeID, $body, $data,  $overrideTitle);
    }

    public function createNotificationPaymentReceived($data){
        
        $notificationTypeID = 3;

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

        $pushNotificationPlugin->sendGroupMessage($notificationTypeID, $body, $data, $overrideTitle);
        $pushNotificationPlugin->sendPushNotification($notificationTypeID, $body, $data,  $overrideTitle);
    }

    
    public function createNotificationDeactivationSite($data){

        $notificationTypeID = 4;

        $notificationModel = new NotificationModel();

        $notificationModel->createNotification($notificationTypeID , $data, $data["user_id"] );
        
        $pushNotificationPlugin = new PushNotificationPlugin();

        $body = "";

        if(!empty($data['blogname'])){
            $body = "O site ".$data['blogname']." foi desativado por falta de pagamento";
        }else{
            $body = "Um site acabou de ser desativado";
        }

        //$overrideTitle="";
        $overrideTitle = "⛔️ Site desativado";

        $pushNotificationPlugin->sendGroupMessage($notificationTypeID, $body, $data, $overrideTitle);
        $pushNotificationPlugin->sendPushNotification($notificationTypeID, $body, $data,  $overrideTitle);

        //$body = "o site da de teste2 foi desativado ⚠️ 🚫 ⛔️";

    }

    public function createNotificationDeactivationSiteAlert($data){

        $notificationTypeID = 5;

        $notificationModel = new NotificationModel();

        $notificationModel->createNotification($notificationTypeID , $data, $data["user_id"] );
        
        $pushNotificationPlugin = new PushNotificationPlugin();

        $body = "";

        if(!empty($data['blogname'])){
            $body = "O site ".$data['blogname']." vai ser desativado daqui a 7 dias por falta de pagamento";
        }else{
            $body = "Um site acabou de ser desativado";
        }

        //$overrideTitle="";
        $overrideTitle = "⚠️ Desativação de site";

        $pushNotificationPlugin->sendGroupMessage($notificationTypeID, $body, $data, $overrideTitle);
        $pushNotificationPlugin->sendPushNotification($notificationTypeID, $body, $data,  $overrideTitle);

        //$body = "o site da de teste2 foi desativado ⚠️ 🚫 ⛔️";

    }


}
