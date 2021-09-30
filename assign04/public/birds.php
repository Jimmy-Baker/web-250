<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'Inventory'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

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
      </tr>
      
<?php
      $parser = new ParseCSV(PRIVATE_PATH . '/wnc-birds.csv');
      $bird_array = $parser->parse();
      
      foreach($bird_array as $args) {
      $bird = new Bird($args); ?>
      <tr>
        <td><?php echo h($bird->commonName); ?></td>
        <td><?php echo h($bird->habitat); ?></td>
        <td><?php echo h($bird->food); ?></td>
        <td><?php echo h($bird->nesting); ?></td>
        <td><?php echo h($bird->behavior); ?></td>
        <td><?php echo h($bird->status()); ?></td>
        <td><?php echo h($bird->tips); ?></td>
      </tr>
      <?php } ?>
      <p> test </p>
    </table>
  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
