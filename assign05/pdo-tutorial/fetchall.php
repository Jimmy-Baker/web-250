<?php

include 'connect.php';

$stmt = $db->query("SELECT * FROM names");

$results = $stmt->fetchAll();

foreach($results as $row) {
  
  $firstname = htmlentities($row['firstname']);
  $lastname = htmlentities($row['lastname']);
  $postcode = htmlentities($row['postcode']);
  
  echo $firstname . ' ' . $lastname . ' ' . $postcode . '<br>';
}

?>
