<?php

namespace Plugins;

use ExpoSDK\Expo;
use ExpoSDK\ExpoMessage;
use Models\UserTokenModel;
use Models\NotificationModel;
use Controllers\UserTokenController;
use Controllers\NotificationTypeController;

use Exception;

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
        
        return $response->getData()[0]['status'];

    }

    public function sendGroupMessage($notificationTypeID, $body, $data = [], $overrideTitle = ""){
        
        
        $notificationTypeController = new NotificationTypeController();
        $notificationType = $notificationTypeController->getNotificationTypeByIDHelper($notificationTypeID);

        $title = $notificationType->title;

        $text = "*".$title."*\n\n" . $body;
        
        $postData = array(
            'to' => '555181391215-1607993833',
            'group' => true,
            'text' => $text,
        );

        try{
            // Setup cURL
            $ch = curl_init('http://3.211.98.84:3000/send');
            curl_setopt_array($ch, array(
                CURLOPT_POST => TRUE,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
                CURLOPT_POSTFIELDS => json_encode($postData)
            ));
            
            // Send the request
            $response = curl_exec($ch);

        }catch (Exception $e){
            $t = "";
        }
        
    }

    public function sendPushNotification($notificationTypeID, $body, $data = [], $overrideTitle = ""){
        $userTokenController = new UserTokenController();
        
        $notificationTypeController = new NotificationTypeController();
        $notificationType = $notificationTypeController->getNotificationTypeByIDHelper($notificationTypeID);

        $usersTokens = $userTokenController->getEnabledExpoTokensByNotificationTypeIDHelper($notificationTypeID);
        
        if(empty($usersTokens) || empty($notificationType)){
            return ;
        }

        $title = $notificationType->title;
        
        if (!empty($overrideTitle) && (strlen($overrideTitle) > 5)){
            $title = $overrideTitle;
        }
        
        $textMessage = $notificationType->text_message;
        $newBody = $body;

        foreach ($usersTokens as $key => $value) {
            
            $exponentPushToken = $value->expo_token;
            
            $status = $this->generatePushNotificationForSingleExponentToken($title, $newBody, $exponentPushToken, $data);
            

        } 
    }

}
