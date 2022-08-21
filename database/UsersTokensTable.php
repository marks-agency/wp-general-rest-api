<?php 

namespace Database;

class UsersTokensTable{

  /*
  *
  */

  public function createTable(){

    require_once(ABSPATH.'wp-admin/includes/upgrade.php');
    global $wpdb;

    // criando a primeira tabela


    $sql = "CREATE TABLE IF NOT EXISTS ".$wpdb->prefix."oi_markform_users_tokens (
        id BIGINT(20) NOT NULL AUTO_INCREMENT,
        user_id BIGINT(20)  UNSIGNED NOT NULL,
        expo_token VARCHAR(100) NOT NULL,
        PRIMARY KEY(id),
        FOREIGN KEY(user_id) REFERENCES ".$wpdb->prefix."users(ID),
        UNIQUE(expo_token)
      )".$wpdb->get_charset_collate();
   
   
       dbDelta($sql);

    }



  
}