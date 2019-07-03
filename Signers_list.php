<?php
/**
 * Created by PhpStorm.
 * User: NFAL
 * Date: 9/06/2019
 * Time: 4:30 PM
 */

class Signers_list
{
    public $signers_list = array();
    function __construct(){}
    function add_signer($signer){array_push($this->signers_list, $signer);}
    function get_signers(){return $this->signers_list;}


}