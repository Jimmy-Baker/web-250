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

<div id="content">
  <h1>Log in</h1>

  <?php echo display_errors($error_array); ?>

  <form action="login.php" method="post">
    Username:<br />
    <input type="text" name="username" value="<?php echo h($username); ?>" /><br />
    Password:<br />
    <input type="password" name="password" value="" /><br />
    <input type="submit" name="submit" value="Submit"  />
  </form>

</div>

<?php include(SHARED_PATH . '/user-footer.php'); ?>
