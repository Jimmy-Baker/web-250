<?php

include "db_connect.php";
$database = db_connect();


class Image {
  
  
  public $imgName;
  public $imgSize;
  public $tmpName;
  public $errorMessage;
  
  static private $allowedExs = ['jpg', 'jpeg', 'png'];
  
  public function upload_image_file(){
    if (self::test_image_size && self::test_image_type){
      return true;
    }
  }
  
  public function test_image_size(){
    if (self::$imgSize < 125000) {
      return true;
    }
  }
  
  public function test_image_type($tmpName){
    $imgEx = pathinfo($tmpName, PATHINFO_EXTENSION);
    $imgExLc = strtolower($imgEx);
    return in_array($imgExLc, static::$allowedExs);
  }
  
  public function insert_image_url(){
    
    $sql = "INSERT INTO images(image_url) VALUES('" . self::$imgName . "') ";
    mysqli_query($conn, $sql);
    header('Location: view.php');
  }
  
}

?>