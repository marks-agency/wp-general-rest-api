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

  public function postEntryByIdPagination($request){

    $form_id = $request['form_id'];
    $page_number = $request['page_number'];


    $page =  $page_number;
    $numberOfRecordsPerPage = 10;
    $offset  = ($page - 1) * $numberOfRecordsPerPage;

    $entries = $this->entryModel->postEntryByIdPagination($form_id, $offset, $numberOfRecordsPerPage);
    
    if(empty($entries)){
      return  rest_ensure_response([]);
    } 
    
    $paginationInfo = $this->entryModel->paginationInfo($form_id);

    $info = [];
    $info["count"] = $paginationInfo["total_of_rows"];
    $info["pages"] = $paginationInfo["total_of_pages"];

    $results = [];

    $results["info"] = $info;

    $results["results"] = $entries;
    
    return  rest_ensure_response($results);
  }

  public function user($request)
  {
    //return rest_ensure_response($result);
    return rest_ensure_response($this->userModel->user());
  }
}
