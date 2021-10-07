<?php

include 'connect.php';

$stmt2 = $db->prepare("DELETE FROM names WHERE firstname = :firstname");

$stmt2->bindValue(':firstname', 'Jenny');
$stmt2->execute();

