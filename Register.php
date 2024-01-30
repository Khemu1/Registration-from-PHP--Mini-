<?php
require_once("connection.php");
require_once("store.php");
require_once("fetch.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    store($pdo);
}
fetch($pdo);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <h2>Register form</h2>
    </header>
    <form method="POST">
        <br>
        <label>User name</label>
        <input type="text" name="name">
        <br><br>
        <label>Password </label>
        <input type="password" name="pass">
        <Br><br>
        <input type="submit" values="Register" name="submit">
        <br>
    </form>
</body>

</html>