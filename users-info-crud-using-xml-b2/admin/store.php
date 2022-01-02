<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/users-info-crud-using-xml-b2/config.php');
use App\UserInfo\UserInfo;
use App\Utility\Debugger;
use App\Utility\Sanitizer;
use App\Utility\Validator;
use App\Utility\Utility;

//print_r($_POST);

if(strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
    $users = simplexml_load_file($dataSource);
    $user = $users->addChild('user');
    $user->addChild('name', $_POST['name']);
    $user->addChild('email', $_POST['email']);

    file_put_contents($dataSource, $users->asXML());

    //var_dump($users);

    header('location:index.php');
}