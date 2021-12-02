<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
require_once('../../../private/initialize.php');
if(!isset($bird)) {
  redirect_to(url_for('/staff/birds/birds.php'));
}
?>

<div class="row">
  <div class="six columns offset-by-three"><label for="common_name">Common Name</label>
  <input type="text" id="common_name" name="bird[common_name]" value="<?= h($bird->common_name); ?>" /></div>
</div>

<div class="row">
  <div class="six columns offset-by-three"><label for="habitat">Habitat</label>
  <input type="text" id="habitat" name="bird[habitat]" value="<?= h($bird->habitat); ?>" /></div>
</div>

<div class="row">
  <div class="six columns offset-by-three"><label for="food">Food</label>
  <input type="text" id="food" name="bird[food]" value="<?= h($bird->food); ?>" /></div>
</div>

<div class="row">
  <div class="six columns offset-by-three"><label for="nesting">Nesting</label>
  <input type="text" id="nesting" name="bird[nesting]" value="<?= h($bird->nesting); ?>" /></div>
</div class="row">

<div class="row">
  <div class="six columns offset-by-three"><label for="behavior">Behavior</label>
  <input type="text" id="behavior" name="bird[behavior]" value="<?= h($bird->behavior); ?>" /></div>
</div>

<div class="row">
  <div class="six columns offset-by-three">
    <label for="conservation_id">Conservation ID</label>
    <select id="conservation_id" name="bird[conservation_id]">
      <option value=""></option>
    <?php foreach(Bird::CONSERVATION as $key => $value) { ?>
      <option value="<?= $key; ?>" <?php if($bird->status() == $value) { echo 'selected';} ?> > <?= $value; ?></option>
    <?php } ?>
    </select>
  </div>
</div>

<div class="row">
  <div class="six columns offset-by-three"><label for="tips">Tips</label>
  <input type="text" id="tips" name="bird[tips]" value="<?= h($bird->tips); ?>" /></div>
</div>

