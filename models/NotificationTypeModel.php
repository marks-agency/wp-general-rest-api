<?php 

namespace Models;
use WP_Query;

class NotificationTypeModel{

  function __construct(){
   
  }

  /*
  *
  */

   public function getAllNotificatioType(){
    
        global $wpdb;

        $result = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."oi_markform_notification_type", OBJECT);
        
        return $result;

   }

   /*
  *
  */

  

  
   
 

}
