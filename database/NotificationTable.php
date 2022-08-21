<?php 

namespace Database;

class NotificationTable{

  /*
  *
  */

  public function createTable(){

    require_once(ABSPATH.'wp-admin/includes/upgrade.php');
    global $wpdb;

    // criando a primeira tabela
    
    $sql = "CREATE TABLE IF NOT EXISTS ".$wpdb->prefix."oi_markform_notification(
        id BIGINT(20) NOT NULL AUTO_INCREMENT,
        meta_value LONGTEXT NOT NULL,
        created_at DATETIME NOT NULL,
        user_id BIGINT(20),
        notification_type_id BIGINT(20)  NOT NULL,
        PRIMARY KEY(id),
        FOREIGN KEY(notification_type_id) REFERENCES ".$wpdb->prefix."oi_markform_notification_type(id) 
    )".$wpdb->get_charset_collate();  

    dbDelta($sql);

  }



  
}