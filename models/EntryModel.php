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
     $results = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."oi_markform_entries ORDER BY created_at DESC LIMIT ".$offset.",".$numberOfRecordsPerPage,OBJECT);
     
     $entries = []
     foreach($oi_mark_api_array_result as $key => $value){

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
}
