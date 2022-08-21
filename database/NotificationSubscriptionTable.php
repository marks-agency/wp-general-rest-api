<?php 

namespace Database;

class NotificationSubscriptionTable{

  /*
  *
  */

  public function createTable(){

    require_once(ABSPATH.'wp-admin/includes/upgrade.php');
    global $wpdb;

    // criando a primeira tabela
    
    $sql = "CREATE TABLE IF NOT EXISTS ".$wpdb->prefix."oi_markform_notification_subscription(
        id BIGINT(20) NOT NULL AUTO_INCREMENT,
        user_token_id  BIGINT(20)  NOT NULL,
        notification_type_id BIGINT(20)  NOT NULL,
        enabled BOOLEAN, 
        PRIMARY KEY(id),
        FOREIGN KEY(user_token_id) REFERENCES ".$wpdb->prefix."oi_markform_users_tokens(id),
        FOREIGN KEY(notification_type_id) REFERENCES ".$wpdb->prefix."oi_markform_notification_type(id), 
        UNIQUE(user_token_id, notification_type_id) 
    )".$wpdb->get_charset_collate();  

    dbDelta($sql);

  }



  
}