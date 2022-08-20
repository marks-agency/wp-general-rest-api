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

   private function countNumberOfBreafingByID($ID){
        global $wpdb;
        $result = $wpdb->get_results("SELECT count(*) as ChildCount FROM ".$wpdb->prefix."oi_markform_entries WHERE form_id = $ID ");
        return $result[0]->ChildCount;
   }

   public function paginationInfo(){
        
        $numberOfRecordsPerPage = 10;
        $totalOfRows = wp_count_posts('markform')->publish;
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

     return  $userInfo;

   }

}
