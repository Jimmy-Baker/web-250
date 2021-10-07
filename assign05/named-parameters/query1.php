<?php

include 'connect.php';

$stmt = $db->prepare("SELECT * FROM birds WHERE food = :food");

$stmt->bindValue(':food', 'Insects');
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $common_name = htmlentities($row['common_name']);
    $food = htmlentities($row['food']);
  
    echo 'The ' . $common_name . ' eats ' . $food . '<br>';
}

?>
