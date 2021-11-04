<?php require_once('../private/initialize.php'); ?>

<?php

  // Get requested ID

  $id = $_GET['id'] ?? false;

  if(!$id) {
    redirect_to('birds.php');
  }

  // Find bird using ID

  $birdy = Bird::find_by_id($id);

?>

<?php $page_title = 'Detail: ' . $birdy->common_name; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">

  <a href="birds.php">Back to WNC Birds</a>

  <div id="page">

    <div class="detail">
      <dl>
        <dt>Common Name</dt>
        <dd><?php echo h($birdy->common_name); ?></dd>
      </dl>
      <dl>
        <dt>Habitat</dt>
        <dd><?php echo h($birdy->habitat); ?></dd>
      </dl>
      <dl>
        <dt>Food</dt>
        <dd><?php echo h($birdy->food); ?></dd>
      </dl>
      <dl>
        <dt>Nest Placement</dt>
        <dd><?php echo h($birdy->nesting); ?></dd>
      </dl>
      <dl>
        <dt>Behavior</dt>
        <dd><?php echo h($birdy->behavior); ?></dd>
      </dl>
      <dl>
        <dt>Conservation</dt>
        <dd><?php echo h($birdy->status()); ?></dd>
      </dl>
      <dl>
        <dt>Backyard Tips</dt>
        <dd><?php echo h($birdy->tips); ?></dd>
      </dl>
    </div>

  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
