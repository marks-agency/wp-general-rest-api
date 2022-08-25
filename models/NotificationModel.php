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
        
        $newResults = [];
        
        foreach ($results as $key => $value) {
          
          $newData = $value;
          $newData->meta_value = maybe_unserialize( $value->meta_value );
          $newResults[] =  $newData ;
        
          }
        
          return  $results;
  
   }

   public function countNumberNotification(){
        global $wpdb;
        $result = $wpdb->get_results("SELECT count(*) as ChildCount FROM ".$wpdb->prefix."oi_markform_notification ");
        return $result[0]->ChildCount;
   }

   public function createNotification($notification_type_id, $meta_value, $user_id = null){
     
     global $wpdb; 
     
     $item = array(
          "user_id" => $user_id,
          "notification_type_id" => $notification_type_id,
          "meta_value" =>  maybe_serialize( $meta_value ),
          "created_at" =>  date("Y-m-d H:i:s")
     );
     
     $results = $wpdb->insert(
          $wpdb->prefix."oi_markform_notification_type",
          $item
     );

     return $results;

   }

 
}
