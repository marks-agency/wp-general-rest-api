<?php 

namespace Routes;
use WP_Error;

use Controllers\NotificationTypeController;
use Schema\PostSchema;

class NotificationTypeRoute{

  protected $name; 

  function __construct($name)
  {
    $this->name = $name;
  }

  /*
  *
  */

  function getAll(){
    
    register_rest_route(
      $this->name, 
      'notification/type',
      array(
        array(
          'methods'  => 'GET',
          'callback' => array(new NotificationTypeController,'getAllNotificatioType'),
          'permission_callback' =>  '__return_true',  
        ),
      )
    );

  }

  /*
  *
  */

  function getByID(){
    
    register_rest_route(
      $this->name, 
      'notification/type/(?P<id>[0-9]+)',
      array(
        array(
          'methods'  => 'GET',
          'callback' => array(new NotificationTypeController,'getNotificationTypeByID'),
          'permission_callback' =>  '__return_true',  
        ),
      )
    );

  }


  public function initRoutes(){
    $this->getAll();
    $this->getByID();
  }

  
}