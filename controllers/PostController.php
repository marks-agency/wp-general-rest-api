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
    
    $posts = $this->postModel->post();

    return  rest_ensure_response($posts);

  }

  public function user($request)
  {
    //return rest_ensure_response($result);
    return rest_ensure_response($this->userModel->user());
  }
}
