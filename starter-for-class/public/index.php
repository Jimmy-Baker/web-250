<?php 
require_once('../private/initialize.php');
include(SHARED_PATH . '/header.php'); 
?>
<a href="../public/members/login.php">Log in</a>
<ul>
    <li><a href="<?= url_for('/bird.php'); ?>">View Our Birds</a></li>
    <li><a href="<?= url_for('/about.php'); ?>">About Us</a></li>
  </ul>
    

<?php include(SHARED_PATH . '/footer.php'); ?>