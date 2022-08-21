<?php 

namespace Routes;
use WP_Error;

use Controllers\NotificationSubscriptionController;
use Schema\UserSchema;

class NotificationSubscriptionRoute{

  protected $name; 

  function __construct($name)
  {
    $this->name = $name;
  }

  /*
  *
  */

  function subscribe(){
    
    register_rest_route(
      $this->name, 
      '/notification/subscribe/user',
      array(
        array(
          'methods'  => 'POST',
          'callback' => array(new NotificationSubscriptionController,'subscribe'),
          'permission_callback' =>  '__return_true',  
        ),
      )
    );

  }

  /*
  *
  */



  public function initRoutes(){
    $this->subscribe();
  }

  
}