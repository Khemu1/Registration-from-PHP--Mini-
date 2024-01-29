<?php
include("DataBase.php");

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
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
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

<?php
register_form($connection);
function register_form($connection)
{
    if (isset($_POST["submit"])) {
        if (valid_name($_POST["name"]) && valid_password($_POST["pass"])) {
            $hashPassword = password_hash($_POST["pass"], PASSWORD_DEFAULT);
            $stmt = mysqli_prepare($connection,"INSERT INTO accounts(name,pass) values(?,?)");
            mysqli_stmt_bind_param($stmt, "ss", $_POST["name"],$hashPassword );
            try {
                $result = mysqli_stmt_execute($stmt);
                echo "Your data has been registered" . "<br>";
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

mysqli_close($connection);

?>