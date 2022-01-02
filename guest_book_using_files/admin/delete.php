<?php
include_once ($_SERVER['DOCUMENT_ROOT']. '/guest_book_using_files/config.php');

$guestPosition = $_GET['guestPosition'];
if(file_exists($storage_path)){
    $guest_book_data = unserialize(file_get_contents($storage_path));
}else{
    echo "Storage not found";
}

unset($guest_book_data[$guestPosition]);

if(file_put_contents($storage_path, serialize($guest_book_data))){
    echo "Data has been deleted successfully.";
}else{
    echo "Data has not been deleted";
}

header("location:index.php");



// echo "<pre>";
//     print_r($client_details);
// echo "</pre>";



