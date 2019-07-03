<?php
require_once ("./Authentication.php");
require_once ("./Template.php");
require_once ("./Signers_list.php");
require_once ("./Signer.php");
require_once ("./Document.php");

//            "access_token" => "69a6b68e43ec0a1b710a188954f42730",


//auth

Authentication::$api_key = "";
$auth_obj = new Authentication("api key","email","password");
$access_token = $auth_obj->verify_credentials();


//get templates list
/*
$templates_obj = new Templates();
$templates_obj->get_templates_list();
*/


///signers - template
/*
$signers_list = new Signers_list();
$signer = new Signer("customer", "ali" , "ali@yahoo.com");
$signers_list->add_signer($signer);
$signer = new Signer("witness", "rashid" , "rashid@yahoo.com");
$signers_list->add_signer($signer);
//var_dump( $signers_list->get_signers());


$template_obj = new Template();
$template_obj->template_id = "906188948e5751dcd1dca3afe245cf92";
$template_obj->signers_list = $signers_list;

$response = $template_obj->create_document();
var_dump($response);
*/


//download file
/*$document_obj = new Document();
$document_obj->document_id = "906188948e5751dcd1dca3afe245cf92";
$document_obj->download_document();
*/
