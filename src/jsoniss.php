<?php

include_once("Messages.php");
require_once("../vendor/autoload.php");

use \Firebase\JWT\JWT;
class TokenIssuer {
    private $secret = "After the game, the pawns and kings...";
    private static $instance = null;

    private function __construct(){
        $this->secret = "After the game, the pawns and kings...";
        
        #177 * (time() % ((int)date("YYYYMMDD")));
    }

    public static function getInstance(){
        if (self::$instance == null ){
            self::$instance = new TokenIssuer();
        }
        return self::$instance;
    }

    public function issue($id, $type) {
        if($_SERVER['REMOTE_ADDR'] != $_SERVER['SERVER_ADDR'] || ($_SERVER['REMOTE_ADDR'] != '127.0.0.1' && $_SERVER['REMOTE_ADDR'] != '::1'))
            die('Access Denied');
        else {
            if ($this->secret == null){
                TokenIssuer::getInstance();
            }
            $tokenId = base64_encode(mcrypt_create_iv(32));
            $issueTime = time();

            $notBefore = $issueTime + 2;
            $expire = $notBefore + 3600;

            $data = array(
                "iat" => $issueTime,
                "jti" => $tokenId,
                "nbf" => $notBefore,
                "exp" => $expire, 
                "data" => array(
                    "user" => $id,
                    "type" => $type
                    )
            );

            $jwt = JWT::encode($data, $this->secret, 'HS256');
            return json_encode($jwt);
        }
    }

    public function check($jwt){
        $creds = array('valid'=> NULL,
                'user'=> NULL,
                'type'=> NULL,
                'error'=> null
                );
            
        
        
        
        try {
            $decode = JWT::decode($jwt, $this->secret, array('HS256', 'HS512'));

        } catch(Exception $e){
                
            $creds['valid'] = FALSE;
            $creds['error'] = $e;
            return $creds;
        }
            
        $creds['valid'] = TRUE;
        $creds['user'] = $decode->data->user;
        $creds['type'] = $decode->data->type;

        return $creds;
        }
    }
?>

