<?php 

namespace Models;
use WP_Query;

class UserModel{

  function __construct(){
   
  }

  /*
  *
  */

   public function login($username, $password){
    
        $login  = wp_signon(array(
                'user_login'=>$username,
                'user_password'=>$password
        ));

        return $login;
    
   }

   public function userMe(){
    
        $user = wp_get_current_user();

        $userData = get_userdata( $user->ID);

        $userNumberOfPosts = $this->getNumberOfPostPerUserFromCurrentUser($user->ID);

        $userAvatarUrl = get_avatar_url($user->ID);

        //$editable_roles = get_editable_roles();
        //wp_roles()->get_names()

        return array(
                'id'   => $user->ID,
                'email'  => $user->data->user_email,
                'display_name'  => $user->data->display_name,
                'first_name' =>$user->user_firstname,
                'last_name' =>$user->user_lastname,
                'user_login' => $user->data->user_login,
                'user_registered' =>  $user->data->user_registered,
                'avatar_url' =>$userAvatarUrl,
                'user_roles' =>  $userData->roles, 
                'number_of_posts'  => $userNumberOfPosts
                
        );
    
   }


   private function getNumberOfPostPerUserFromCurrentUser($ID){
        $args =  array(
                'post_type'     => 'markform',
                'author'        => $ID,
                'post_status'   => array( 'publish' ),
                'posts_per_page' => -1
        );

        $currentUserPosts = get_posts( $args );
        $total = count($currentUserPosts);

        return $total;
   }
   
 

}
