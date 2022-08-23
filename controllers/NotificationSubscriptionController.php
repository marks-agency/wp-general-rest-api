<?php

namespace Controllers;

use Models\NotificationSubscriptionModel;

use Models\UserTokenModel;


use WP_Error;
class NotificationSubscriptionController
{
  private $userTokenModel;

  private $JWTPlugin;

  function __construct()
  {
    $this->notificationSubscriptionModel = new NotificationSubscriptionModel();
  }

  public function subscribeToAllPushNotifications($expo_token)
  {
    $result = $this->notificationSubscriptionModel->subscribeToAllPushNotifications($expo_token);
    
    return rest_ensure_response($result);

  }

  public function subscribe($request)
  {

    $expo_token = $request["expo_token"];

    $result = $this->subscribeToAllPushNotifications($expo_token);

    return rest_ensure_response($result);
    

  }

  public function fetchSubscription($request){
    
    $expo_token = $request["expo_token"];


    $userTokenId = (new UserTokenModel())->getUserTokenIdByExpoToken($expo_token);

    if(empty($userTokenId)){
      return rest_ensure_response([]);
    }

    $results = $this->notificationSubscriptionModel->getSubscriptionByUserTokenId($userTokenId);

    return rest_ensure_response($results);
  }

  public function unsubscribe($request){
    
    $expo_token = $request["expo_token"];


    $userTokenId = (new UserTokenModel())->getUserTokenIdByExpoToken($expo_token);

    if(empty($userTokenId)){
      return rest_ensure_response([]);
    }

    $results = $this->notificationSubscriptionModel->unsubscribeByUserTokenId($userTokenId);

    return rest_ensure_response($results);
  }


  public function updateEnabledState($request){
    
    $notificationSubscriptionID = intval($request["notification_subscription_id"]);
    $enabled = $request["enabled"];

    $value = true;

    if ($enabled === 0 ) {
      $value = false ;
    } 
    
    $results = $this->notificationSubscriptionModel->updateEnabledState($notificationSubscriptionID, $value);

    return rest_ensure_response($results);
    
  }


  
 


}
