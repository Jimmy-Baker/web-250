<?php

require_once('../../../private/initialize.php');

require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/users/users.php'));
}
$id = $_GET['id'];
$user = User::find_by_id($id);
if($user == false) {
  redirect_to(url_for('/staff/users/users.php'));
}

if(is_post_request()) {

  // Delete user
  $result = $user->delete();
  $session->message('The user was deleted successfully.');
  redirect_to(url_for('/staff/users/users.php'));

} else {
  // Display form
}

?>

<?php $page_title = 'Delete User'; ?>
<?php include(SHARED_PATH . '/user-header.php'); ?>

<div id="main">

  <a class="back-link" href="<?= url_for('/staff/users/users.php'); ?>">&laquo; Back to List</a>

  <div class="user delete">
    <h1>Delete User</h1>
    <p>Are you sure you want to delete this user?</p>
    <p class="item"><?= h($user->full_name()); ?></p>

    <form action="<?= url_for('/staff/users/delete.php?id=' . h(u($id))); ?>" method="post">
      <div id="operations">
        <button type="submit" class="button-primary" name="commit">Delete User"</button>
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/user-footer.php'); ?>
