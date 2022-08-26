<?php

namespace Controllers;

use Models\PostModel;

use Plugins\JWT\JWTPlugin;

class PostController
{
  private $postModel;

  private $JWTPlugin;

  function __construct()
  {
    $this->postModel = new PostModel();
  }

  public function post($request)
  {
    $page = 1;

    $paginationInfo = $this->postModel->paginationInfo();
    //;

    $offset  = ($page - 1) *  $paginationInfo["number_of_records_per_page"];

    $posts = $this->postModel->post($offset, $paginationInfo["number_of_records_per_page"]);


    $info = [];
    $info["count"] = $paginationInfo["total_of_rows"];
    $info["pages"] = $paginationInfo["total_of_pages"];

    $results = [];

    $results["info"] = $info;

    $results["results"] =  $posts;

    return  rest_ensure_response($results);

  }

  public function postPagination($request){
    
    $page = $request['page_number'];

    $paginationInfo = $this->postModel->paginationInfo();
    //;

    $offset  = ($page - 1) *  $paginationInfo["number_of_records_per_page"];

    $posts = $this->postModel->post($offset, $paginationInfo["number_of_records_per_page"]);


    $info = [];
    $info["count"] = $paginationInfo["total_of_rows"];
    $info["pages"] = $paginationInfo["total_of_pages"];

    $results = [];

    $results["info"] = $info;

    $results["results"] =  $posts;

    return  rest_ensure_response($results);

  }

  public function user($request)
  {
    //return rest_ensure_response($result);
    return rest_ensure_response($this->userModel->user());
  }

  /*
  *
  */
  public function singlePost($request){
    
    $post_id = $request['post_id'];
    $result = $this->postModel->getPostByID($post_id);
    return  rest_ensure_response($result);

  }

}
