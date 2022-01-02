<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/users-info-crud-using-json/config.php');
use App\UserInfo\UserInfo;
use App\Utility\Debugger;
use App\Utility\Sanitizer;
use App\Utility\Validator;
use App\Utility\Utility;

if(strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $usersJsonData = file_get_contents($dataSource);
    $users = json_decode($usersJsonData, true);

    /*echo "<pre>";
    print_r($users);
    echo "</pre>";*/

    $users[] = array('name'=>$name, 'email'=>$email);

    /*echo "<pre>";
    print_r($users);
    echo "</pre>";*/

    $usersJsonDataAfterInsert = json_encode($users);
    file_put_contents($dataSource, $usersJsonDataAfterInsert);

    header('location:index.php');
}