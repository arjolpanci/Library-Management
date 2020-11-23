<?php
session_start();
include "database/database.php";

if (isset($_POST['username'])) {
    $uname = $_POST['username'];
    $passw = $_POST['password'];

    $hasAccess = $dataAccess->validateLogin($uname, $passw);

    if ($hasAccess) {
        $_SESSION["username"] = $uname;
        $_SESSION["password"] = $passw;

        header("Location: homepage.php");
        exit();
    } else {
        echo "Failed login";
        exit();
    }
}

?>

<html>

<body>

    <form action="" method="post">
        Username: <input type="text" name="username"><br>
        Password: <input type="text" name="password"><br>
        <input type="submit">
    </form>

</body>

</html>