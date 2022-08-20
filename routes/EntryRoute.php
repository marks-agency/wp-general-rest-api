<?php 

namespace Routes;
use WP_Error;

use Controllers\EntryController;
use Schema\PostSchema;

class EntryRoute{

  protected $name; 

  function __construct($name)
  {
    $this->name = $name;
  }

  /*
  *
  */

  function postEntry(){
    
    register_rest_route(
      $this->name, 
      '/entries',
      array(
        array(
          'methods'  => 'GET',
          'callback' => array(new EntryController,'entries'),
          'permission_callback' =>  '__return_true',  
          'args' => (new PostSchema())->post(),
        ),
      )
    );

  }


  public function initRoutes(){
    $this->postEntry();
  }

  
}