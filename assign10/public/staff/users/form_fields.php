<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if(!isset($user)) {
  redirect_to(url_for('/staff/users/index.php'));
}
?>

<dl>
  <dt>First name</dt>
  <dd><input type="text" name="user[first_name]" value="<?= h($user->first_name); ?>" /></dd>
</dl>

<dl>
  <dt>Last name</dt>
  <dd><input type="text" name="user[last_name]" value="<?= h($user->last_name); ?>" /></dd>
</dl>

<dl>
  <dt>Email</dt>
  <dd><input type="text" name="user[email]" value="<?= h($user->email); ?>" /></dd>
</dl>

<dl>
  <dt>Username</dt>
  <dd><input type="text" name="user[username]" value="<?= h($user->username); ?>" /></dd>
</dl>

<dl>
  <dt>User Level</dt>
  <dd><input type="radio" id="member" name="user[user_level]" value="m" <?php if($user->user_level == 'm'){echo "checked";}; ?>/><label for="member">Member</label></dd>
  <dd><input type="radio" id="admin" name="user[user_level]" value="a" <?php if($user->user_level == 'a'){echo "checked";}; ?>/><label for="admin">Admin</label></dd>
</dl>

<dl>
  <dt>Password</dt>
  <dd><input type="password" name="user[password]" value="" /></dd>
</dl>

<dl>
  <dt>Confirm Password</dt>
  <dd><input type="password" name="user[confirm_password]" value="" /></dd>
</dl>
