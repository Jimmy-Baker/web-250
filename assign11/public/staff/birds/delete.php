<?php

require_once('../../../private/initialize.php');

require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/birds/birds.php'));
}
$id = $_GET['id'];
$bird = Bird::find_by_id($id);
if($bird == false) {
  redirect_to(url_for('/staff/birds/birds.php'));
}

if(is_post_request()) {

  // Delete bird
  $result = $bird->delete();
  $_SESSION['message'] = 'The bird was deleted successfully.';
  redirect_to(url_for('/staff/birds/birds.php'));

} else {
  // Display form
}

?>

<?php $page_title = 'Delete Bird'; ?>
<?php include(SHARED_PATH . '/user-header.php'); ?>

<div id="main">

  <a class="back-link" href="<?= url_for('/staff/birds/birds.php'); ?>">&laquo; Back to List</a>

  <div class="bird delete">
    <h1>Delete Bird</h1>
    <p>Are you sure you want to delete this bird?</p>
    <p class="item"><?= h($bird->common_name); ?></p>

    <form action="<?= url_for('/staff/birds/delete.php?id=' . h(u($id))); ?>" method="post">
      <div id="operations">
        <button type="submit" class="button-primary" name="commit">Delete Bird</button>
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/user-footer.php'); ?>
