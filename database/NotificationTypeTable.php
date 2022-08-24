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
        title VARCHAR(500) NOT NULL,
        text_message VARCHAR(500) NOT NULL,
        PRIMARY KEY(id),
        UNIQUE(type)
    )".$wpdb->get_charset_collate();  

    dbDelta($sql);

    $this->insertDefaultValues();

  }


  public function insertDefaultValues(){
    global $wpdb;
        
    $values = $this->getDefauleValues();

    foreach ($values as $key => $value) {
      $wpdb->insert(
        $wpdb->prefix."oi_markform_notification_type",
        $value
      );
    }
    
  }


  public function getDefauleValues(){
    $values = array(
      [
        "type"=>"breafing_filled",
        "title"=>"Briefing preenchido",
        "text_message" =>"preencheu o briefing"
      ],
      [
        "type"=>"woocommerce_order",
        "title"=>"Pedido feito",
        "text_message" =>"comprou"
      ],
      [
        "type"=>"deactivate_site",
        "title"=>"Desativação de site",
        "text_message" =>"o site da foi desativado"
      ]
    );

    return  $values;
  }



  
}