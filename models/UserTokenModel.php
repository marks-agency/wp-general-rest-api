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

  
   
 

}
