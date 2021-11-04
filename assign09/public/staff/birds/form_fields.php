<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
require_once('../../../private/initialize.php');
if(!isset($bird)) {
  redirect_to(url_for('/staff/birds/index.php'));
}
?>

<dl>
  <dt>Common Name</dt>
  <dd><input type="text" id="common_name" name="bird[common_name]" value="<?php echo h($bird->common_name); ?>" /></dd>
</dl>

<dl>
  <dt>Habitat</dt>
  <dd><input type="text" id="habitat" name="bird[habitat]" value="<?php echo h($bird->habitat); ?>" /></dd>
</dl>

<dl>
  <dt>Food</dt>
  <dd><input type="text" id="food" name="bird[food]" value="<?php echo h($bird->food); ?>" /></dd>
</dl>

<dl>
  <dt>Nesting</dt>
  <dd><input type="text" id="nesting" name="bird[nesting]" value="<?php echo h($bird->nesting); ?>" /></dd>
</dl>

<dl>
  <dt>Behavior</dt>
  <dd><input type="text" id="behavior" name="bird[behavior]" value="<?php echo h($bird->behavior); ?>" /></dd>
</dl>

<dl>
  <dt>Conservation ID</dt>
  <dd>
    <select id="conservation_id" name="bird[conservation_id]">
      <option value=""></option>
    <?php foreach(Bird::CONSERVATION as $key => $value) { ?>
      <option value="<?php echo $key; ?>" <?php if($bird->status() == $value) { echo 'selected';} ?> > <?php echo $value; ?></option>
    <?php } ?>
    </select>
  </dd>
</dl>

<dl>
  <dt>Tips</dt>
  <dd><input type="text" id="tips" name="bird[tips]" value="<?php echo h($bird->tips); ?>" /></dd>
</dl>

