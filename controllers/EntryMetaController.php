<?php

namespace Controllers;

use Models\EntryMetaModel;

use Plugins\JWT\JWTPlugin;

class EntryMetaController
{
  private $postModel;

  private $JWTPlugin;

  function __construct()
  {
    $this->entryMetaModel = new  EntryMetaModel();
  }

  public function entryMetaByEntryID($request)
  {
    
    $form_id = $request['form_id'];

    $results = $this->entryMetaModel->entriesMetaByFormID($form_id);

    return  rest_ensure_response($results);

  }

}
