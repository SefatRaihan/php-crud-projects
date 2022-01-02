<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/users-info-crud-using-json/config.php');
if(strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $userPosition = $_POST['userPosition'];

    $usersJsonData = file_get_contents($dataSource);
    $users = json_decode($usersJsonData, true);

    $users[$userPosition]['name'] = $name;
    $users[$userPosition]['email'] = $email;

    $usersJsonDataAfterInsert = json_encode($users);
    file_put_contents($dataSource, $usersJsonDataAfterInsert);

    header('location:index.php');
}

?>