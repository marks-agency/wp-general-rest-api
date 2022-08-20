<?php

namespace Controllers;

use Models\EntryModel;

use Plugins\JWT\JWTPlugin;

class EntryController
{
  private $postModel;

  private $JWTPlugin;

  function __construct()
  {
    $this->entryModel = new  EntryModel();
  }

  public function entries($request)
  {
    
    $page = 1;
    $numberOfRecordPerPage = 20;
    $offset  = ($page - 1) * $numberOfRecordPerPage;

    $results = $this->entryModel->entries($offset, $numberOfRecordPerPage);

    return  rest_ensure_response($results);

  }

  public function user($request)
  {
    //return rest_ensure_response($result);
    return rest_ensure_response($this->userModel->user());
  }
}
