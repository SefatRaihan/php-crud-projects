<?php
include_once( $_SERVER['DOCUMENT_ROOT'].'/crud/config.php');

use App\Banner;

$data = $_POST;
//Validating title
function is_empty($value){
    if($value == ''){
        return true;
    }else{
        return false;
    }
}

if(is_empty($data['title'])){
    session_start();
    $_SESSION['message'] = "Title can't be empty. Please enter a title.";
    header("location:edit.php?id=".$data['id']);
}else {
    $_banner = new Banner();
    $_banner->update($data);

}

