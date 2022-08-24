<?php 

namespace Models;
use WP_Query;

use Models\NotificationTypeModel;
use Models\UserTokenModel;

class NotificationModel{

  function __construct(){
   
  }

  /*
  *
  */

   public function notificationPagination($offset, $numberOfRecordsPerPage){
    
        global $wpdb;
        
        $results = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."oi_markform_notification mkn LEFT JOIN ".$wpdb->prefix."oi_markform_notification_type  mknt ON mkn.notification_type_id = mknt.id
        "." ORDER BY mkn.id  DESC  LIMIT ".$offset.",".$numberOfRecordsPerPage,OBJECT);
        
        return  $results;
  
   }

   public function countNumberNotification(){
        global $wpdb;
        $result = $wpdb->get_results("SELECT count(*) as ChildCount FROM ".$wpdb->prefix."oi_markform_notification ");
        return $result[0]->ChildCount;
   }

 
}
