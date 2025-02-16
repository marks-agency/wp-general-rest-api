<?php

namespace Plugins\JWT;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Plugins\PublicRoute;

use WP_Error;
use Exception;

class JWTPlugin
{
    //
    const OI_MARK_WP_REST_APY_KEY = 'g7q5UK5I*epzztjs64q5gI^3Km^0iJcz1QCq*%w@knYthghghghg';

    public function generateToken($id)
    {

        $issuedAt = time();
        $expire = $issuedAt + (MINUTE_IN_SECONDS * 777777);

        $payload = array(
            'iss' => get_bloginfo('url'),
            'iat' => $issuedAt,
            'id' => $id,
            'exp' => $expire,
        );

        $jwt = JWT::encode($payload, self::OI_MARK_WP_REST_APY_KEY, 'HS256');

        return $jwt;
    }

    private function validateToken($url, $server, $request)
    {

        $authorization = $request->get_header('authorization');
        $url = strtok($_SERVER["REQUEST_URI"], '?');

        if (!empty($authorization)) {

            $splitAuthorization =  explode(' ', $authorization);

            if (count($splitAuthorization) == 2) {
                try {

                    $jwt = $splitAuthorization[1];
                    $decoded = JWT::decode($jwt, self::OI_MARK_WP_REST_APY_KEY, array("HS256"));
                    //$decoded = JWT::decode($jwt, new Key(self::OI_MARK_WP_REST_APY_KEY, 'HS256'));
                    wp_set_current_user($decoded->id);
                    return $request;
                } catch (Exception $e) {

                    return new WP_Error(
                        'jwt_auth_invalid_token',
                        $e->getMessage(),
                        array(
                            'status' => 403,
                        )
                    );
                }
            } else {
                return new WP_Error(
                    'jwt_auth_invalid_token',
                    'Incorrect JWT format',
                    array(
                        'status' => 403,
                    )
                );
            }
        } else {
            return new WP_Error('not-logged-in', 'API Requests to ' . $url . ' are only supported for authenticated requests', array('status' => 401));
        }
    }

    public function validateTokenRestPreDispatch($url, $server, $request)
    {

        $url = $request->get_route(); //strtok($_SERVER["REQUEST_URI"],'?');
        
        if(strpos($url, 'wp-general-rest-api') !== false){

       
            $publicRoute = new PublicRoute('wp-general-rest-api/v1');

            $requireToken = !$publicRoute->isPublicRoute(substr($url, 1));

            if ($requireToken) {

                $response = $this->validateToken($url, $server, $request);
                if (is_wp_error($response)) {
                    return $response;
                }
            }
        }
    }
}
