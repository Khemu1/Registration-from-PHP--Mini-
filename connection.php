<?php
$db_server = "localhost";
$db_server_name = "root";
$db_pass = "";
$db_name = "stepping_stone";

try {
  $pdo = new PDO("mysql:host=$db_server;dbname=$db_name", $db_server_name, $db_pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully"."<br>";
} catch (PDOException $e) {
  echo "Error while connecting: " . $e->getMessage();
  exit(); // exit script on connection failure
}
?>