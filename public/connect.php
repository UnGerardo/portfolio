<?php

$host = 'localhost';
$user = 'root';
$password = '';
$db = 'portfolio';
$connection = new mysqli($host, $user, $password, $db);

if ($connection->connect_error) {
  echo 'Falied to connect DB' . $connection->connect_error;
}

?>