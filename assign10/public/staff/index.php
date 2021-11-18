<?php require_once('../../private/initialize.php'); ?>

<?php require_login(); ?>


<?php $page_title = 'Staff Menu'; ?>
<?php include(SHARED_PATH . '/user-header.php'); ?>

<div id="content">
  <div id="main-menu">
    <h2>Main Menu</h2>
    <ul>
      <li><a href="<?= url_for('/staff/birds/index.php'); ?>">Birds</a></li>
      <li><a href="<?= url_for('/staff/users/index.php'); ?>">Users</a></li>
    </ul>
  </div>

</div>

<?php include(SHARED_PATH . '/user-footer.php'); ?>
