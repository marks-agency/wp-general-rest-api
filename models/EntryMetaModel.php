<?php 

namespace Models;
use WP_Query;

class EntryMetaModel{

  function __construct(){
   
  }

  /*
  *
  */

   public function entriesMetaByFormID($form_id){
     global $wpdb;
     $results = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."oi_markform_entrymeta WHERE ".$wpdb->prefix."oi_markform_entries_id = $form_id ",OBJECT);
     return  $results;
   }


}
