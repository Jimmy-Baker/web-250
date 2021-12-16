<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Your Images</title>
    <meta name="description" content="">
    <meta name="author" content="Jimmy Baker">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
    <a href="index.php">&#8592;</a>
    <?php
        $sql = "SELECT * FROM images ORDER BY id DESC";
        $res = mysqli_query($conn, $sql);

        if(mysqli_num_rows($res) > 0) {
            while($images = mysqli_fetch_assoc($res)) { ?>
    <div class="alb">
      <img src="uploads/<?= $images['image_url'] ?>">
    </div>
    <?php }
        } 
    ?>
  </body>

</html>