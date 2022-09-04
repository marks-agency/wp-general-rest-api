<?php 

namespace Routes;
use WP_Error;

use Controllers\EntryMetaController;
use Schema\PostSchema;

class EntryMetaRoute{

  protected $name; 

  function __construct($name)
  {
    $this->name = $name;
  }

  /*
  *
  */

  function entryMetaByEntryID(){
    
    register_rest_route(
      $this->name, 
      '/entrymeta/mark_form_id/(?P<form_id>[0-9]+)',
      array(
        array(
          'methods'  => 'GET',
          'callback' => array(new EntryMetaController,'entryMetaByEntryID'),
          'permission_callback' =>  '__return_true',  
          'args' => (new PostSchema())->post(),
        ),
      )
    );

  }


  /*
  *
  */
  function searchEntryMetaAnswer(){
    
    register_rest_route(
      $this->name, 
      '/entrymeta/search/(?P<answer>\S+)',
      array(
        array(
          'methods'  => 'GET',
          'callback' => array(new EntryMetaController,'searchEntryMetaAnswer'),
          'permission_callback' =>  '__return_true',  
          'args' => (new PostSchema())->post(),
        ),
  
      )
    );

  }

  public function initRoutes(){
    $this->entryMetaByEntryID();
    $this->searchEntryMetaAnswer();
  }

  
}