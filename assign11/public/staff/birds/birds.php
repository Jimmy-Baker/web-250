<?php require_once('../../../private/initialize.php'); ?>
<?php require_login(); ?>

<?php
  
// Find all birds;
$birds = Bird::find_all();
  
?>
<?php $page_title = 'Birds'; ?>
<?php include(SHARED_PATH . '/user-header.php'); ?>

<div id="main">
  <div class="birds listing">
    <h1>Birds</h1>

    <div class="actions">
      <a class="action" href="<?= url_for('/staff/birds/new.php'); ?>">Add Bird</a>
    </div>

  	<table class="list">
      <tr>
        <th>ID</th>
        <th>Common Name</th>
        <th>Habitat</th>
        <th>Food</th>
        <th>Nesting</th>
        <th>Behavior</th>
        <th>Conservation Level</th>
        <th>Backyard Tips</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

      <?php foreach($birds as $bird) { ?>
        <tr>
          <td><?= h($bird->id); ?></td>
          <td><?= h($bird->common_name); ?></td>
          <td><?= h($bird->habitat); ?></td>
          <td><?= h($bird->food); ?></td>
          <td><?= h($bird->nesting); ?></td>
          <td><?= h($bird->behavior); ?></td>
          <td><?= h($bird->status()); ?></td>
          <td><?= h($bird->tips); ?></td>
          <td><a class="action" href="<?= url_for('/staff/birds/show.php?id=' . h(u($bird->id))); ?>">View</a><br>
            <a class="action" href="<?= url_for('/staff/birds/edit.php?id=' . h(u($bird->id))); ?>">Edit</a><br>
            <a class="action" href="<?= url_for('/staff/birds/delete.php?id=' . h(u($bird->id))); ?>">Delete</a>
          </td>
    	  </tr>
      <?php } ?>
  	</table>

  </div>

</div>

<?php include(SHARED_PATH . '/user-footer.php'); ?>
