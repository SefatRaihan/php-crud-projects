<?php


namespace App\UserInfo;


class UserInfo
{
    public $name = null;
    public $email = null;


    public function __construct($data)
    {

        if(array_key_exists('name', $data)){
            $this->name =$data['name'];
        }
        if(array_key_exists('email', $data)){
            $this->email =$data['email'];
        }
    }
}