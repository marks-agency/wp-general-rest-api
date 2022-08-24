<?php 

namespace Models;
use WP_Query;

class UserTokenModel{

  function __construct(){
   
  }

  /*
  *
  */

   public function create($expo_token){
    
        global $wpdb;
        
        $user = wp_get_current_user();
        
        $lastItem = array(
                "user_id" =>$user->ID,
                "expo_token" => $expo_token
                ) ;

        $results = $wpdb->insert(
                $wpdb->prefix."oi_markform_users_tokens",
                $lastItem
        );

        return  $results;
  
   }

   /*
  *
  */

  public function delete($expo_token){
    
        global $wpdb;
        
        $user = wp_get_current_user();
        
        $item = array(
                "user_id" =>$user->ID,
                "expo_token" => $expo_token
                ) ;

        $results = $wpdb->delete(
                $wpdb->prefix."oi_markform_users_tokens",
                $item 
        );

        return  $results;
  
   }


   public function getUserTokenIdByExpoToken($expo_token){

        global $wpdb;
        
        $user = wp_get_current_user();

        $result = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."oi_markform_users_tokens WHERE user_id = $user->ID AND expo_token = '$expo_token' ", OBJECT);
        
        if(empty($result)){

          return 0;

        }

        return $result[0]->id;

   }


   public function getEnabledExpoTokensByNotificationTypeID($notification_type_id){
        

        global $wpdb;
        
        $results = $wpdb->get_results("SELECT expo_token FROM ".$wpdb->prefix."oi_markform_users_tokens mk_u_t INNER JOIN ".$wpdb->prefix."oi_markform_notification_subscription  mk_n_s ON 
        mk_u_t.id = mk_n_s.user_token_id AND mk_n_s.enabled = 1 WHERE mk_n_s.notification_type_id = $notification_type_id
        ",OBJECT);
        
        return  $results;
  

   }

  
   
 

}
