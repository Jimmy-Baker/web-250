<?php

require_once('../../../private/initialize.php');

require_login();

if(is_post_request()) {

  // Create record using post parameters
  $args = $_POST['bird'];
  $bird = new Bird($args);
  $result = $bird->save();

  if($result === true) {
    $new_id = $bird->id;
    $_SESSION['message'] = 'The bird was created successfully.';
    redirect_to(url_for('/staff/birds/show.php?id=' . $new_id));
  } else {
    // show errors
  }

} else {
  // display the form
  $bird = new Bird;
}

?>

<?php $page_title = 'Create Bird'; ?>
<?php include(SHARED_PATH . '/user-header.php'); ?>

<div id="main">

  <a class="back-link" href="<?= url_for('/staff/birds/birds.php'); ?>">&laquo; Back to List</a>

  <div class="bird">
    <div class="row">
      <div class="six columns offset-by-three">
        <h1>Create Bird</h1>
      </div>
    </div>


    <form action="<?= url_for('/staff/birds/new.php'); ?>" method="post">

      <?php include('form_fields.php'); ?>
      <?= display_errors($bird->error_array); ?>

      <div id="operations" class="row">
        <div class="six columns offset-by-three">
          <button type="submit" class="button-primary">Create Bird</button>
        </div>
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/user-footer.php'); ?>
