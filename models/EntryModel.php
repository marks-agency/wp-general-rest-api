<?php 

namespace Models;
use WP_Query;

class EntryModel{

  function __construct(){
   
  }

  /*
  *
  */

   public function entries($offset, $numberOfRecordsPerPage){
     global $wpdb;
     $results = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."oi_markform_entries ORDER BY id DESC LIMIT ".$offset.",".$numberOfRecordsPerPage,OBJECT);
     
     $entries = [];

     foreach($results as $key => $value){
         
          $entry = json_decode(json_encode($value), true);

          $entry["user_data"] =  $this->getUserInfoByID($value->user_id);
          $entry["post"] =  $this->getPostInfoById($value->form_id);

          $entries[] = $entry;

     }

     return  $entries;
   }


   public function postEntryByIdPagination($form_id, $offset, $numberOfRecordsPerPage){

     global $wpdb;
     $results = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."oi_markform_entries  WHERE form_id = $form_id ORDER BY id DESC LIMIT ".$offset.",".$numberOfRecordsPerPage,OBJECT);
     
     $entries = [];

     foreach($results as $key => $value){
         
          $entry = json_decode(json_encode($value), true);

          $entry["user_data"] =  $this->getUserInfoByID($value->user_id);
          $entry["post"] =  $this->getPostInfoById($value->form_id);

          $entries[] = $entry;

     }

     return  $entries;

   }

   private function countNumberOfBreafingByID($ID){
        global $wpdb;
        $result = $wpdb->get_results("SELECT count(*) as ChildCount FROM ".$wpdb->prefix."oi_markform_entries WHERE form_id = $ID ");
        return $result[0]->ChildCount;
   }

   public function paginationInfo($form_id, $numberOfRecordsPerPage = 10){
        
        
        $totalOfRows = $this->countNumberOfBreafingByID($form_id);
        $totalOfPages = ceil($totalOfRows/$numberOfRecordsPerPage);
        //$offset  = ($page - 1) * $numberOfRecordsPerPage;
        
        $result["number_of_records_per_page"] = $numberOfRecordsPerPage;
        $result["total_of_rows"] =  $totalOfRows;
        $result["total_of_pages"] = $totalOfPages;
        
        return $result;
   } 

   public function getPostInfoById($id){
     
     $myPost = wp_get_single_post($id);
     
     if(empty($myPost )){
          return ;
     }

     $postValues = [];
     $postValues['post_title'] = $myPost->post_title;
     $postValues['post_name'] = $myPost->post_name;
     $postValues['post_type'] = $myPost->post_type;

     return $postValues;

   }

   public function getUserInfoByID($id){
     
     if(empty($id)){
        return [] ; 
     }

     $user = get_user_by('ID',$id);
     
     $userInfo  = [];

     $userInfo["user_name"] =  $user->display_name;
     $userInfo["user_email"] =  $user->user_email;
     $userInfo["avatar_url"] =  get_avatar_url($id);

     return  $userInfo;

   }


   public function entryByID($id){
     global $wpdb;
     $results = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."oi_markform_entries  WHERE id = $id ",OBJECT);

     $entries = [];

     foreach($results as $key => $value){
         
          $entry = json_decode(json_encode($value), true);

          $entry["user_data"] =  $this->getUserInfoByID($value->user_id);
          $entry["post"] =  $this->getPostInfoById($value->form_id);

          $entries[] = $entry;

     }
     
     if(empty(!$entries[0])){
          return $entries[0];
     }

     return  $entries;

   }

   public function searchEntryUser($user_info,  $offset, $numberOfRecordsPerPage){

     global $wpdb;
     
     $results = $wpdb->get_results("SELECT mke.id, mke.form_id, mke.user_id, mke.user_ip,  mke.created_at  FROM ".$wpdb->prefix."oi_markform_entries mke INNER JOIN ".$wpdb->prefix."users wpu ON  
     mke.user_id = wpu.id WHERE wpu.user_login LIKE '%$user_info%' OR wpu.user_email LIKE '%$user_info%'  ORDER BY mke.id DESC LIMIT ".$offset.",".$numberOfRecordsPerPage,OBJECT); 
     
     $entries = [];

     foreach($results as $key => $value){
         
          $entry = json_decode(json_encode($value), true);

          $entry["user_data"] =  $this->getUserInfoByID($value->user_id);
          $entry["post"] =  $this->getPostInfoById($value->form_id);

          $entries[] = $entry;

     }

     return  $entries;
   
  }
}
