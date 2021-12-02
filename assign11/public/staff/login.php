<?php
require_once('../../private/initialize.php');

$error_array = [];
$username = '';
$password = '';

if(is_post_request()) {

  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  // Validations
  if(is_blank($username)) {
    $error_array[] = ["#username","Username cannot be blank."];
  }
  if(is_blank($password)) {
    $error_array[] = ["#password","Password cannot be blank."];
  }

  // if there were no errors, try to login
  if(empty($error_array)) {
    $user = User::find_by_username($username);
    // test if user found and password is correct
    if($user != false && $user->verify_password($password)) {
      // Mark user as logged in
      $session->login($user);
      redirect_to(url_for('/staff/index.php'));
    } else {
      // username not found or password does not match
      $error_array[] = ["#log_in", "Log in was unsuccessful."];
    }

  }

}

?>

<?php $page_title = 'Log in'; ?>
<?php include(SHARED_PATH . '/user-header.php'); ?>

<div id="content" class="main">
  <div class="row">
    <div class="four columns offset-by-four">
      <h1>Log in</h1>
    </div>
  </div>
  <div class="row">
    <div class="four columns offset-by-four">
      <?php echo display_errors($error_array); ?>
    </div>
  </div>
  <form action="login.php" method="post">
    <div class="row">
      <div class="four columns offset-by-four">
        <label for="username">Username: </label>
        <input type="text" name="username" value="<?php echo h($username); ?>" />
      </div>
    </div>
    <div class="row">
      <div class="four columns offset-by-four">
        <label for="password">Password: </label>
        <input type="password" name="password" value="">
      </div>
    </div>
    <div class="row">
      <div class="four columns offset-by-four">
        <button type="submit" class="button-primary" name="submit">Submit</button>
      </div>
    </div>
  </form>

</div>

<?php include(SHARED_PATH . '/user-footer.php'); ?>
