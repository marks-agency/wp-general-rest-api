<?php 

namespace Routes;
use WP_Error;

use Controllers\PostController;
use Schema\PostSchema;

class PostRoute{

  protected $name; 

  function __construct($name)
  {
    $this->name = $name;
  }

  /*
  *
  */

  function posts(){
    
    register_rest_route(
      $this->name, 
      '/user/login',
      array(
        array(
          'methods'  => 'POST',
          'callback' => array(new UserController,'login'),
          'permission_callback' =>  '__return_true',  
          'args' => (new PostSchema())->login(),
        ),
  
      )
    );

  }


  public function initRoutes(){
    $this->posts();
  }

  
}