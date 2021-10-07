<?php

$user = 'u308745100_jimmy';
$password = 'CptP@ncr34s';

try {
$db = new PDO('mysql:host=127.0.0.1;dbname=u308745100_testdb;charset=utf8', $user, $password);
// var_dump($db);
}

catch(Exception $e) {
  //echo $e->getMessage();
  echo "An error has occured";
}

?>
