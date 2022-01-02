<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/users-info-crud-using-xml-b2/config.php');

$users = simplexml_load_file($dataSource);
$userPosition = $_POST['userPosition'];

$allUsers = [];
foreach ($users->children() as $user){
    $allUsers[] = $user;
}

$user = $allUsers[$userPosition];

if(strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
    $user->children()->name = $_POST['name'];
    $user->children()->email = $_POST['email'];

    file_put_contents($dataSource, $users->asXML());

    //var_dump($users);

    header('location:index.php');
}