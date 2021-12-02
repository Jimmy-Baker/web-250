<?php require_once('../../../private/initialize.php'); ?>

<?php require_login(); ?>

<?php

$id = $_GET['id'] ?? '1'; // PHP > 7.0

$bird = Bird::find_by_id($id);

?>

<?php $page_title = 'Show Bird: ' . h($bird->common_name); ?>
<?php include(SHARED_PATH . '/user-header.php'); ?>

<div id="main">

  <a class="back-link" href="<?= url_for('/staff/birds/birds.php'); ?>">&laquo; Back to List</a>

  <div class="bird">

    <h1>Bird: <?= h($bird->common_name); ?></h1>

    <div class="attributes">
      <dl class="row">
        <dt class="two columns">Habitat</dt>
        <dd class="three columns"><?= h($bird->habitat); ?></dd>
      </dl>
      <dl class="row">
        <dt class="two columns">Food</dt>
        <dd class="three columns"><?= h($bird->food); ?></dd>
      </dl>
      <dl class="row">
        <dt class="two columns">Nesting</dt>
        <dd class="three columns"><?= h($bird->nesting); ?></dd>
      </dl>
      <dl class="row">
        <dt class="two columns">Behavior</dt>
        <dd class="three columns"><?= h($bird->behavior); ?></dd>
      </dl>
      <dl class="row">
        <dt class="two columns">Conservation ID</dt>
        <dd class="three columns"><?= h($bird->status()); ?></dd>
      </dl>
      <dl class="row">
        <dt class="two columns">Backyard Tips</dt>
        <dd class="three columns"><?= h($bird->tips); ?></dd>
      </dl>
    </div>

  </div>

</div>
