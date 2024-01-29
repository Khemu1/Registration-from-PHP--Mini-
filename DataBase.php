<?php
$db_server = "localhost";
$db_server_name = "root";
$db_pass = "";
$dp_name = "stepping_stone";
try {
  $connection = mysqli_connect($db_server, $db_server_name, $db_pass, $dp_name);
} catch (Throwable $th) {
  echo "Error while connecting";
}

if (!$connection) {
  echo "Can't connect";
} else {
  echo "Connected successfully";
}
?>