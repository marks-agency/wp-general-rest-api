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
      '/notification/subscription',
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

  function fetchSubscription(){
    
    register_rest_route(
      $this->name, 
      '/notification/subscription',
      array(
        array(
          'methods'  => 'GET',
          'callback' => array(new NotificationSubscriptionController,'fetchSubscription'),
          'permission_callback' =>  '__return_true',  
        ),
      )
    );

  }

  /*
  *
  */

  function unsubscribe(){
    
    register_rest_route(
      $this->name, 
      '/notification/subscription',
      array(
        array(
          'methods'  => 'DELETE',
          'callback' => array(new NotificationSubscriptionController,'unsubscribe'),
          'permission_callback' =>  '__return_true',  
        ),
      )
    );

  }


  /*
  *
  */

  function updateEnabledState(){
    
    register_rest_route(
      $this->name, 
      '/notification/subscription/(?P<notification_subscription_id>[0-9]+)/enabled',
      array(
        array(
          'methods'  => 'PUT',
          'callback' => array(new NotificationSubscriptionController,'updateEnabledState'),
          'permission_callback' =>  '__return_true',  
        ),
      )
    );

  }


  public function initRoutes(){
   
    $this->subscribe();
    $this->fetchSubscription();
    $this->unsubscribe();
    $this->updateEnabledState();

  }

  
}