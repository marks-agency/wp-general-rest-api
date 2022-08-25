<?php

namespace Plugins;

use ExpoSDK\Expo;
use ExpoSDK\ExpoMessage;
use Models\UserTokenModel;
use Models\NotificationModel;
use Plugins\PushNotificationPlugin;

Expo::addDevicesNotRegisteredHandler(function ($tokens) {
    // this callback is called once and receives an array of unregistered tokens
    
    $userTokenModel = new UserTokenModel();
    
    foreach ($tokens as $key => $value) {
        $results = $userTokenModel->deleteUserTokenByExpoToken($value); 
    }
    
});

class Notification
{

    public function testFirstPushNotification(){
        
        $message = (new ExpoMessage([
            'title' => 'initial title',
            'body' => 'initial body',
            'to'  => 'ExponentPushToken[Rn1y4MFCv8uZ1tMqbcxuKl]'
        ]))
        ->setData(['id' => 1])
        ->setChannelId('default')
        ->setBadge(0)
        ->playSound();
        
        //
        //->setTitle('This title overrides initial title')
        //->setBody('This notification body overrides initial body')
        //$expo = new Expo();
        //$response = $expo->send($message)->push();

        //return $response->getData()[0]['status'];
        $this->createNotificationForFilledBreafing(["valeu"=>"teste"]);
        return "ok";
    }
    // 'ExponentPushToken[Rn1y4MFCv8uZ1tMqbcxuKl]'

    // ExponentPushToken[k2DLS2DgStFqCM9ttyCj7j]
    
    public function createNotificationForFilledBreafing($data){
        
        $notificationModel = new NotificationModel();
        $userID = 1;
        $metaValue = $data;
        $notificationTypeID = 1;
        //$notificationModel->createNotification($notificationTypeID , $metaValue, $userID );
        
        $pushNotificationPlugin = new PushNotificationPlugin();

        $body = "teu briefing acabou de ser preenchido";

        $pushNotificationPlugin->sendPushNotification($notificationTypeID, $body, $data);
    }



}
