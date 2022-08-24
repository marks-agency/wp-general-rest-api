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

    $page =  $page_number;
    $numberOfRecordsPerPage = 10;
    $offset  = ($page - 1) * $numberOfRecordsPerPage;

    $result = $this->notification->notificationPagination($offset, $numberOfRecordsPerPage);
    
    return rest_ensure_response($result);
  }





}
