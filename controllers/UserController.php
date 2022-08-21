<?php

namespace Controllers;

use Models\UserModel;

use Plugins\JWT\JWTPlugin;

use WP_Error;
class UserController
{
  private $userModel;

  private $JWTPlugin;

  function __construct()
  {
    $this->userModel = new UserModel();
    $this->JWTPlugin = new JWTPlugin();
  }

  public function login($request)
  {

    $username = $request['username'];
    $password = $request['password'];

    $user = $this->userModel->login($username, $password);

    // retorna o erro se usuario não conseguir logar
    if (is_wp_error($user)) {
      return rest_ensure_response($user);
    }

    $userData = get_userdata( $user->ID);

    if ( !in_array( 'administrator',$userData->roles, true ) ) {
      // Do something.
      return new WP_Error( 'rest_forbidden', esc_html__( 'OMG you can not view private data.', 'my-text-domain' ), array( 'status' => 401 ) );
    }

    $token = $this->JWTPlugin->generateToken($user->data->ID);

    $data = array(
      'token' => $token,
      'id' => $user->data->ID,
      'user_email' => $user->data->user_email,
      'user_nicename' => $user->data->user_nicename,
      'user_display_name' => $user->data->display_name
    );

    //return rest_ensure_response($result);
    return rest_ensure_response($data);
  }

  public function userMe($request)
  {
    //return rest_ensure_response($result);
    return rest_ensure_response($this->userModel->userMe());
  }
}
