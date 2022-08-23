<?php 

namespace Models;
use WP_Query;

use Models\NotificationTypeModel;
use Models\UserTokenModel;

class NotificationSubscriptionModel{

  function __construct(){
   
  }

  /*
  *
  */

   public function subscribeToAllPushNotifications($expo_token){
    
        global $wpdb;


        $userTokenID = (new UserTokenModel())->getUserTokenIdByExpoToken($expo_token);

        if (empty($userTokenID)){
                return false;
        }
        
        $user = wp_get_current_user();

        $allnotificationType = (new NotificationTypeModel())->getAllNotificatioType();

        $controll = true;
        
        foreach ( $allnotificationType as $key => $value) {
                
                $item = [];
                
                $item["user_token_id"] = $userTokenID;
                $item["notification_type_id"] = $value->id;
                $item["enabled"] = true;

                $reusult  = $wpdb->insert(
                        $wpdb->prefix."oi_markform_notification_subscription",
                        $item
                      );

                if (!$reusult){
                        $controll  = false;
                }

        }
        

        return  $controll;
  
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

  
  /*
  *
  */

  public function getSubscriptionByUserTokenId($userTokenID){
        global $wpdb;

        $results = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."oi_markform_notification_subscription WHERE user_token_id = $userTokenID ", OBJECT);
        
        return  $results;

  }


  /*
  *
  */
  
  public function unsubscribeByUserTokenId($userTokenID){
        global $wpdb;
        
        $results = $wpdb->get_results("DELETE FROM ".$wpdb->prefix."oi_markform_notification_subscription WHERE user_token_id = $userTokenID ", OBJECT);
        
        return  $results;

  }

  
 
  public function updateEnabledState($notificationSubscriptionID, $value){
        
        global $wpdb;
        
        $item = [
                "enabled" =>  $value
        ];

        $results = $wpdb->update(
                $wpdb->prefix."oi_markform_notification_subscription",
                $item,
                ["id"=> $notificationSubscriptionID] 
        );

        return  $results;

  }

}
