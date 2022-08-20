<?php 

namespace Database;

use Database\UsersTokensTable;

class DatabaseInstaller{

  /*
  *
  */

  public function install(){
    // create users tokens table
    (new UsersTokensTable())->createTable();

  }



  
}