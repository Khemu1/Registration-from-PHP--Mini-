<?php
require_once("connection.php");

function fetch($pdo)
{
  $sql = "SELECT * FROM accounts";
  try {
    $stmt = $pdo->prepare($sql);
    if ($stmt) {
      $stmt->execute();
      while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
        echo "id : " . $row['id'] . "<br>";
        echo "Name : " . $row['name'] . "<br>";
        echo "Password : " . $row['pass'] . "<br>";
      }
    }
  } catch (\Throwable $th) {
    $th->getMessage() . "<br>";
    echo "Error while connecting to database to retrieve data" . "<br>";
  }
}
?>