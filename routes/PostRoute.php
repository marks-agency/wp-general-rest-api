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
      '/posts',
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

  function postPagination(){
    
    register_rest_route(
      $this->name, 
      '/posts/page/(?P<page_number>[0-9]+)',
      array(
        array(
          'methods'  => 'GET',
          'callback' => array(new PostController,'postPagination'),
          'permission_callback' =>  '__return_true',  
          'args' => (new PostSchema())->post(),
        ),
  
      )
    );

  }

  function getSinglePost(){
    
    register_rest_route(
      $this->name, 
      '/posts/(?P<post_id>[0-9]+)',
      array(
        array(
          'methods'  => 'GET',
          'callback' => array(new PostController,'singlePost'),
          'permission_callback' =>  '__return_true',  
          'args' => (new PostSchema())->post(),
        ),
  
      )
    );

  }


  function searchPost(){
    
    register_rest_route(
      $this->name, 
      '/posts/search/(?P<post_name>\S+)',
      array(
        array(
          'methods'  => 'GET',
          'callback' => array(new PostController,'searchPost'),
          'permission_callback' =>  '__return_true',  
          'args' => (new PostSchema())->post(),
        ),
  
      )
    );

  }


  public function initRoutes(){
    $this->post();
    $this->postPagination();
    $this->getSinglePost();
    $this->searchPost();
  }

  
}