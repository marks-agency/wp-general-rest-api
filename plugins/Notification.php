<?php

namespace Plugins;

use ExpoSDK\Expo;
use ExpoSDK\ExpoMessage;

Expo::addDevicesNotRegisteredHandler(function ($tokens) {
    // this callback is called once and receives an array of unregistered tokens
    //update_option( "opcao_nova_do_claudio", $tokens);
    foreach ($tokens as $key => $value) {
        # code... to delete token in database
    }
});

class Notification
{

    public function testFirstPushNotification(){
        
        $message = (new ExpoMessage([
            'title' => 'initial title',
            'body' => 'initial body',
            'to'  => 'ExponentPushToken[k2DLS2DgStFqCM9ttyCj7j]'
        ]))
        ->setData(['id' => 1])
        ->setChannelId('default')
        ->setBadge(0)
        ->playSound();
        
        //
        //->setTitle('This title overrides initial title')
        //->setBody('This notification body overrides initial body')
        $expo = new Expo();
        $response = $expo->send($message)->push();

        return $response->getData()[0]['status'];
    }
    // 'ExponentPushToken[Rn1y4MFCv8uZ1tMqbcxuKl]'

    // ExponentPushToken[k2DLS2DgStFqCM9ttyCj7j]
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

    }


    /*

    [
        {
            "id": "e8d4d58a-9ae0-45cc-9831-834f56903da0",
            "status": "error",
            "message": "The recipient device is not registered with FCM.",
            "messageEnum": 7,
            "details": {
                "error": "DeviceNotRegistered",
                "errorCodeEnum": 3,
                "fault": "developer"
            }
        }
    ]
    */

    /*
    * Delete token DeviceNotRegistered
    */

}
