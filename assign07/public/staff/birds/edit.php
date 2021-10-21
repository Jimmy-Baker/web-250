<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/birds/index.php'));
}
$id = $_GET['id'];
$bird = Bird::find_id($id);
if($bird == false) {
  redirect_to(url_for('/staff/birds/index.php'));
}


if(is_post_request()) {

  // Save record using post parameters
  $args = [];
  $args['common_name'] = $_POST['common_name'] ?? NULL;
  $args['habitat'] = $_POST['habitat'] ?? NULL;
  $args['food'] = $_POST['food'] ?? NULL;
  $args['nesting'] = $_POST['nesting'] ?? NULL;
  $args['behavior'] = $_POST['behavior'] ?? NULL;
  $args['conservation_id'] = $_POST['conservation_id'] ?? NULL;
  $args['tips'] = $_POST['tips'] ?? NULL;

  $bird = [];
//  $bird-merge_attributes($args);
//  $bird->update();

  $result = false;
  if($result === true) {
    $_SESSION['message'] = 'The bird was updated successfully.';
    redirect_to(url_for('/staff/bird/show.php?id=' . $id));
  } else {
    // show errors
  }

} else {

  // display the form
  
}

?>

<?php $page_title = 'Edit Bird'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/birds/index.php'); ?>">&laquo; Back to List</a>

  <div class="bird edit">
    <h1>Edit Bird</h1>

    <?php // echo display_errors($errors); ?>

    <form action="<?php echo url_for('/staff/birds/edit.php?id=' . h(u($id))); ?>" method="post">

      <?php include('form_fields.php'); ?>
      
      <div id="operations">
        <input type="submit" value="Edit Bird" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
