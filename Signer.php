<?php
/**
 * Created by PhpStorm.
 * User: NFAL
 * Date: 9/06/2019
 * Time: 4:08 PM
 */

class Signer
{
    public $role;
    public $name;
    public $email;

    function __construct($role, $name, $email){
        $this->role = $role;
        $this->name = $name;
        $this->email = $email;
    }


}