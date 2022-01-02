<?php
include_once ($_SERVER['DOCUMENT_ROOT']. '/guest_info_crud_using_files_b2/config.php');


use App\GuestBook\GuestBook;
use App\Utility\Sanitizer;
use App\Utility\Validator;
use App\Utility\Debugger;
use App\Utility\Utility;

$guestPosition = $_POST['guestPosition'];

$guests = [];
if(file_exists($dataSource)){
    $guests = unserialize(file_get_contents($dataSource));
}else{
    echo "Storage not found";
}



if(Utility::isPosted()){
    $sanitizedData = Sanitizer::sanitize($_POST);
    $validatedData = Validator::validate($sanitizedData);

    if(!$validatedData){
        header("location:index.php");
    }else{
        $guests[$guestPosition] = $validatedData;
        if(file_put_contents($dataSource, serialize($guests))){
            header('location:index.php');
        }else{
            echo "Data has not been updated successfully";
        }
    }
}



?>
