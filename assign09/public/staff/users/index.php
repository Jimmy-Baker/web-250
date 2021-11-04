<?php require_once('../../../private/initialize.php'); ?>

<?php //require_login(); ?>

<?php

// Find all users
$users = User::find_all();

?>
<?php $page_title = 'Users'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="users listing">
    <h1>Users</h1>

    <div class="actions">
      <a class="action" href="<?= url_for('/staff/users/new.php'); ?>">Add User</a>
    </div>

  	<table class="list">
      <tr>
        <th>ID</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Email</th>
        <th>Username</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

      <?php foreach($users as $user) { ?>
        <tr>
          <td><?= h($user->id); ?></td>
          <td><?= h($user->first_name); ?></td>
          <td><?= h($user->last_name); ?></td>
          <td><?= h($user->email); ?></td>
          <td><?= h($user->username); ?></td>
          <td><a class="action" href="<?= url_for('/staff/users/show.php?id=' . h(u($user->id))); ?>">View</a></td>
          <td><a class="action" href="<?= url_for('/staff/users/edit.php?id=' . h(u($user->id))); ?>">Edit</a></td>
          <td><a class="action" href="<?= url_for('/staff/users/delete.php?id=' . h(u($user->id))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
