
<?php
require_once("connection.php");
function store($pdo)
{
  if (isset($_POST["submit"])) {
    if (valid_name($_POST["name"]) && valid_password($_POST["pass"])) {
      $hashPassword = password_hash($_POST["pass"], PASSWORD_DEFAULT);
      $sql = "INSERT INTO accounts(name, pass) VALUES (:name, :pass)";
      try {
        if ($stmt = $pdo->prepare($sql)) {
          $stmt->bindParam(':name', $_POST["name"]);
          $stmt->bindParam(':pass', $hashPassword);
          $stmt->execute();
          echo "Your data has been registered" . "<br>";
        } else {
          echo "something went wrong with the PDO system";
        }
      } catch (\Throwable $th) {
        echo $th->getMessage() . "<br>";
        echo "error while registration" . "<br>";
      }
    } else {
      echo "please fill the fields" . "<br>";
    }
  } else {
    echo "awaiting for click" . "<br>";
  }
}
function valid_name($name)
{
  $check = preg_match("/[a-zA-Z ]+/", $name) && !empty(trim($name));
  if (!$check) {
    echo "invalid name" . "<br>";
  } else {
    return true;
  }
}
function valid_password($password)
{
  $check = strlen($password) > 6 && !empty(trim($password));
  if (!$check) {
    echo "invalid password" . "<br>";
  } else {
    return true;
  }
}
?>