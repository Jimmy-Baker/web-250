<?php

include 'connect.php';

$stmt = $db->prepare("SELECT * FROM names WHERE firstname = ?");
$names = array('Andy', 'Brian', 'Colin');
$id = 3;

foreach ($names as $name) {
  $stmt->bindParam(1,$name);
  $stmt->execute();

  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $firstname = htmlentities($row['firstname']);
    $lastname = htmlentities($row['lastname']);
    $postcode = htmlentities($row['postcode']);
  
    echo $firstname . ' ' . $lastname . ' ' . $postcode . '<br>';
}
}
?>
