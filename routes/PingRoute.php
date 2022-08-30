<?php 

namespace Routes;

use Plugins\NotificationPlugin ;

use WP_Error;

class PingRoute{

  protected $name; 

  function __construct($name)
  {
    $this->name = $name;
  }

  /*
  *
  */

   function ping(){
    
    register_rest_route(
      $this->name, 
      '/ping',
      array(
        array(
          'methods'  => 'GET',
          'callback' => array( $this,'pingFunc'),
          'permission_callback' => '__return_true'
          ),
      )
    );

  }

  /*
  *
  */


  public function pingFunc(){
    $notification = new NotificationPlugin();
    $retsult = "ok";
    //$retsult = $notification->testFirstPushNotification();
    //do_action('oi_mark_deactive_site', 2, 121);
    
    /*switch_to_blog(2);
      $site_title = get_bloginfo("admin_email");

    restore_current_blog();*/

    return rest_ensure_response(array(
        /*'ping'=> get_the_title(121),
        'pong' => get_post_type( 121 ),
        'bog' =>  $site_title*/
        'ping' => "pong"
      ));


  }

  public function initRoutes(){
    $this->ping();
  }

  
}