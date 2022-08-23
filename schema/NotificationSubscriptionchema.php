<?php 

namespace Schema;



class NotificationSubscriptionchema{

  /*
  *
  */
 
  function updateEnabledState(){
    
    $schema = array(

      'enabled'=>array(
        'required'    => true,
        'type'        => 'integer',
        'validate_callback'=> function($value, $request, $key) {
          if((0 ===  $value) || (1 ===  $value)){
            return true;
          } 
          return false;
        }
      ),


    );

    return  $schema;

  }



  
}