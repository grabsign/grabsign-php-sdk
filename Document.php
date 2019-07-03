<?php
/**
 * Created by PhpStorm.
 * User: NFAL
 * Date: 9/06/2019
 * Time: 7:30 PM
 */
require_once ("./ClientApi.php");
require_once ("./Authentication.php");

class Document
{
    public $document_id = "";
    public function download_document(){
        ClientApi::$post_data = array(
            "api_key" => Authentication::$api_key,
            "access_token" => Authentication::$access_token,
            "document_id" => $this->document_id
        );
        ClientApi::$url = "http://localhost/docusign-api/index.php/Api/download_document";
        ClientApi::downloadReport();
    }
}