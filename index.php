<?php

require __DIR__ . '/vendor/autoload.php';

/**
* Plugin Name:       WP General Rest API
* Plugin URI:        https://example.com/plugins/the-basics/
* Description:       Este é um plugin que gera as rotas para obter os dados do site wordpress, permitindo requisições autencticadas usando jwt
* Version:           1.0.0
* Requires at least: 5.2
* Requires PHP:      7.2
* Author:            claudionhangapc
* Author URI:        https://author.example.com/
* License:           GPL v2 or later
* License URI:       https://claudionhangapc/gpl-2.0.html
* Update URI:        https://oimark.com.br/
* Text Domain:       https://oimark.com.br/
*/

define('MARKFORM_PLUGIN_URL_REST_API', __FILE__);


// 
use Routes\UserRoute;
use Routes\PostRoute;
use Routes\PingRoute;
use Routes\EntryRoute;
use Routes\EntryMetaRoute;
use Routes\UserTokenRoute;
use Routes\NotificationRoute;
use Routes\NotificationSubscriptionRoute;
use Plugins\JWT\JWTPlugin;


// DataBase
use Database\DatabaseInstaller;


// call all route

function wp_general_rest_api_init(){
  // definindo a name-space
  $name_space = "wp-general-rest-api/v1";

  // init all route 
  (new UserRoute($name_space))->initRoutes();
  (new PingRoute($name_space))->initRoutes();
  (new PostRoute($name_space))->initRoutes();
  (new EntryRoute($name_space))->initRoutes();
  (new EntryMetaRoute($name_space))->initRoutes();
  (new UserTokenRoute($name_space))->initRoutes();
  (new NotificationRoute($name_space))->initRoutes();
  (new NotificationSubscriptionRoute($name_space))->initRoutes();

  

  // pre hendler
  add_filter('rest_pre_dispatch',[new JWTPlugin,'validateTokenRestPreDispatch'],10,3);

}


// create table on install plugin
function wp_general_rest_api_installer(){
  
  (new DatabaseInstaller())->install();

}

function oi_mark_api_rest_pre_dispatchi($url, $server, $request){}


// Hooks 
register_activation_hook(MARKFORM_PLUGIN_URL_REST_API, 'wp_general_rest_api_installer');
add_action('rest_api_init','wp_general_rest_api_init');
