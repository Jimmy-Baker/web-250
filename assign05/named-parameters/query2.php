<?php

include 'connect.php';

$stmt = $db->prepare("SELECT * FROM birds WHERE food = :food && habitat = :habitat");

$stmt->bindValue(':food', 'Insects');
$stmt->bindValue(':habitat', 'Open woodlands');
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $common_name = htmlentities($row['common_name']);
    $food = htmlentities($row['food']);
    $habitat = htmlentities($row['habitat']);
  
    echo 'The ' . $common_name . ' eats ' . $food . ' and lives in ' . $habitat . '<br>';
}

?>
