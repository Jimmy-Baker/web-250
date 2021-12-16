<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Image Upload</title>
    <meta name="description" content="">
    <meta name="author" content="Jimmy Baker">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
    <?php if (isset($_GET['error'])): ?>
    <p><?= $_GET['error']; ?></p>
    <?php endif ?>
    <form action="upload.php" method="post" enctype="multipart/form-data">
      <input type="file" name="my_image" required>
      <input type="submit" name="submit" value="upload">
    </form>
  </body>

</html>