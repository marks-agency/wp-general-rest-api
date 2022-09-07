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
          $unserializeValue = maybe_unserialize( $value->meta_value );
          $unserializeValue["avatar_url"] = get_avatar_url($value->user_id);
          $newData->meta_value = $unserializeValue ; 
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
          $wpdb->prefix."oi_markform_notification",
          $item
     );

     return $results;

   }

   public function notificationOrder($order_id){

     $order = \wc_get_order( $order_id );

     $order_info = [];
     
     if ( empty ( $order )){
          return $order_info;
     }
     
     $order_info["order_id"] =  $order_id;
     $order_info["billing_email"] =  $order->get_billing_email();
     $order_info["customer_name"] =  $order->get_billing_first_name().' '.$order->get_billing_last_name();
     $order_info["billing_address"] =  $order->get_billing_address_1();
     $order_info["billing_phone"] =  $order->get_billing_phone();
     $order_info["order_status"] =  $order->get_status();
     $order_info["payment_title"] =  $order->get_payment_method_title();
     $order_info["date_created"] =  $order->get_date_created();
     
     return $order_info;

   }

 
}
