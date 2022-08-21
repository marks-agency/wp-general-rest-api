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

  
   
 

}
