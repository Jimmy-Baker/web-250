<?php require_once('../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/public-header.php'); ?>

<div id="main">

  <ul id="menu">
    <li><a href="<?= url_for('/birds.php'); ?>">View Our Inventory</a></li>
    <li><a href="<?= url_for('/about.php'); ?>">About Us</a></li>
    <li><a href="<?= url_for('/staff/login.php'); ?>">Member Log In</a></li>
  </ul>
    
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
