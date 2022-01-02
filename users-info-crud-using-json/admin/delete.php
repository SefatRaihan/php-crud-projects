<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/users-info-crud-using-json/config.php');

$usersJsonData = file_get_contents($dataSource);
$users = json_decode($usersJsonData, true);

$userPosition = $_GET['userPosition'];

unset($users[$userPosition]);

$usersJsonDataAfterInsert = json_encode($users);
file_put_contents($dataSource, $usersJsonDataAfterInsert);

header('location:index.php');