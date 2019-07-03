<?php
/**
 * Created by PhpStorm.
 * User: NFAL
 * Date: 9/06/2019
 * Time: 4:05 PM
 */

require_once ("./ClientApi.php");
require_once ("./Authentication.php");
require_once ("./Signers_list.php");
class Template
{
    public $template_id = "";
    public $signers_list ;

    function _construct(){
        $this->signers_list = new Signers_list();
    }

    public function get_templates_list(){
        ClientApi::$post_data = array(
            "api_key" => Authentication::$api_key,
            "access_token" => Authentication::$access_token
        );
        ClientApi::$url = "http://localhost/docusign-api/index.php/Api/get_templates_list";
        $result = ClientApi::process_request();
        return $result;
    }
    function set_template_id($template_id){$this->template_id = $template_id;}

    function create_document(){
        $signers_list = array();
        foreach ($this->signers_list as $signers) {
            foreach ($signers as $signer) {
                var_dump($signer->role);
                $single_Signer = array(
                    "role" => $signer->role,
                    "name" => $signer->name,
                    "email" => $signer->email
                );
                array_push($signers_list , $single_Signer);
            }
        }

        ClientApi::$post_data = array(
            "api_key" => Authentication::$api_key,
            "access_token" => Authentication::$access_token,
            "signers" => json_encode($signers_list),
            "template_id" => $this->template_id

        );
        ClientApi::$url = "http://localhost/docusign-api/index.php/Api/create_document";
        $result = ClientApi::process_request();
        return $result;

    }

}