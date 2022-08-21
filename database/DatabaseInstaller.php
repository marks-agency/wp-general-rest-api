<?php 

namespace Database;

use Database\UsersTokensTable;
use Database\NotificationTypeTable;
use Database\NotificationSubscriptionTable;


class DatabaseInstaller{

  /*
  *
  */

  public function install(){

    // create notifications tables
    
    (new UsersTokensTable())->createTable();
    (new NotificationTypeTable())->createTable();
    (new NotificationSubscriptionTable())->createTable();
    

  }



  
}