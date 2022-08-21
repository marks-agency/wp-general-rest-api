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

  public function initRoutes(){
    $this->create();
    $this->delete();
    
  }

  
}