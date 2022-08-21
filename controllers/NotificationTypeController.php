<?php

namespace Controllers;

use Models\NotificationSubscriptionModel;

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





}
