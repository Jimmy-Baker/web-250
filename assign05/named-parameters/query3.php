<?php

include 'connect.php';


$stmt = $db->prepare("INSERT INTO birds (common_name, habitat, food, conservation_id, backyard_tips) VALUES (:common_name, :habitat, :food, :conservation_id, :backyard_tips)");
  
$stmt->bindValue(':common_name', 'Cassowary');
$stmt->bindValue(':habitat', 'Rainforests');
$stmt->bindValue(':food', 'omniverous');
$stmt->bindValue(':conservation_id', 3);
$stmt->bindValue(':backyard_tips', 'run');

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

