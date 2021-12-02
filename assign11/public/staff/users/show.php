<?php require_once('../../../private/initialize.php'); ?>
<?php require_login(); ?>

<?php

$id = $_GET['id'] ?? '1'; // PHP > 7.0

$user = User::find_by_id($id);

?>

<?php $page_title = 'Show User: ' . h($user->full_name()); ?>
<?php include(SHARED_PATH . '/user-header.php'); ?>

<div id="main">

  <a class="back-link" href="<?= url_for('/staff/users/users.php'); ?>">&laquo; Back to List</a>

  <div class="user">

    <h1>User: <?= h($user->full_name()); ?></h1>

    <div class="attributes">
      <dl class="row">
        <dt class="two columns">First name</dt>
        <dd class="three columns"><?= h($user->first_name); ?></dd>
      </dl>
      <dl class="row">
        <dt class="two columns">Last name</dt>
        <dd class="three columns"><?= h($user->last_name); ?></dd>
      </dl>
      <dl class="row">
        <dt class="two columns">Email</dt>
        <dd class="three columns"><?= h($user->email); ?></dd>
      </dl>
      <dl class="row">
        <dt class="two columns">Username</dt>
        <dd class="three columns"><?= h($user->username); ?></dd>
      </dl>
      <dl class="row">
        <dt class="two columns">User Level</dt>
        <dd class="three columns"><?= h($user->user_level); ?></dd>
      </dl>
    </div>

  </div>

</div>
