<?php

include 'connect.php';

$stmt = $db->prepare("SELECT * FROM birds WHERE backyard_tips LIKE :backyard_tips");

$stmt->bindValue(':backyard_tips', '%bird feeder%');
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $common_name = htmlentities($row['common_name']);
  
    echo 'The ' . $common_name . '.<br>';
}

?>
