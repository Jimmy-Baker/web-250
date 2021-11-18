<?php
require_once('../../private/initialize.php');
$page_title = 'Bird: Member Menu'; 
include(SHARED_PATH . '/header.php'); 
?>

<h2>Main Menu</h2>

 <!-- Menu 
if member display link to birds with CRUD
else display links -- 1. birds with CRUD 2. members -->
<?php

global $session;
   if($session->is_logged_in()) {
        echo "Welcome";
    } else {
        echo "No one home.";
    }

?>

<?php include(SHARED_PATH . '/footer.php'); ?>