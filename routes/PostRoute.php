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

  function post(){
    
    register_rest_route(
      $this->name, 
      '/post',
      array(
        array(
          'methods'  => 'GET',
          'callback' => array(new PostController,'post'),
          'permission_callback' =>  '__return_true',  
          'args' => (new PostSchema())->post(),
        ),
  
      )
    );

  }


  public function initRoutes(){
    $this->post();
  }

  
}