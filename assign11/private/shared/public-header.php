<?php 
  $page = substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], "/") + 1);
?>



<!doctype html>

<html lang="en">
  <head>
    <title>WNC Birds <?php if(isset($page_title)) { echo '- ' . h($page_title); } ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?= url_for('/stylesheets/normalize.css'); ?>" />
    <link rel="stylesheet" media="all" href="<?= url_for('/stylesheets/skeleton.css'); ?>" />
    <link rel="stylesheet" media="all" href="<?php
     if ($page == 'index.php') { echo url_for('/stylesheets/index.css');
     } else { echo url_for('/stylesheets/public.css');} ?>" />
  </head>

  <body class="container">

    <header class="row">
      <div class="twelve columns">
        <h1>
          <a href="<?= url_for('/index.php'); ?>">WNC Birds</a>
        </h1>
      <div>
    </header>
