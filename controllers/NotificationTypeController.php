<?php

namespace Controllers;

use Models\NotificationTypeModel;

use WP_Error;
class NotificationTypeController
{
  private $userTokenModel;

  private $JWTPlugin;

  function __construct()
  {
    $this->notificationTypeModel = new NotificationTypeModel();
  }

  public function  getAllNotificatioType()
  {
    $results = $this->notificationTypeModel->getAllNotificatioType();
    return rest_ensure_response($results);
  }

  public function getNotificationTypeByID($request){

    $ID = $request["id"];

    $result = $this->getNotificationTypeByIDHelper($ID);
    
    return rest_ensure_response($result);


  }

  public function getNotificationTypeByIDHelper($ID){

    $result = $this->notificationTypeModel->getNotificationTypeByID($ID);
    
    return $result;

  }





}
