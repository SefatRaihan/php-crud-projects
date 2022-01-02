<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/users-info-crud-using-xml-b2/config.php');

$users = simplexml_load_file($dataSource);
$userPosition = $_GET['userPosition'];

$i=0;
foreach ($users->children() as $user){
    if($i == $userPosition){
        $dom = dom_import_simplexml($user);
        $dom->parentNode->removeChild($dom);

    }else{
        echo "No data matches";
    }
    $i++;
}

file_put_contents($dataSource, $users->asXML());
header('location:index.php');