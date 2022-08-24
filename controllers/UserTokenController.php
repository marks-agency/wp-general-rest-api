<?php

namespace Controllers;

use Models\UserTokenModel;

use WP_Error;
class UserTokenController
{
  private $userTokenModel;

  private $JWTPlugin;

  function __construct()
  {
    $this->userTokenModel = new UserTokenModel();
  }

  public function create($request)
  {

    $expo_token = $request['expo_token'];
    $result = $this->userTokenModel->create($expo_token);
    return rest_ensure_response($result);

  }


  public function delete($request)
  {

    $expo_token = $request['expo_token'];
    $result = $this->userTokenModel->delete($expo_token);
    return rest_ensure_response($result);

  }

  public function getEnabledExpoTokensByNotificationTypeID($request){

    $notification_type_id = $request['notification_type_id'];
    $results = $this->getEnabledExpoTokensByNotificationTypeIDHelper($notification_type_id);
    return $results;  

  }


  public function getEnabledExpoTokensByNotificationTypeIDHelper($notification_type_id){

    $results = $this->userTokenModel->getEnabledExpoTokensByNotificationTypeID($notification_type_id);

    return $results;

  }


}
