<?php
include_once ($_SERVER['DOCUMENT_ROOT']. '/guest_info_crud_using_files_b2/config.php');


use App\Utility\Debugger;


$guestPosition = $_GET['guestPosition'];

if(file_exists($dataSource)){
    $gusts = unserialize(file_get_contents($dataSource));
}else{
    echo "Storage not found";
}


unset($gusts[$guestPosition]);


if(file_put_contents($dataSource, serialize($gusts))){
    header('location:index.php');
}else{
    echo "Data has not been deleted successfully";
}





