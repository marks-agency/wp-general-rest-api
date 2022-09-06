<?php

namespace Controllers;

use Models\NotificationModel;

use WP_Error;
class NotificationController
{
  private $userTokenModel;

  private $JWTPlugin;

  function __construct()
  {
    $this->notification = new NotificationModel();
  }

  public function notificationPagination($request)
  {
    $page_number = $request['page_number'];
    $numberNotification = $this->notification->countNumberNotification();

    $page =  $page_number;
    $numberOfRecordsPerPage = 10;
    $offset  = ($page - 1) * $numberOfRecordsPerPage;

    $notifications = $this->notification->notificationPagination($offset, $numberOfRecordsPerPage);
    
    $info = [];
    $info["count"] = $numberNotification;
    $info["pages"] = ceil($numberNotification/$numberOfRecordsPerPage);
    
    $results = [];

    $results["info"] = $info;

    $results["results"] = $notifications;

    return rest_ensure_response($results);
    
  }

  public function createNotification($request){
    
    $user_id = $request["user_id"];
    $notification_type_id = $request["notification_type_id"];
    $meta_value = $request["meta_value"];

    
    $result = $this->notification->createNotification($notification_type_id, $meta_value, $user_id);

    return rest_ensure_response($result);
    
  }







}
