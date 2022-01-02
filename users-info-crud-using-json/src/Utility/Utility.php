<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/23/2021
 * Time: 9:04 PM
 */

namespace App\Utility;


class Utility
{
    public static function isPosted(){
        if(strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
            return true;
        }
        return false;
    }

}