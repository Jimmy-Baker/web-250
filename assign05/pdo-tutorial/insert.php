<?php

include 'connect.php';

$stmt = $db->prepare("INSERT INTO names (firstname, lastname, postcode) VALUES (:firstname, :lastname, :postcode)");
$stmt2 = $db->prepare("UPDATE names set postcode = :postcode WHERE firstname = :firstname");

$stmt->bindValue(':firstname', 'Indira');
$stmt->bindValue(':lastname', 'Iguana');
$stmt->bindValue(':postcode', 'IG1 1GI');
$stmt->execute();

$stmt2->bindValue(':firstname', 'Jenny');
$stmt2->bindValue(':postcode', 'UI89 J97');
$stmt2->execute();

