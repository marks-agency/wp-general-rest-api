<?php 

namespace Routes;
use WP_Error;

use Controllers\NotificationController;
use Schema\PostSchema;

class NotificationRoute{

  protected $name; 

  function __construct($name)
  {
    $this->name = $name;
  }

  /*
  *
  */

  function notificationPagination(){
    
    register_rest_route(
      $this->name, 
      'notification/page/(?P<page_number>[0-9]+)',
      array(
        array(
          'methods'  => 'GET',
          'callback' => array(new NotificationController,'notificationPagination'),
          'permission_callback' =>  '__return_true',  
          'args' => (new PostSchema())->post(),
        ),
      )
    );

  }


  public function initRoutes(){
    $this->notificationPagination();
  }

  
}