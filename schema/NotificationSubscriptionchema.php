<?php 

namespace Schema;
use ExpoSDK\Expo;


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

  function subscription(){
    
    $schema = array(

      'expo_token'=>array(
        'required'    => true,
        'type'        => 'string',
        'validate_callback'=> function($value, $request, $key) {
  
          return (new Expo)->isExpoPushToken($value);

        }
      ),


    );

    return  $schema;

  }


  private function checkIfIsExpoToken($value){
    
    $results = explode("ExponentPushToken", $value);
    
    if(count($results) !== 2){
      return false;
    }
    
    $expoToken = $results[1];

    if( $expoToken[0] !== '['){
      return false;
    }

    $lastPosition = strlen($expoToken);

    if( $expoToken[$lastPosition - 1] !== ']'){
      return false;
    }

    return true;
  }

  
}