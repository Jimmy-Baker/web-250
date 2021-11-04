<?php
  if(!isset($page_title)) { $page_title = 'Staff Area'; }
?>

<!doctype html>

<html lang="en">
  <head>
    <title>WNC Birds - <?= h($page_title); ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?= url_for('/stylesheets/staff.css'); ?>" />
  </head>

  <body>
    <header>
      <h1>WNC Birds Staff Area</h1>
    </header>

    <navigation>
      <ul>
        <?php if($session->is_logged_in()) { ?>
        <li>User: <?= $session->username; ?>
        <li><a href="<?= url_for('/staff/index.php'); ?>">Menu</a></li>
        <li><a href="<?= url_for('/staff/logout.php'); ?>">Logout</a></li>
        
        <?php } ?>
      </ul>
    </navigation>

    <?= display_session_message(); ?>
