<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'Inventory'; ?>
<?php include(SHARED_PATH . '/public-header.php'); ?>

<div id="main">

<div id="page">
    <div class="intro">
      <h2>Small Sampling of WNC Birds</h2>
      <p>Choose the bird you love.</p>
      <p>The others won't feel left out that you didn't choose them.</p>
    </div>

    <table id="inventory">
      <tr>
        <th>Common Name</th>
        <th>Habitat</th>
        <th>Food</th>
        <th>Nest Placement</th>
        <th>Behavior</th>
        <th>Conservation</th>
        <th>Backyard Tips</th>
        <th>&nbsp;</th>
      </tr>
      
<?php
      $birds = Bird::find_all();

      foreach($birds as $bird) {
?>
      <tr>
        <td><?= h($bird->common_name); ?></td>
        <td><?= h($bird->habitat); ?></td>
        <td><?= h($bird->food); ?></td>
        <td><?= h($bird->nesting); ?></td>
        <td><?= h($bird->behavior); ?></td>
        <td><?= h($bird->status()); ?></td>
        <td><?= h($bird->tips); ?></td>
        <td><a href="detail.php?id=<?= $bird->id; ?>">View</a></td>
      </tr>
      <?php } ?>
    </table>
    
    <table id="single">
      
  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
