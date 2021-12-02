<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'Inventory'; ?>
<?php include(SHARED_PATH . '/public-header.php'); ?>

<div id="main">

<div id="page">
    <div class="intro">
      <h2>About our Birds</h2>
      <p>This is a non-comprehensive list of birds of Western North Carolina. Choose the bird you love and learn more about it. In many cases, finding out about the health, social, and ecological consequences of a change of wild bird habitat will become important if you are determined to save at least one species.</p>
      <p>Wild bird nesting is important because it increases and keeps more animals in captivity. The nesting location of wild birds will vary from year to year. When a bird moves into a nesting area, its population will drop, the numbers will increase, and the bird will migrate into the area. Other birds in nesting areas may not have had the opportunity to spend the winter.</p>
    </div>

    <table id="inventory">
      <thead>
        <th>Common Name</th>
        <th>Habitat</th>
        <th>Food</th>
        <th>Nest Placement</th>
        <th>Behavior</th>
        <th>Conservation</th>
        <th>Backyard Tips</th>
        <th>&nbsp;</th>
      </thead>
      
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
