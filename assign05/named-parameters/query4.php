<?php

include 'connect.php';

$stmt = $db->prepare("DELETE FROM birds WHERE common_name = :common_name");
  
$stmt->bindValue(':common_name', 'Cassowary');
$stmt->execute();

$stmt2 = $db->prepare("SELECT * FROM birds");
$stmt2->execute();

while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)){
  $common_name = htmlentities($row['common_name']);
  $food = htmlentities($row['food']);
  $habitat = htmlentities($row['habitat']);

  echo 'The ' . $common_name . ' eats ' . $food . ' and lives in ' . $habitat . '<br>';
}

?>

