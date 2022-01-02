<?php
include_once ($_SERVER['DOCUMENT_ROOT']. '/users-info-crud-using-xml/config.php');

$dataFile = $_SERVER['DOCUMENT_ROOT'].'/users-info-crud-using-xml/storage/data.xml';

$users = simplexml_load_file($dataFile);
$userPosition = $_POST['userPosition'];

$allUsers = [];
foreach($users->children() as $user){
    $allUsers[] = $user;
}
$user = $allUsers[$userPosition];

if(strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
    $user->children()->name = $_POST['name'];
    $user->children()->email = $_POST['email'];

    file_put_contents($dataFile, $users->asXML());
    header('location:index.php');
}

?>