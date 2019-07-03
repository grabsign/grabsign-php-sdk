<?php
/**
 * Created by PhpStorm.
 * User: NFAL
 * Date: 9/06/2019
 * Time: 2:08 PM
 */

require_once ("./ClientApi.php");

class Authentication
{
    static $api_key = "";
    static $access_token = "";
    private $email = "";
    private $password = "";

    function __construct($api_key, $email, $password){
        Authentication::$api_key = $api_key;
        $this->email = $email;
        $this->password = $password;
    }

    function verify_credentials(){
       ClientApi::$url = "http://localhost/docusign-api/index.php/Api/authentication";
       ClientApi::$post_data = array(
            "api_key" => Authentication::$api_key,
            "email" => $this->email,
            "password" => $this->password
        );

//        ClientApi::$class_object = new Authentication(Authentication::$api_key , $this->email, $this->password);
        $result = ClientApi::process_request();
        if($result->status_code = 200){
            Authentication::$access_token = $result->access_token;
            return Authentication::$access_token;
        }
    }

    function set_api_key(){}
    function set_email(){}
    function set_password(){}
    function get_api_key(){}
    function get_email(){}
    function get_password(){}
    function get_access_token(){}


}