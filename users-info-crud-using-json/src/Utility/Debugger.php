<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/23/2021
 * Time: 8:34 PM
 */

namespace App\Utility;


class Debugger
{

    public static function debug($anyVariable){
        echo "<pre>";
        var_dump($anyVariable);
        echo "</pre>";
    }

}