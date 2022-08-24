<?php 

namespace Routes;
use WP_Error;

use Controllers\UserTokenController;
use Schema\UserSchema;

class UserTokenRoute{

  protected $name; 

  function __construct($name)
  {
    $this->name = $name;
  }

  /*
  *
  */

  function create(){
    
    register_rest_route(
      $this->name, 
      '/user/expo_token',
      array(
        array(
          'methods'  => 'POST',
          'callback' => array(new UserTokenController,'create'),
          'permission_callback' =>  '__return_true',  
        ),
      )
    );

  }

  /*
  *
  */

  function delete(){
    
    register_rest_route(
      $this->name, 
      '/user/expo_token',
      array(
        array(
          'methods'  => "DELETE",
          'callback' => array(new UserTokenController,'delete'),
          'permission_callback' =>  '__return_true',  
        ),
      )
    );

  }

    /*
  *
  */

  function getEnabledExpoTokensByNotificationTypeID(){
    
    register_rest_route(
      $this->name, 
      '/user/expo_token/notification_type_id/(?P<notification_type_id>[0-9]+)',
      array(
        array(
          'methods'  => "GET",
          'callback' => array(new UserTokenController,'getEnabledExpoTokensByNotificationTypeID'),
          'permission_callback' =>  '__return_true',  
        ),
      )
    );

  }

  public function initRoutes(){
    $this->create();
    $this->delete();
    $this->getEnabledExpoTokensByNotificationTypeID(); 
  }

  
}