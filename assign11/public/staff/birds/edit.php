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

  // Save record using post parameters
  $args = $_POST['bird'];
  $bird->merge_attributes($args);
  $result = $bird->save();

  if($result === true) {
    $_SESSION['message'] = 'The bird was updated successfully.';
    redirect_to(url_for('/staff/birds/show.php?id=' . $id));
  } else {
    // show errors
  }

} else {

  // display the form

}

?>

<?php $page_title = 'Edit Bird'; ?>
<?php include(SHARED_PATH . '/user-header.php'); ?>

<div id="main">

  <a class="back-link" href="<?= url_for('/staff/birds/birds.php'); ?>">&laquo; Back to List</a>

  <div class="bird">
    <div class="row">
      <div class="six columns offset-by-three">
        <h1>Edit Bird</h1>
      </div>
    </div>

    <form action="<?= url_for('/staff/birds/edit.php?id=' . h(u($id))); ?>" method="post">

      <?php include('form_fields.php'); ?>
      <?= display_errors($bird->error_array); ?>
      <div id="operations" class="row">
        <div class="six columns offset-by-three">
        <button type="submit" class="button-primary">Edit Bird</button>
        <div>
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/user-footer.php'); ?>
