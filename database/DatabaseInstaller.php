<?php 

namespace Database;

use Database\UsersTokensTable;
use Database\NotificationTypeTable;

class DatabaseInstaller{

  /*
  *
  */

  public function install(){

    // create notifications tables
    
    (new UsersTokensTable())->createTable();
    (new NotificationTypeTable())->createTable();
    

  }



  
}