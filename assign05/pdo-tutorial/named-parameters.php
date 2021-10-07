<?php

include 'connect.php';

$stmt = $db->prepare("SELECT * FROM names WHERE firstname = :firstname");

$stmt->bindValue(':firstname','Andy', PDO::PARAM_STR);
$stmt->execute();

  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $firstname = htmlentities($row['firstname']);
    $lastname = htmlentities($row['lastname']);
    $postcode = htmlentities($row['postcode']);
  
    echo $firstname . ' ' . $lastname . ' ' . $postcode . '<br>';
}
?>
