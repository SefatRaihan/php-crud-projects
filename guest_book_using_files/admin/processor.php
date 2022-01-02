<?php
include_once ($_SERVER['DOCUMENT_ROOT'] . '/guest_book_using_files/config.php');

use App\GuestBook\BookInfo;
use App\Utility\Debugger;
use App\Utility\Sanitizer;
use App\Utility\Validator;
use App\Utility\Utility;


$guests = [];
if(file_exists($storage_path)){
    $guests = unserialize(file_get_contents($storage_path));
}else{
    echo "Storage not found";
}


if(Utility::isPosted()){
    $sanitizedData = Sanitizer::sanitize($_POST);
    $validatedData = Validator::validate($sanitizedData);
    if(!$validatedData){
        header("location:create.php");
    }else{
        $guests[] = $validatedData;
        $result = file_put_contents($storage_path, serialize($guests));
        if($result){
            echo "Data has been saved successfully. <a href='index.php'>Go to index.</a> ";
        }else{
            echo "Data has not been saved";
        }
    }
}
//var_dump($_SESSION);




