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
        ),
      )
    );

  }

  /*
  *
  */

  function notificationCreate(){
    
    register_rest_route(
      $this->name, 
      'notification',
      array(
        array(
          'methods'  => 'POST',
          'callback' => array(new NotificationController,'createNotification'),
          'permission_callback' =>  '__return_true',  
          //'args' => (new PostSchema())->post(),
        ),
      )
    );

  }

  /*
  *
  */

  function notificationOrder(){
    
    register_rest_route(
      $this->name, 
      'notification/order/(?P<order_id>[0-9]+)',
      array(
        array(
          'methods'  => 'GET',
          'callback' => array(new NotificationController,'notificationOrder'),
          'permission_callback' =>  '__return_true',  
          //'args' => (new PostSchema())->post(),
        ),
      )
    );

  }


  function notificationSite(){
    
    register_rest_route(
      $this->name, 
      'notification/site/(?P<site_id>[0-9]+)',
      array(
        array(
          'methods'  => 'GET',
          'callback' => array(new NotificationController,'notificationSite'),
          'permission_callback' =>  '__return_true',  
          //'args' => (new PostSchema())->post(),
        ),
      )
    );

  }


  public function initRoutes(){
    $this->notificationPagination();
    $this->notificationCreate();
    $this->notificationOrder();
    $this->notificationSite();
    
  }

  
}