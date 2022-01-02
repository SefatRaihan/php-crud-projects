<?php

include_once ($_SERVER['DOCUMENT_ROOT']. '/users-info-crud-using-xml/config.php');

$dataFile = $_SERVER['DOCUMENT_ROOT'].'/users-info-crud-using-xml/storage/data.xml';

$users = simplexml_load_file($dataFile);
$userPosition = $_GET['userPosition'];

$i=0;
foreach($users->children() as $user){
    if($i == $userPosition) {
        $dom = dom_import_simplexml($user);
        $dom->parentNode->removeChild($dom);
    }//else{
//        echo "No data matched for this position";
//    }
    $i++;
}
file_put_contents($dataFile, $users->asXML());
header('location:index.php');
?>