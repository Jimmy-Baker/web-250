<?php

if(isset($_POST['submit']) && isset($_FILES['my_image'])) {
  include "db_connect.php";
  echo "<pre>"; 
  print_r($_FILES['my_image']);
  echo "</pre>";
  
  $img_name = $_FILES['my_image']['name'];
  $img_size = $_FILES['my_image']['size'];
  $tmp_name = $_FILES['my_image']['tmp_name'];
  $error = $_FILES['my_image']['error'];
    
  if ($error === 0) {
    if ($img_size > 125000) {
      $em = "Sorry, your file is too large.";
      header("Location: index.php?error=$em");
    } else {
      $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
      $img_ex_lc = strtolower($img_ex);
      
      $allowed_exs = ['jpg', 'jpeg', 'png'];
      
      if (in_array($img_ex_lc, $allowed_exs)) {
        $new_image_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
        $image_upload_path = 'uploads/' . $new_image_name;
        move_uploaded_file($tmp_name, $image_upload_path);
        
        $sql = "INSERT INTO images(image_url) VALUES('$new_image_name') ";
        mysqli_query($conn, $sql);
        header('Location: view.php');

      } else {
        $em = "You cannot upload $img_ex_lc files";
        header("Location: index.php?error=$em");
      }
      
    }
  } else {
    $em = "unknown error occured";
    header("Location: index.php?error=$em");
  }
  
} else {
  header("Location: index.php");
}

?>