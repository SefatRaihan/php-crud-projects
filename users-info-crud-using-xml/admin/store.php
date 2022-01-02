<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/users-info-crud-using-xml/config.php');
use App\UserInfo\UserInfo;
use App\Utility\Debugger;
use App\Utility\Sanitizer;
use App\Utility\Validator;
use App\Utility\Utility;

$dataFile = $_SERVER['DOCUMENT_ROOT'].'/users-info-crud-using-xml/storage/data.xml';
//print_r($_POST);
//die();

//$sanitizedData = Sanitizer::sanitize($_POST);
//$validatedData = Validator::validate($sanitizedData);


if(strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
    $users = simplexml_load_file($dataFile);
    $user = $users->addChild('user');
    $user->addChild('name', $_POST['name']);
    $user->addChild('email', $_POST['email']);

    file_put_contents($dataFile, $users->asXML());
    header('location:index.php');
}