<?php 

namespace Schema;



class PostSchema{

  /*
  *
  */
 
  function posts(){
    
    $schema = array(

      /*'username'=>array(
        'required'    => true,
        'type'        => 'string',
        'validate_callback'=> function($value, $request, $key) {
          return true;
        }
      ),

      'password'=>array(
        'required'    => true,
        'type'        => 'string',
      ) */

    );

    return  $schema;

  }



  
}