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

  // Save record using post parameters
  $args = $_POST['user'];
  $user->merge_attributes($args);
  $result = $user->save();

  if($result === true) {
    $session->message('The user was updated successfully.');
    redirect_to(url_for('/staff/users/show.php?id=' . $id));
  } else {
    // show errors
  }

} else {

  // display the form

}

?>

<?php $page_title = 'Edit User'; ?>
<?php include(SHARED_PATH . '/user-header.php'); ?>

<div id="main">

  <a class="back-link" href="<?= url_for('/staff/users/users.php'); ?>">&laquo; Back to List</a>

  <div class="user">
    <div class="row">
      <div class="six columns offset-by-three">
        <h1>Edit User</h1>
      </div>
    </div>
    <?= display_errors($user->error_array); ?>

    <form action="<?= url_for('/staff/users/edit.php?id=' . h(u($id))); ?>" method="post">

      <?php include('form_fields.php'); ?>

      <div id="operations" class="row">
        <div class="six columns offset-by-three">
          <button type="submit" class="button-primary">Edit User</button>
        </div>
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/user-footer.php'); ?>
