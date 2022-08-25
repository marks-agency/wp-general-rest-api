<?php

namespace Plugins;

use ExpoSDK\Expo;
use ExpoSDK\ExpoMessage;
use Models\UserTokenModel;
use Models\NotificationModel;
use Controllers\UserTokenController;

Expo::addDevicesNotRegisteredHandler(function ($tokens) {
    // this callback is called once and receives an array of unregistered tokens
    
    $userTokenModel = new UserTokenModel();
    
    foreach ($tokens as $key => $value) {
        $results = $userTokenModel->deleteUserTokenByExpoToken($value); 
    }
    
});

class PushNotificationPlugin
{


    public function generatePushNotificationForSingleExponentToken($title, $body, $exponentPushToken, $data = []  ){
        
        $message = (new ExpoMessage([
            'title' => $title,
            'body' => $body,
            'to'  => $exponentPushToken
        ]))
        ->setData($data)
        ->setChannelId('default')
        ->setBadge(0)
        ->playSound();
        
        $expo = new Expo();
        $response = $expo->send($message)->push();
        
        //return $response->getData()[0]['status'];
    }

    public function sendPushNotification($notificationTypeID){
        $userTokenController = new UserTokenController();

        $usersTokens = $userTokenController->getEnabledExpoTokensByNotificationTypeIDHelper($notificationTypeID);
        $notificationType = 1;
    }

}
