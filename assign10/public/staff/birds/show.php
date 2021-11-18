<?php require_once('../../../private/initialize.php'); ?>

<?php require_login(); ?>

<?php

$id = $_GET['id'] ?? '1'; // PHP > 7.0

$bird = Bird::find_by_id($id);

?>

<?php $page_title = 'Show Bird: ' . h($bird->common_name); ?>
<?php include(SHARED_PATH . '/user-header.php'); ?>

<div id="content">

  <a class="back-link" href="<?= url_for('/staff/birds/index.php'); ?>">&laquo; Back to List</a>

  <div class="bird show">

    <h1>Bird: <?= h($bird->common_name); ?></h1>

    <div class="attributes">
      <dl>
        <dt>Habitat</dt>
        <dd><?= h($bird->habitat); ?></dd>
      </dl>
      <dl>
        <dt>Food</dt>
        <dd><?= h($bird->food); ?></dd>
      </dl>
      <dl>
        <dt>Nesting</dt>
        <dd><?= h($bird->nesting); ?></dd>
      </dl>
      <dl>
        <dt>Behavior</dt>
        <dd><?= h($bird->behavior); ?></dd>
      </dl>
      <dl>
        <dt>Conservation ID</dt>
        <dd><?= h($bird->status()); ?></dd>
      </dl>
      <dl>
        <dt>Backyard Tips</dt>
        <dd><?= h($bird->tips); ?></dd>
      </dl>
    </div>

  </div>

</div>
