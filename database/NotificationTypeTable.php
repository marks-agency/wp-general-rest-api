<?php 

namespace Database;

class NotificationTypeTable{

  /*
  *
  */

  public function createTable(){

    require_once(ABSPATH.'wp-admin/includes/upgrade.php');
    global $wpdb;

    // criando a primeira tabela
    
    $sql = "CREATE TABLE IF NOT EXISTS ".$wpdb->prefix."oi_markform_notification_type(
        id BIGINT(20) NOT NULL AUTO_INCREMENT,
        type VARCHAR(300) NOT NULL,
        text_message VARCHAR(500) NOT NULL,
        PRIMARY KEY(id),
        UNIQUE(type)
    )".$wpdb->get_charset_collate();  

    dbDelta($sql);

  }



  
}