<?php

namespace App;

use PDO;
use PDOException;

class Banner
{
    public $id = null;
    public $title = null;


    public $conn = null;


    public function __construct()
    {

        try {
        //Connect to Database
        $this->conn = new PDO("mysql:host=localhost;dbname=pondit_php", "root", "");
        // set the PDO error mode to exception
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

    }

    public function index(){
        $query = "SELECT * FROM `banners` WHERE is_deleted = 0";

        $stmt = $this->conn->prepare($query);

        $result = $stmt->execute();

        $banners = $stmt->fetchAll();
        return $banners;
    }
    public function getActiveBanners(){
        $_startFrom = 0;
        $_total = 3;
        $query = "SELECT * FROM `banners` WHERE is_active = 1 LIMIT $_startFrom, $_total";

        $stmt = $this->conn->prepare($query);

        $result = $stmt->execute();

        $banners = $stmt->fetchAll();
        return $banners;
    }
    public function store($data){
        $_picture = $this->upload();

        $_title = $data['title'];
        $_detail = $data['detail'];
        if(array_key_exists('is_active', $data)){
            $_is_active = $data['is_active'];
        }else{
            $_is_active = 0;
        }
        // Y-m-d h-i-s formatting
        // PHP datetime function
        // Current time in second: time();

        $_created_at = date('Y-m-d h-i-s', time());

        //Insert command
        $query = "INSERT INTO `banners` (`title`, `detail`, `picture`, `is_active`, `created_at`) VALUES (:title, :detail, :picture, :is_active, :created_at)";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $_title);
        $stmt->bindParam(':detail', $_detail);
        $stmt->bindParam(':picture', $_picture);
        $stmt->bindParam(':is_active', $_is_active);
        $stmt->bindParam(':created_at', $_created_at);

        $result = $stmt->execute();

        if($result){
            $_SESSION['message'] = "Banner is added successfully";
        }else{
            $_SESSION['message'] = "Banner is NOT added successfully";
        }

        header("location:index.php");
    }
    public function show($id){
        $query = "SELECT * FROM `banners` WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);

        $result = $stmt->execute();

        $banner = $stmt->fetch();
        return $banner;
    }
    public function edit($id){
        $query = "SELECT * FROM `banners` WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);

        $result = $stmt->execute();

        $banner = $stmt->fetch();
        return $banner;
    }
    public function update($data){
        $_picture = $this->upload();

        $_title = $data['title'];
        $_id = $data['id'];
        $_detail = $data['detail'];
        if(array_key_exists('is_active', $data)){
            $_is_active = $data['is_active'];
        }else{
            $_is_active = 0;
        }
        $_modified_at = date('Y-m-d h-i-s', time());


//Insert command
        $query = "UPDATE `banners` SET `title` = :title, `detail` = :detail, `picture` = :picture, `is_active` = :is_active, `modified_at` = :modified_at WHERE `banners`.`id` = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $_id);
        $stmt->bindParam(':title', $_title);
        $stmt->bindParam(':detail', $_detail);
        $stmt->bindParam(':picture', $_picture);
        $stmt->bindParam(':is_active', $_is_active);
        $stmt->bindParam(':modified_at', $_modified_at);

        $result = $stmt->execute();


        if($result){
            $_SESSION['message'] = "Banner is updated successfully";
        }else{
            $_SESSION['message'] = "Banner is NOT updated successfully";
        }

        header("location:index.php");
    }
    public function trash(){
        $_id = $_GET['id'];
        $_is_deleted = 1;

        $query = "UPDATE `banners` SET `is_deleted` = :is_deleted WHERE `banners`.`id` = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $_id);
        $stmt->bindParam(':is_deleted', $_is_deleted);

        $result = $stmt->execute();

        if($result){
            $_SESSION['message'] = "Banner is trashed successfully";
        }else{
            $_SESSION['message'] = "Banner is NOT trashed successfully";
        }

        header("location:index.php");
    }
    public  function restore(){
        $_id = $_GET['id'];
        $_is_deleted = 0;
        $query = "UPDATE `banners` SET `is_deleted` = :is_deleted WHERE `banners`.`id` = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $_id);
        $stmt->bindParam(':is_deleted', $_is_deleted);

        $result = $stmt->execute();

        if($result){
            $_SESSION['message'] = "Banner is restored successfully.";
        }else{
            $_SESSION['message'] = "Banner can NOT be restored.";
        }

        header("location:index.php");
    }
    public function trash_index(){

        $query = "SELECT * FROM `banners` WHERE is_deleted = 1";

        $stmt = $this->conn->prepare($query);

        $result = $stmt->execute();

        $banners = $stmt->fetchAll();
        return $banners;
    }
    public  function delete($id){
        $query = "DELETE FROM `banners` WHERE `banners`.`id` = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);

        $result = $stmt->execute();

        if($result){
            $_SESSION['message'] = "Banner is deleted successfully";
        }else{
            $_SESSION['message'] = "Banner is NOT deleted successfully";
        }

        header("location:index.php");
    }

    private function upload(){
        $approot = $_SERVER['DOCUMENT_ROOT'].'/crud/';
        $_picture = null;
        if($_FILES['picture']['name'] != ""){
            $file_name = 'IMG_'.time().'_'.$_FILES['picture']['name'];
            $target = $_FILES['picture']['tmp_name'];
            $destination = $approot.'uploads/' .$file_name;

            $is_file_moved = move_uploaded_file($target, $destination);

            if($is_file_moved){
                $_picture = $file_name;
            }
        }else{
            $_picture = $_POST['old_picture'];
        }

        return $_picture;
    }
}