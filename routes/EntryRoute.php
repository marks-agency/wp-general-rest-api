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


  function entryByID(){
    
    register_rest_route(
      $this->name, 
      '/entries/(?P<entry_id>[0-9]+)',
      array(
        array(
          'methods'  => 'GET',
          'callback' => array(new EntryController,'entryByID'),
          'permission_callback' =>  '__return_true',  
          'args' => (new PostSchema())->post(),
        ),
      )
    );

  }

  function postEntryByIdPagination(){
    
    register_rest_route(
      $this->name, 
      'posts/(?P<form_id>[0-9]+)/entries/page/(?P<page_number>[0-9]+)',
      array(
        array(
          'methods'  => 'GET',
          'callback' => array(new EntryController,'postEntryByIdPagination'),
          'permission_callback' =>  '__return_true',  
          'args' => (new PostSchema())->post(),
        ),
      )
    );

  }


  public function initRoutes(){
    $this->postEntry();
    $this->entryByID();
    $this->postEntryByIdPagination();
  }

  
}